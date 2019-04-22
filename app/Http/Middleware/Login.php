<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use session;

class Login
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
        if (Auth::user()->role_id == "1") {
            return $next($request);
        }
        else {
            return redirect('/admin/login')->with('error', 'You do not have access to the administrator`s address with this account');
        }
    }
}
