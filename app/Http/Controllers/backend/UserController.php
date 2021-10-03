<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\models\{order, role};
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function getCustomer()
    {
        $data['qty_order'] = count(order::all());
        $data['users'] = DB::table('users')
                            ->join('roles', 'users.role_id', '=', 'roles.id')
                            ->select('users.*')
                            ->where('roles.uid', 'GUEST')
                            ->get();
        return view('backend.customer', $data);
    }

    public function getDeleteCustomer($id)
    {
        User::destroy($id);
        return redirect()->back()->with('success', 'Xóa thành công!');
    }

    //user
    public function getUser()
    {
        $data['qty_order'] = count(order::all());
        $data['users'] = DB::table('users')
                            ->join('roles', 'users.role_id', '=', 'roles.id')
                            ->select('users.*', 'roles.uid')
                            ->get();
        return view('backend.user.indexUser', $data);
    }

    public function getEditUser($id)
    {
        $data['qty_order'] = count(order::all());
        $data['user'] = User::find($id);
        $data['roles'] = role::all();
        return view('backend.user.editUser', $data);
    }

    public function postEditUser(Request $request, $id)
    {
        $user = User::find($id);
        $user->role_id = $request->role_id;
        $user->save();
        return redirect('admin/user')->with('success', 'Cập nhật thành công!');
    }
}
