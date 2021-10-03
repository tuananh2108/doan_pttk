<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{asset('backend/img/svg/Logo.svg')}}" type="image/x-icon">

    <title>NuceFood|Nơi thỏa sức ăn uống</title>

    <!-- Link our CSS file -->
    <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/fonts/fontawesome-free-5.15.3-web/css/all.css')}}">
</head>
<style>
    #change-infomation {
        display: none;
    }
</style>

<body>
    <!-- Navbar Section Starts Here -->
    <section class="navbar">
        <div class="header">
            <div class="logo">
                <a href="{{asset('/')}}">
                    <img src="{{asset('frontend/img/12.png')}}" alt="Restaurant Logo" class="img-responsive">
                </a>
            </div>
            <p>Thanh Toán</p>
        </div>
    </section>
    <!-- Navbar Section Ends Here -->

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search">
        <div class="container">

            <form action="" method="POST" enctype="multipart/form-data" class="order">
            @csrf
                <fieldset>
                    <legend>Địa chỉ nhận hàng</legend>
                    @if(\Illuminate\Support\Facades\Auth::check())
                        <div class="grow" id="user-auth">
                            <input type="hidden" name="user_auth" value="1">
                            <div>
                                <div>{{ Auth::user()->name }}</div>
                                <div>{{ Auth::user()->contact }}</div>
                            </div>
                            <div>{{ Auth::user()->email }}</div>
                            <div>{{Auth::user()->address}}</div>
                            <div class="btn-change" onclick="changeInfomation()">Thay đổi</div>
                        </div>
                        
                        <div class="grow" id="change-infomation">
                            <input type="hidden" name="user_auth" value="2">
                            <div class="col-2">
                                <div class="order-label">Họ tên người nhận</div>
                                <input type="text" name="full_name" placeholder="Ví dụ. Hoàng Tuấn Anh" class="input-responsive" required>
            
                                <div class="order-label">Số điện thoại</div>
                                <input type="tel" name="contact" placeholder="Ví dụ. 0329xxxxxx" class="input-responsive" required>
                            </div>
        
                            <div class="col-2">
                                <div class="order-label">Email</div>
                                <input type="email" name="email" placeholder="Ví dụ. htg2182000@gmail.com" class="input-responsive" required>

                                <div class="order-label">Địa chỉ nhận hàng</div>
                                <textarea name="address" rows="1" placeholder="Ví dụ. Ngõ 1, Bùi Xương Trạch, Khương Đình, Thanh Xuân, Hà Nội" class="input-responsive" required></textarea>
                            </div>
                        </div>
                    @else
                        <div class="grow">
                            <div class="col-2">
                                <div class="order-label">Họ tên người nhận</div>
                                <input type="text" name="full_name" placeholder="Ví dụ. Hoàng Tuấn Anh" class="input-responsive" required>
            
                                <div class="order-label">Số điện thoại</div>
                                <input type="tel" name="contact" placeholder="Ví dụ. 0329xxxxxx" class="input-responsive" required>
                            </div>
        
                            <div class="col-2">
                                <div class="order-label">Email</div>
                                <input type="email" name="email" placeholder="Ví dụ. htg2182000@gmail.com" class="input-responsive" required>

                                <div class="order-label">Địa chỉ nhận hàng</div>
                                <textarea name="address" rows="1" placeholder="Ví dụ. Ngõ 1, Bùi Xương Trạch, Khương Đình, Thanh Xuân, Hà Nội" class="input-responsive" required></textarea>
                            </div>
                        </div>
                    @endif

                </fieldset>

                <fieldset>
                    <legend>Sản phẩm</legend>

                    <table>
                        <tr>
                            <th class="text-left">Sản phẩm</th>
                            <th>Đơn giá</th>
                            <th>Số lượng</th>
                            <th>Thành tiền</th>
                        </tr>

                        @php
                        $total = 0;
                        @endphp
                        @foreach($carts as $cart)
                        @php
                            $total += $cart['price']*$cart['quantity']; 
                        @endphp
                        <tr>
                            <td class="flex-item">
                                <img src="{{asset('backend/img/food/'.$cart['image'])}}" alt="" class="food_order-img">
                                <p class="food_order-title">{{$cart['title']}}</p>
                            </td>
                            <td class="text-center">{{number_format($cart['price'])}} VND</td>
                            <td class="text-center">{{$cart['quantity']}}</td>
                            <td class="text-center">{{number_format($cart['price']*$cart['quantity'])}} VND</td>
                        </tr>
                        @endforeach

                    </table>

                    <div class="order_pay">
                        <div class="order_total-payment">
                            <span class="order_total">Tổng thanh toán:</span>
                            <span class="order_price" name="total_order">{{number_format($total)}} VND</span>
                        </div>
                        <input type="submit" name="submit" value="Đặt Hàng" class="btn btn-primary order_pay-btn">
                    </div>

                </fieldset>

            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

    <!-- social Section Starts Here -->
    <section class="social">
        <div class="container text-center">
            <ul>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/50/000000/facebook-new.png"/></a>
                </li>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/48/000000/instagram-new.png"/></a>
                </li>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/48/000000/twitter.png"/></a>
                </li>
            </ul>
        </div>
    </section>
    <!-- social Section Ends Here -->

    <!-- footer Section Starts Here -->
    <section class="footer">
        <div class="container text-center">
            <p>All rights reserved. Designed By <a href="#">Group 8</a></p>
        </div>
    </section>
    <!-- footer Section Ends Here -->

</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function changeInfomation()
    {
        $('#change-infomation').css('display', 'flex');
        $('#user-auth').css('display', 'none');
    }
</script>
</html>