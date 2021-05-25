<?php

namespace App\Http\Middleware;

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

        if ($course->status) {
            return $next($request);
        }

        return redirect('home');
    }
}
