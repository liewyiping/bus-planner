<?php

namespace busplannersystem\Http\Middleware;

use Closure;
use Auth;

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
        if (Auth::user()->role == 'admin') {
            return $next($request);
        }
        else if (Auth::user()->role == 'operator') {
            return redirect('/operator');
        }
        else{
            return redirect('/customer');
        }
    }
}
