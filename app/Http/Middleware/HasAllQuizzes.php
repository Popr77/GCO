<?php

namespace App\Http\Middleware;

use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Lesson;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HasAllQuizzes
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $course = $request->route('course');

        $enrollment = Enrollment::where('course_id', $course->id)
                ->where('user_id', Auth::user()->id)->get();

        $totalGrades = 0;
        $lessonGrades  = [];
        foreach ($enrollment[0]->grades as $lesson) {
            if ($lesson->pivot->grade != null){
                if ($lesson->pivot->grade > 49){
                    array_push($lessonGrades, $lesson->pivot->grade);
                    $totalGrades++;
                }
            }
        }

        foreach ($enrollment[0]->examGrades as $examGrade){
            if (count(collect($examGrade)) > 0){
                if ($examGrade->grade >= 50){
                    $grade = $examGrade->grade;
                    break;
                }
            }
        }

        $totalQuizzes = 0;
        foreach ($enrollment[0]->course->modules as $module) {
            $totalQuizzes += Lesson::where('module_id', $module->id)->count();
        }

        if ($totalGrades == $totalQuizzes && !isset($grade) || Auth::user()->type->id == 1){
            $request->merge(['enrollment' => $enrollment[0]]);
            return $next($request);
        }else
            return redirect(route('home'));

    }
}
