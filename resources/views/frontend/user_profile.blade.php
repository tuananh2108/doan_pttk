@extends('frontend.master')
@section('content')

<div class="user-profile">
    <div class="container user-main">
        <div class="user-sidebar">
            <div class="user-sidebar-head"></div>
            <div class="user-sidebar-body">
                <ul class="sidebar-body-menu">
                    @if(\Illuminate\Support\Facades\Auth::check())
                    <li>
                        <a href="##" class="dropdown-btn"><i class="fas fa-user-edit"></i>Tài khoản của tôi</a>
                        <ul class="sidebar-body-sub-menu">
                            <li><a href="{{asset('user/profile/'.Auth::user()->id)}}">Hồ sơ</a></li>
                            <li><a href="{{asset('user/password/'.Auth::user()->id)}}">Đổi mật khẩu</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{asset('user/purchase/'.Auth::user()->id)}}"><i class="far fa-file-alt"></i>Đơn mua</a>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
        <div class="user-content">
            <div class="user-content-head">
                <h3>Hồ sơ của tôi</h3>
                <p>Quản lý thông tin hồ sơ để bảo mật tài khoản</p>
            </div>
            @if(session()->has('success'))
                <div class="message-success message-user_profile">{{session()->get('success')}}</div>
            @endif
            <div class="user-content-body">
                <form action="" method="POST" enctype="multipart/form-data">
                @csrf
                        <div class="content-edit">
                            <div class="content-edit-item">
                                <p class="content-edit-title">Họ tên</p>
                                <input type="text" name="name" value="{{$user->name}}" required>
                            </div>
                            <div class="content-edit-item">
                                <p class="content-edit-title">Email</p>
                                <span>{{$user->email}}</span>
                            </div>
                            <div class="content-edit-item">
                                <p class="content-edit-title">Số điện thoại</p>
                                <input type="text" name="contact" value="{{$user->contact}}" required>
                            </div>
                            <div class="content-edit-item">
                                <p class="content-edit-title">Địa chỉ</p>
                                <textarea name="address" cols="30" rows="3" required>{{$user->address}}</textarea>
                            </div>
                            <input type="submit" name="submit" value="Lưu" class="btn btn-primary btn-user">
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection