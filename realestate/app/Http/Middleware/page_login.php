<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class page_login
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
        if(Auth::guard('m_customers')->check())
        {
            return redirect()->route('NRGHome');
        }
        return $next($request);
    }
}
