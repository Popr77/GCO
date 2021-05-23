<?php

namespace App\Http\Middleware;

use App\Models\Enrollment;
use Carbon\Carbon;
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

            $course = $lesson->module->course;

            $enrollment = Enrollment::where('user_id', auth()->user()->id)
                ->where('course_id', $course->id)
                ->where('created_at', '>=', now()->subDays($course->duration))
                ->where('payment_status', 1)
                ->exists();

            if ($enrollment || Auth::user()->type->id == 1){
                return $next($request);
            }
        }

        return redirect('/');
    }
}
