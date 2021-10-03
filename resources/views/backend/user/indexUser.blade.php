@extends('backend.master.master')
@section('content')

    <h2 class="main-title">Quản lý tài khoản</h2>
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
                <th>Mật khẩu</th>
                <th>Vai trò</th>
                <th>Chức năng</th>
                </tr>
            </thead>
            <tbody>
                @php $sn = 1; @endphp
                    @foreach($users as $user)
                    <tr>
                        <td>{{$sn++}}.</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->password}}</td>
                        <td>{{$user->uid}}</td>
                        <td>
                            <span class="p-relative">
                            <button class="dropdown-btn transparent-btn" type="button" title="More info">
                                <div class="sr-only">More info</div>
                                <i data-feather="more-horizontal" aria-hidden="true"></i>
                            </button>
                            <ul class="users-item-dropdown dropdown">
                                <li><a href="{{asset('admin/user/edit/'.$user->id)}}">Cập nhật</a></li>
                                <li><a href="{{asset('admin/user/delete/'.$user->id)}}">Xóa</a></li>
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