<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Confirmed
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
        if(Auth::check())
        {
            if(auth()->user()->role == 'visitor')
            {
                if(auth()->user()->confirmed == 'no')
                {
                    return redirect()->route('daftar.user.complete.page');
                }
            }
            else
            {
                if(auth()->user()->confirmed == 'no')
                {
                    return redirect()->route('daftar.seller.complete.page');
                }
            }
        }
        return $next($request);
    }
}
