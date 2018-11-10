<?php

namespace App\Http\Middleware;

use Closure;
use session;
class AdminLogin
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
        if(!session('admin_id'))
        {
            return redirect()->route('admin_login');
        }
        return $next($request);
    }
}
