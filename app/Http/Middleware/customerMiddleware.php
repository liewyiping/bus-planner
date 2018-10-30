<?php

namespace  busplannersystem\Http\Middleware;

use Closure;
//use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
class customerMiddleware
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

        if ($request->user() && $request->user()->type != 'customer' )
                    { 
                    return new Response(view('unauthorized')->with('role', 'Customer' ));
                    }

        return $next($request);
    }
}
