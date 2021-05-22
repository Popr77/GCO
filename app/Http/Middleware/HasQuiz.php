<?php

namespace App\Http\Middleware;

use App\Models\Enrollment;
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

        $quiz = Question::where('lesson_id',$lesson->id)->exists();

        if ($quiz){
            $flag = false;
            if (isset($lesson->grades) && !$lesson->grades->isEmpty()){
                foreach ($lesson->grades as $grade){
                    if ($grade->pivot->grade >= 50 ){
                        $flag = true;
                    }
                }
            }

            if (!$flag || Auth::user()->type->id == 1){
                return $next($request);
            }
        }

        return redirect('/');
    }
}
