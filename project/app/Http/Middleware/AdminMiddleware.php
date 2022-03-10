<?php

namespace App\Http\Middleware;

use App\Exceptions\ApiException;
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
            throw new ApiException(403, 'Forbidden for you.');
        }
        return $next($request);
    }
}
