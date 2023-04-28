<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {

        if(auth()->User()->isAsdi()){
                return redirect('/asdi');

        }  elseif (auth()->User()->isFishermen()) {
            return redirect('/fishermen');
        }
        elseif(auth()->User()->isDirector()) {
            return redirect('/director');

        }
        elseif(auth()->User()->isDofficer()) {
            return redirect('/dofficer');

        }
    }

        return $next($request);
    }
}
