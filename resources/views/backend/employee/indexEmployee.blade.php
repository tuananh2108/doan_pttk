@extends('backend.master.master')
@section('content')

    <h2 class="main-title">Quản lý nhân viên</h2>
    @if(session()->has('success'))
    <div class="message-success">{{session()->get('success')}}</div>
    @endif
    <div class="row">
        <div class="col-lg-12">
        <div class="users-table table-wrapper">
            <table class="posts-table">
            <thead>
                <tr class="users-table-info">
                <th>STT</th>
                <th>Họ tên</th>
                <th>Email</th>
                <th>Số điện thoại</th>
                <th>Địa chỉ</th>
                <th>Chức vụ</th>
                <th>Lương</th>
                <th>Chức năng</th>
                </tr>
            </thead>
            <tbody>
                @foreach($employees as $employee)
                <tr>
                <td>{{$employee->id}}.</td>
                <td>{{$employee->name}}</td>
                <td>{{$employee->email}}</td>
                <td>{{$employee->phone}}</td>
                <td>{{$employee->address}}</td>
                <td>{{$employee->role}}</td>
                <td>{{number_format($employee->salary,0,',','.')}} VND</td>
                <td>
                    <span class="p-relative">
                    <button class="dropdown-btn transparent-btn" type="button" title="More info">
                        <div class="sr-only">More info</div>
                        <i data-feather="more-horizontal" aria-hidden="true"></i>
                    </button>
                    <ul class="users-item-dropdown dropdown">
                        <li><a href="{{asset('admin/employee/edit/'.$employee->id)}}">Cập nhật</a></li>
                        <li><a href="{{asset('admin/employee/delete/'.$employee->id)}}">Xóa</a></li>
                    </ul>
                    </span>
                </td>
                </tr>
                @endforeach
            </tbody>
            </table>
        </div>
        </div>
    </div>

@endsection