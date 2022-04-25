<?php

namespace App\Http\Middleware;

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

        // echo "<pre>";
        // print_r($request-)
        if (Auth::guard($guard)->check()) {
            return redirect('/home');
        }
        if ($guard == "admin" && Auth::guard($guard)->check()) {
                return redirect('/dash');
            }
        return $next($request);
    }
}
