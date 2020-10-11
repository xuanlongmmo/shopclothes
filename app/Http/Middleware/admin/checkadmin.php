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
        if(Auth::check())
        {
            if(Auth::user()->id_role == 2 || Auth::user()->id_role == 1){
                return $next($request);
            }else if(Auth::user()->id_role == 3){
                return response()->view('frontend.404');
            }
        }else{
            return redirect()->route('admin.login');
        }
    }
}
