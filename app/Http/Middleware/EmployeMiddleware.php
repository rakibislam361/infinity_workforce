<?php

namespace App\Http\Middleware;
use Illuminate\support\Facades\Auth;
use Closure;

class EmployeMiddleware
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
        if(Auth::check() && Auth::user()->role_id==3){
            return $next($request);
        }
        else{
            return redirect()->route('login');
        }
       //return $next($request);
    }
}
