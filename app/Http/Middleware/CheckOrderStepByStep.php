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
        if ($stepByStep == 1 && !in_array(Route::currentRouteName(), ['view_cart'])) {
            return redirect()->route('view_cart');
        } else if ($stepByStep == 2 && !in_array(Route::currentRouteName(), ['checkout'])) { // check if current route is /cart/checkout then redirect to cart/checkout
            return redirect()->route('checkout');
        }
        return $next($request);
    }
}
