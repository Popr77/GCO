<?php

namespace App\Providers;

use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Lesson;
use App\Models\LessonGrade;
use Illuminate\Contracts\View\View;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::defaultView('vendor.pagination.bootstrap-4');
        Paginator::defaultSimpleView('vendor.pagination.bootstrap-4');

        Blade::if('admin', function() {
            return auth()->check() && auth()->user()->type->id == 1;
        });

        Blade::if('hasCourse', function(Course $course) {
            if(auth()->check()) {
                $a = auth()->user()->courses()->where('course_id', $course->id)
                    ->where('enrollments.created_at', '>=', now()->subDays($course->duration))
                    ->where('payment_status', 1)
                    ->count();

                return $a === 1;
            }
            return false;
        });

        Blade::if('hasGrade', function(Course $course) {

            if(auth()->check()) {
                $enrollment = Enrollment::where('course_id', $course->id)
                    ->where('user_id', auth()->user()->id)
                    ->where('created_at', '>=', now()->subDays($course->duration))
                    ->get()
                    ->first();

                if ($enrollment) {
                    return $enrollment->examGrades()->where('grade', '>=', 50)->count() > 0;
                }
            }

            return false;
        });

        Blade::if('gaveFeedback', function(Course $course) {

            $enrollment = Enrollment::where('course_id', $course->id)
                ->where('user_id', auth()->user()->id)
                ->get()
                ->first();

            return !!$enrollment->feedback_stars;

        });

        Blade::if('hasQuiz', function(Lesson $lesson) {

            $enrollment = Enrollment::where('user_id', Auth::user()->id)
                ->where('course_id', $lesson->module->course->id)
                ->OrderBy('created_at', 'DESC')
                ->first();

            $lessonGrade = LessonGrade::where('lesson_id',$lesson->id)
                ->where('enrollment_id',$enrollment->id)->get();

            $flag = false;
            if (isset($lessonGrade) && !$lessonGrade->isEmpty()) {
                foreach ($lessonGrade as $grade) {
                    if ($grade->grade >= 50) {
                        $flag = true;
                        break;
                    }
                }
            }

            if ($flag || Auth::user()->type->id == 1){
                return $flag;
            }
        });

        view()->composer('master.dashboard.sidebar', 'App\Http\Composers\MasterComposer');

        view()->composer('master.header', function(View $view) {
            if (auth()->check()) {
                $myCourses = Enrollment::where('user_id', auth()->user()->id)
                                    ->join('courses', 'courses.id', '=', 'enrollments.course_id')
                                    ->where('payment_status', 1)
                                    ->where('courses.status', 1)
                                    ->whereRaw("enrollments.created_at >= now() - (courses.duration || ' DAY')::INTERVAL")
                                    ->distinct('enrollments.user_id', 'enrollments.course_id')
                                    ->get('courses.*');

                $view->with('myCourses', $myCourses);
            }
        });
    }
}
