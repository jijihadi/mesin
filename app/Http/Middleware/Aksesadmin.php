<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Aksesadmin
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

            if (Auth::user()->role=='admin') {
                return $next($request);
            }
            if(Auth::user()->role=='operator') {
                return $next($request);
            }
            if(Auth::user()->role=='teknisi') {
                return $next($request);
            }
            if(Auth::user()->role=='manager') {
                return $next($request);
            }

            return abort(404);
        
    }
}
