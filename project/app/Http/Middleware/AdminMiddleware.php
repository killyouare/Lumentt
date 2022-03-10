<?php

namespace App\Http\Middleware;

use Closure;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!auth()->user()->is_admin) {
            return response()->json(['error' => ['code' => 403, 'message' => 'Forbidden for you.']], 403);
        }
        return $next($request);
    }
}
