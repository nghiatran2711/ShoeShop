<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckActivity
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::guard('admin')->check() && Auth::guard('admin')->user()->status==1){
            return $next($request);
        }
        return redirect()->route('admin.login')->with('message','Tài khoản của bạn chưa được active');
    }
}
