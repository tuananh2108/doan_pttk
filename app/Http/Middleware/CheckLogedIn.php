<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\models\role;
use App\User;

class CheckLogedIn
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
        // $role_admin = role::select('id')->where('uid', 'ADMIN')->get();
        if(Auth::check())
        {
            if(Auth::user()->role_id == 1) {
                return redirect()->intended('admin/home');
            }
            return redirect()->intended('/');
        }
        return $next($request);
    }
}
