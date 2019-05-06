<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Session;

class Customer
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
        if(Auth::check()){
            if (Auth::user()) {
                return $next($request);
            }
            else {
                return redirect('/login')->with('error', 'To use this feature, please login.');
            }
        }
        else {
            return redirect('/login');
        }
    }
}
