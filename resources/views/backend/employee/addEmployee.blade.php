@extends('backend.master.master')
@section('content')

    <h2 class="main-title">Thêm nhân viên</h2>
    @if(session()->has('success'))
    <div class="message-success">{{session()->get('success')}}</div>
    @endif
    <div class="main-edit">
        <form action="" method="POST" enctype="multipart/form-data">
        @csrf
            <table class="table-edit">
                <tr>
                    <td>Họ tên:</td>
                    <td>
                        <input type="text" name="name" placeholder="Full name of the employee" required>
                    </td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td>
                        <input type="text" name="email" placeholder="Email of the employee" required>
                    </td>
                </tr>
                <tr>
                    <td>SĐT:</td>
                    <td>
                        <input type="text" name="phone" placeholder="Phone number of the employee" required>
                    </td>
                </tr>
                <tr>
                    <td>Địa chỉ:</td>
                    <td>
                        <input type="text" name="address" placeholder="Address of the employee" required>
                    </td>
                </tr>
                <tr>
                    <td>Chức vụ:</td>
                    <td>
                        <input type="text" name="role" placeholder="Role of the employee" required>
                    </td>
                </tr>
                <tr>
                    <td>Lương:</td>
                    <td>
                        <input type="text" name="salary" placeholder="Salary of the employee" required>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Thêm mới" class="primary-default-btn table-edit_btn">
                    </td>
                </tr>
            </table>
        </form>
    </div>

@endsection