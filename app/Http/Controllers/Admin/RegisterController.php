<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\models\role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function getRegister()
    {
        return view('login.register');
    }

    public function postRegister(Request $request)
    {
        $user_old = User::where('email', $request->email)->get();
        $user = new User;
        $user->name = $request->name;
        if(count(User::where('email', $request->email)->get())==0){
            $user->email = $request->email;
            $user->contact = $request->contact;
            $user->address = $request->address;
            $user->password = Hash::make($request->password);
            $user->role_id = 2;
            if($request->password == $request->confirm_password) {
                $user->save();
                return redirect()->intended('login')->with('success', 'Đăng ký tài khoản thành công!');
            }
            else {
                return back()->with('error', 'Mật khẩu không trùng khớp!');
            }
        }
        else {
            return redirect()->back()->with('error', 'Email đã tồn tại!');
        }
    }
}
