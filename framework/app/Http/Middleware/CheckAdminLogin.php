<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckAdminLogin
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
        if(!Auth::check()){
            return redirect()->route('admin-login')->with([
                'flash_message'=>'Bạn vui lòng đăng nhập',
                'm2'=>"234567hgfgv"
            ]);
        }   
        return $next($request);
    }
}
