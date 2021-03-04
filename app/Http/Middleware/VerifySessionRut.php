<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class VerifySessionRut
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
        if(session('customer')){
            return $next($request);
        }

        return redirect()->route('session.index');

        //return $next($request);
    }
}
