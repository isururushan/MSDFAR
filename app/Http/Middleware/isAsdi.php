<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;

class isAsdi
{
   
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            if (auth()->User()->isAsdi()) {

                return $next($request);
            }
        }
        return redirect('login');

    }
}
