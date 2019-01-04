<?php

namespace App\Http\Middleware;

use Closure;

class VisitorNoEntry
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
        if(auth()->user()->role != 'seller')
        {
            return redirect()->route('home');
        }
        return $next($request);
    }
}
