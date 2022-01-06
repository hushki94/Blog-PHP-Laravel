<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as HttpFoundationResponse;

class AdminsOnly
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        if(!auth()->check()){
            abort(HttpFoundationResponse::HTTP_FORBIDDEN);
        }

        if(auth()->user()->username !== 'ali' || auth()->guest() || !auth()){
           abort(HttpFoundationResponse::HTTP_FORBIDDEN);
        }


        return $next($request);
    }
}
