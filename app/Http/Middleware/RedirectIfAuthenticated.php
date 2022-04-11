<?php

namespace App\Http\Middleware;

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
    /*public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            return redirect('/home');
        }

        return $next($request);
    }*/
    public function handle($request, Closure $next, $guard = null)
    {
        
        if (Auth::guard($guard)->check() && Auth::user()->role_id == 1) {
            return redirect()->url('/public/admin/dashboard');
        } 
        elseif (Auth::guard($guard)->check() && Auth::user()->role_id == 2)
        {
            return redirect()->url('/public/user/dashboard');
        }
        elseif (Auth::guard($guard)->check() && Auth::user()->role_id == 3)
        {
            return redirect()->url('/public/employe/dashboard');
        }
        else {
            return $next($request);
        }
    }

}
