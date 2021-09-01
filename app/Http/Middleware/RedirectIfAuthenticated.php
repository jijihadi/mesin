<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        // if (Auth::guard($guard)->check()) {
        //     if (Auth::user()->role=='admin') {
        //         return redirect()->route('admin');
        //     }
        //     if(Auth::user()->role=='operator') {
        //         return redirect()->route('operator');
        //     }
        //     if(Auth::user()->role=='teknisi') {
        //         return redirect()->route('teknisi');
        //     }
        //     if(Auth::user()->role=='manager') {
        //         return redirect()->route('manager');
        //     }
        //     // return redirect(RouteServiceProvider::HOME);
        // }

        return $next($request);
    }
}
