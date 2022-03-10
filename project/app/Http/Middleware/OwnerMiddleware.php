<?php

namespace App\Http\Middleware;

use Closure;

class OwnerMiddleware
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
        if (auth()->user()->id != $request->id) {
            return response()->json(['error' => ['code' => 403, 'message' => 'Forbidden for you.']], 403);
        }
        return $next($request);
    }
}
