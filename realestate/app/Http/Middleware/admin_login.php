<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class admin_login
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
            return redirect()->route('NRGRedirects_AdminIndex');
        }
        return $next($request);
    }
}
