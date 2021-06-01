<?php

namespace App\Http\Middleware;

use App\Models\Enrollment;
use App\Models\Lesson;
use App\Models\LessonGrade;
use App\Models\Question;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HasQuiz
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
        $lesson = $request->route('lesson');
        $enrollment = Enrollment::where('user_id', Auth::user()->id)
            ->where('course_id', $lesson->module->course->id)
            ->OrderBy('created_at', 'DESC')
            ->first();

        if($enrollment) {
            $lessonGrade = LessonGrade::where('lesson_id',$lesson->id)
                ->where('enrollment_id',$enrollment->id)->get();
        }

        $flag = false;
        if (isset($lessonGrade) && !$lessonGrade->isEmpty()){
            foreach ($lessonGrade as $grade){
                if ($grade->grade >= 50 ){
                    $flag = true;
                    break;
                }
            }
        }else{
            return $next($request);
        }

        if (!$flag || Auth::user()->type->id == 1){
            return $next($request);
        }

        return redirect('/');
    }
}
