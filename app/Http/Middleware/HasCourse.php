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
        $user = auth()->user();

        if (isset($lesson) && $lesson != ''){

            $course = $lesson->module->course;

            $enrollment = Enrollment::where('user_id', $user->id)
                ->where('course_id', $course->id)
                ->where('created_at', '>=', now()->subDays($course->duration))
                ->where('payment_status', 1)
                ->exists();

            if ($enrollment || $user->type->id == 1){
                return $next($request);
            }
        } elseif ($request->route('course')) {
            $course = $request->route('course');

            $enrollment = Enrollment::where('user_id', $user->id)
                ->where('course_id', $course->id)
                ->where('created_at', '>=', now()->subDays($course->duration))
                ->where('payment_status', 1)
                ->orderBy('created_at', 'desc')
                ->get()
                ->first();

            if($enrollment || $user->type->id == 1) {
                $request->merge(['enrollment' => $enrollment]);
                return $next($request);
            }
        }

        return redirect('/');
    }
}
