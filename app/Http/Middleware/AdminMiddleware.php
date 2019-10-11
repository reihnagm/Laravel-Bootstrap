<?php

namespace App\Http\Middleware;

use Closure;

class adminMiddleware
{
    public function handle($request, Closure $next)
    {
        if(request()->user()->group_id === 1) {
            return $next($request);
        } else {
            abort(403);
        }
    }
}
