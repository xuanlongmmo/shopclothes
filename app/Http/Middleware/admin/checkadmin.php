<?php

namespace App\Http\Middleware\admin;

use Illuminate\Support\Facades\Auth;
use Closure;

class checkadmin
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
        if(Auth::check() && Auth::user()->id_role != 3)
        {
            return $next($request);
        }else{
            return redirect()->route('admin.login');
        }
    }
}
