<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\URL;
class CheckRole
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
        // dd(url()->request->pathInfo);
        // $ss =;
        // $s = substr($ss,);
        if(session('admin_id')===1)
        {
            return $next($request);
        }
        $url = substr( $request->path(), 6);
        $path = session('path');
        if(in_array($url, $path))
        {
            return $next($request);
        }
        else
        {
            dd('无权访问！');
        }
        
    }
}
