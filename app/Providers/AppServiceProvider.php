<?php

namespace App\Providers;

use App\Models\Course;
use App\Models\Enrollment;
use Illuminate\Pagination\Paginator;
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
                $a = auth()->user()->courses()->where('course_id', $course->id)->where('payment_status', 1)->count();
                return $a === 1;
            }
            return false;
        });

        Blade::if('hasGrade', function(Course $course) {

            $enrollment = Enrollment::where('course_id', $course->id)
                ->where('user_id', auth()->user()->id)
                ->get()
                ->first();

            if ($enrollment->examGrade) {
                return true;
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

        view()->composer('master.dashboard.sidebar', 'App\Http\Composers\MasterComposer');
    }
}
