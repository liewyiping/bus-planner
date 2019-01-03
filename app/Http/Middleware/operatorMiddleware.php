<?php

namespace  busplannersystem\Http\Middleware;

use Closure;
use Illuminate\Http\Response;

class operatorMiddleware
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
        if ($request->user() && $request->user()->role != 'operator' )
                    { 
                    return new Response(view('unauthorized')->with('role', 'Operator' ));
                    }
        return $next($request);
    }
}
