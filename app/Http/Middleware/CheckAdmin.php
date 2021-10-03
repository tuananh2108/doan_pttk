<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\models\role;
use App\User;

class CheckAdmin
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
        // $roles=role::where('id', 1)->get();
        // foreach($roles as $role){
        //     if(User::where('role_id', "<>", $role->id)->get()) {
        //         return redirect()->back();
        //     }
        // }
        return $next($request);
    }
}
