<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

class CheckOrderStepByStep
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
        $sessionAll = Session::all();
        $stepByStep = empty($sessionAll['step_by_step']) ? null : $sessionAll['step_by_step'];
        // check if current route is /cart then redirect to cart
        if ($stepByStep == 1) {
            return $next($request);
        } 
        abort(403, 'Unauthorized action.');
        
    }
}
