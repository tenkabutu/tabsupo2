<?php

namespace App\Http\Middleware;

use Closure;

class HogeMiddleware
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
        file_put_contents('C:\Data\access2.log', date('Y-m-d H:i:s'), FILE_APPEND);
        return $next($request);
    }
}
