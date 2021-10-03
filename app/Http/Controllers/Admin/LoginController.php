<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use DB;
use App\models\role;
use App\User;

class LoginController extends Controller
{
    //
    public function getLogin()
    {
        return view('login.login');
    }

    public function postLogin(Request $request)
    {
        // $user = User::where('role_id', 1)->get();
        // dd($user);
        if($request->remember = 'Remember Me')
        {
            $remember = true;
        }
        else {
            $remember = false;
        }
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember))
        {
            if(Auth::user()->role_id == 1) {
                return redirect()->intended('admin/home');
            }
            else {
                return redirect()->intended('/');
            }
        }
        else {
            return back()->withInput()->with('error', 'Tài khoản hoặc mật khẩu không chính xác!');
        }
    }
}
