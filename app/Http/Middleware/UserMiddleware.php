<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\support\Facades\Auth;
class UserMiddleware
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
        if(Auth::check() && Auth::user()->role_id==2 && Auth::user()->status==1){
            return $next($request);
        }
       
         else{
            if(Auth::check() && Auth::user()->status==0){
                Auth::logout();
                return redirect()->route('user-account-block');
            }
            else{
                return redirect()->route('login');
            }
            
        }
        
    }
}
