<?php

namespace busplannersystem\Http\Middleware;

use Closure;
use Auth;

class Operator
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
        if (Auth::user()->role == 'operator') {
            return $next($request);
        }
        else{
            return redirect('customer');
        }
        
    }
}
