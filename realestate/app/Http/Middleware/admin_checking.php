<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class admin_checking
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

        if(Auth::guard('m_managers')->check())
        {
            return $next($request);
        } 
        else {
            return redirect()->route('NRGSecurity_getLogin');
        }
    }
}
