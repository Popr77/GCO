<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CanGiveFeedback
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
        $rating = $request->enrollment->feedback_stars ?? null;

        if(!$rating) {
            return $next($request);
        }

        return back();

    }
}
