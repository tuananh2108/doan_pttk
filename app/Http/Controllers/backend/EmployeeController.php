<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\models\{employee, order};
use DB;

class EmployeeController extends Controller
{
    public function getEmployee()
    {
        $data['qty_order'] = count(order::all());
        $data['employees'] = employee::all();
        return view('backend.employee.indexEmployee', $data);
    }

    public function getAddEmployee()
    {
        $data['qty_order'] = count(order::all());
        return view('backend.employee.addEmployee', $data);
    }

    public function postAddEmployee(Request $request)
    {
        $employee = new employee;
        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->phone = $request->phone;
        $employee->address = $request->address;
        $employee->role = $request->role;
        $employee->salary = $request->salary;
        $employee->save();
        return redirect()->back()->with('success', 'Thêm thành công!');
    }

    public function getEditEmployee($id)
    {
        $data['qty_order'] = count(order::all());
        $data['employee'] = employee::find($id);
        return view('backend.employee.editEmployee', $data);
    }

    public function postEditEmployee(Request $request, $id)
    {
        $employee = employee::find($id);
        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->phone = $request->phone;
        $employee->address = $request->address;
        $employee->role = $request->role;
        $employee->salary = $request->salary;
        $employee->save();
        return redirect()->intended('admin/employee')->with('success', 'Cập nhật thành công!');
    }

    public function getDeleteEmployee($id)
    {
        employee::destroy($id);
        return back()->with('success', 'Xóa thành công!');
    }
}
