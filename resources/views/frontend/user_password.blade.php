@extends('frontend.master')
@section('content')

<div class="user-profile">
    <div class="container user-main">
        <div class="user-sidebar">
            <div class="user-sidebar-head"></div>
            <div class="user-sidebar-body">
                <ul class="sidebar-body-menu">
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
                </ul>
            </div>
        </div>
        <div class="user-content">
            <div class="user-content-head">
                <h3>Thêm mật khẩu</h3>
                <p>Để bảo mật tài khoản, vui lòng không chia sẻ mật khẩu cho người khác</p>
            </div>
            @if(session()->has('success'))
                <div class="message-success message-user_profile">{{session()->get('success')}}</div>
            @elseif(session()->has('error'))
                <div class="message-error message-user_profile">{{session()->get('error')}}</div>
            @endif
            <div class="user-content-body">
                <form action="" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="content-edit">
                        <div class="content-edit-item">
                            <p class="content-edit-title">Mật khẩu hiện tại</p>
                            <input type="password" name="current_password" required>
                        </div>
                        <div class="content-edit-item">
                            <p class="content-edit-title">Mật khẩu mới</p>
                            <input type="password" name="new_password" required>
                        </div>
                        <div class="content-edit-item">
                            <p class="content-edit-title">Xác nhận mật khẩu</p>
                            <input type="password" name="confirm_password" required>
                        </div>
                        <input type="submit" name="submit" value="Xác nhận" class="btn btn-primary btn-user">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection