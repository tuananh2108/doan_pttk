<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{asset('backend/img/svg/Logo.svg')}}" type="image/x-icon">

    <title>Đăng nhập</title>
    <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">
</head>
<body>
    <div class="header">
        <div class="logo">
            <a href="{{asset('/')}}" title="Logo">
                <img src="{{asset('frontend/img/12.png')}}" alt="Restaurant Logo" class="img-responsive">
            </a>
        </div>
        <p>Đăng nhập</p>
    </div>
    <div class="container_login">
        <form action="" method="POST" class="form-lg-regt">
            @csrf
            <div class="form-lg-regt_main">
                <div class="form-lg-regt_sub-main">
                    <h3 class="lg-regt_title">Đăng nhập</h3>
                    @if(session()->has('success'))
                        <div class="container">
                            <div class="message-success">{{session()->get('success')}}</div>
                        </div>
                    @endif
                    <div class="lg-regt_key">
                        <input type="email" name="email" value="{{old('email')}}" placeholder="Email" required>
                    </div>
                    <div class="lg-regt_password">
                        <input type="password" name="password" placeholder="Mật khẩu" required>
                    </div>
                    <br>
                    <div style="float: left;">
                        <input type="checkbox" name="remember" value="Remember Me"> Nhớ tôi
                    </div>
                    <br>
                    <div>
                    <br>
                        @include('errors.note') 
                    </div>
                    <input type="submit" name="submit" value="Đăng nhập" class="lg-regt_btn btn-primary">
                    <div class="lg-regt_orther">
                        <p>Bạn mới biết đến NuceFood?</p>
                        <a href="{{asset('register')}}">Đăng ký</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>
</html>