<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class AksesAdmin
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

        if(Auth::user()->tipe_admin=='superadmin')
        return $next($request);
    }
}
