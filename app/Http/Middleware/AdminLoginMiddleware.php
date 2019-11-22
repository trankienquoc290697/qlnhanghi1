<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;

class AdminLoginMiddleWare
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
            if(Auth::users()->role == 2)
            {
                return $next($request);
            }else if(Auth::users()->role == 1){
                return redirect()->route('website.index');
            }else{
                Auth::logout();
                return redirect()->route('page-err');
            }
        }
        else
            return redirect()->route('login');
    }
}
