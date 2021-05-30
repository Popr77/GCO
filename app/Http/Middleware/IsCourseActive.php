<?php

namespace App\Http\Middleware;

use App\Models\Enrollment;
use Closure;
use Illuminate\Http\Request;

class IsCourseActive
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

        $course = request()->route('course') ? request()->route('course')
                                    : request()->route('lesson')->module->course;

        $enrollment = null;

        if(auth()->check()) {
            $enrollment = Enrollment::where('user_id', auth()->user()->id)
                ->where('course_id', $course->id)
                ->where('created_at', '>=', now()->subDays($course->duration))
                ->where('payment_status', 1)
                ->orderBy('created_at', 'desc')
                ->get()
                ->first();
        }

        if ($course->status || (auth()->check() && auth()->user()->type->id == 1) || $enrollment) {
            return $next($request);
        }

        return redirect('/');
    }
}
