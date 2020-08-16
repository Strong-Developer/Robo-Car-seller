<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Admin
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
        if(! Auth::check()) {

            session()->put('link_after_login',  $request->fullUrl()) ;

            session()->put('error','Please login as administrator to access that page') ;

            return redirect(route('login'))  ;

        }
        
        return $next($request);
    }
}
