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
        foreach ($enrollment[0]->grades as $grade) {
            if ($grade->pivot->grade != null){
                if ($grade->pivot->grade > 49)
                    $totalGrades++;
            }
        }

        $totalQuizzes = 0;
        foreach ($enrollment[0]->course->modules as $module) {
            $totalQuizzes += Lesson::where('module_id', $module->id)->count();
        }

        if ($totalGrades == $totalQuizzes){
            $request->merge(['enrollment' => $enrollment[0]]);
            return $next($request);
        }
        return $next($request);

//        return redirect(route('home'));


    }
}
