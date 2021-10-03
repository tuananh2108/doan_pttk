<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{asset('backend/img/svg/Logo.svg')}}" type="image/x-icon">

    <title>Đăng ký</title>
    <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">
</head>
<body>
    <div class="header">
        <div class="logo">
            <a href="{{asset('/')}}" title="Logo">
                <img src="{{asset('frontend/img/12.png')}}" alt="Restaurant Logo" class="img-responsive">
            </a>
        </div>
        <p>Đăng ký</p>
    </div>
    <div class="container_login">
        <form action="" method="POST" enctype="multipart/form-data" class="form-lg-regt">
        @csrf
            <div class="form-lg-regt_main">
                <div class="form-lg-regt_sub-main">
                    <h3 class="lg-regt_title">Đăng ký</h3>
                    @if(session()->has('error'))
                        <div class="container">
                            <div class="message-error">{{session()->get('error')}}</div>
                        </div>
                    @endif
                    <div class="lg-regt_key">
                        <input type="text" name="name" placeholder="Họ tên đầy đủ" required>
                    </div>
                    <div class="lg-regt_key">
                        <input type="email" name="email" placeholder="Email đăng nhập" required>
                    </div>
                    <div class="lg-regt_key">
                        <input type="text" name="contact" placeholder="Số điện thoại liên hệ" required>
                    </div>
                    <div class="lg-regt_key">
                        <input type="text" name="address" placeholder="Địa chỉ thường trú" required>
                    </div>
                    <div class="lg-regt_password">
                        <input type="password" name="password" placeholder="Nhập mật khẩu" required>
                    </div>
                    <div class="lg-regt_password">
                        <input type="password" name="confirm_password" placeholder="Nhập lại mật khẩu" required>
                    </div>
                    <input type="submit" name="submit" value="Đăng ký" id="register-btn" onclick="messageRegister()" class="lg-regt_btn btn-primary">
                    <div class="lg-regt_orther">
                        <p>Bạn đã có tài khoản?</p>
                        <a href="{{asset('login')}}">Đăng nhập</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>

<script>
    // function messageRegister()
    // {
    //     alert('Đăng ký tài khoản thành công!');
    // }
</script>

</html>