<?php

namespace App\Http\Middleware;

use App\Models\Enrollment;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HasCourse
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

        if (isset($lesson) && $lesson != ''){
            $enrollment = Enrollment::where('user_id', Auth::user()->id)
                ->where('course_id',$lesson->module->course->id)->exists();

            if ($enrollment || Auth::user()->type->id == 1){
                return $next($request);
            }
        }

        return redirect('/');
    }
}
