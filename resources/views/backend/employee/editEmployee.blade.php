@extends('backend.master.master')
@section('content')

    <h2 class="main-title">Cập nhật nhân viên</h2>
    <div class="main-edit">
        <form action="" method="POST" enctype="multipart/form-data">
        @csrf
            <table class="table-edit">
                <tr>
                    <td>Họ tên:</td>
                    <td>
                        <input type="text" name="name" value="{{$employee->name}}" required>
                    </td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td>
                        <input type="text" name="email" value="{{$employee->email}}" required>
                    </td>
                </tr>
                <tr>
                    <td>SĐT:</td>
                    <td>
                        <input type="text" name="phone" value="{{$employee->phone}}" required>
                    </td>
                </tr>
                <tr>
                    <td>Địa chỉ:</td>
                    <td>
                        <textarea name="address" id="" cols="40" rows="3" required>{{$employee->address}}</textarea>
                    </td>
                </tr>
                <tr>
                    <td>Chức vụ:</td>
                    <td>
                        <input type="text" name="role" value="{{$employee->role}}" required>
                    </td>
                </tr>
                <tr>
                    <td>Lương:</td>
                    <td>
                        <input type="text" name="salary" value="{{$employee->salary}}" required>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Cập nhật" class="primary-default-btn table-edit_btn">
                    </td>
                </tr>
            </table>
        </form>
    </div>

@endsection