<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    //
    public function getLogin()
    {
        return view('login.login');
    }

    public function postLogin(Request $request)
    {
        if($request->remember = 'Remember Me')
        {
            $remember = true;
        }
        else {
            $remember = false;
        }
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember))
        {
            return redirect()->intended('admin/home');
        }
        else {
            return back()->withInput()->with('error', 'Tài khoản hoặc mật khẩu không chính xác. Vui lòng kiểm tra lại!');
        }
    }
}
