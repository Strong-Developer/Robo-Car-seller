<?php

namespace App\Http\Middleware;

use Closure;
use App\Sessions;
use Illuminate\Support\Facades\Auth;

class Authenticated
{
    public function handle($request, Closure $next)
    {
        if(!empty(session()->get('admin_id'))) {
                return $next($request);
        }else{
            return redirect(route('admin.login'));
        }
    }
}
