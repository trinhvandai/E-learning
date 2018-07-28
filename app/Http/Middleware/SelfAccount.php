<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class SelfAccount
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
        if (Auth::user()->id != $request->route()->user) {
            return redirect()->back();
        }
        
        return $next($request);
    }
}
