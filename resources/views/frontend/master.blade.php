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

<body>
    <!-- Navbar Section Starts Here -->
    <section class="navbar">
        <div class="container">
            <div class="logo">
                <a href="{{asset('/')}}" title="Logo">
                    <img src="{{asset('frontend/img/12.png')}}" alt="Restaurant Logo" class="img-responsive">
                </a>
            </div>

            <div class="menu text-right">
                <ul class="menu_list">
                    <li class="menu_item">
                        <a href="{{asset('/')}}">Trang chủ</a>
                    </li>
                    <li class="menu_item">
                        <a href="{{asset('category/')}}">Loại món ăn</a>
                    </li>
                    <li class="menu_item">
                        <a href="{{asset('food/')}}">Món ăn</a>
                    </li>
                    <li class="menu_item">
                        <a href="{{asset('cart/')}}"><i class="fa fa-shopping-cart"></i></a>
                        <span></span>
                    </li>
                    <li class="menu_item">
                    @if(!\Illuminate\Support\Facades\Auth::check())
                        <a href="{{asset('logout')}}">Đăng nhập</a>  
                    @else
                        <div class="user">
                            <p>{{ Auth::user()->name }}<i class="fas fa-sort-down"></i></p>
                            <!-- <i class="fas fa-user-circle"></i> -->
                            <div class="user_list">
                                <div class="user_item">
                                    <p><a href="{{asset('user/profile/'.Auth::user()->id)}}">Tài khoản của tôi</a></p>
                                </div>
                                <div class="user_item">
                                    <p><a href="{{asset('user/purchase/'.Auth::user()->id)}}">Đơn Mua</a></p>
                                </div>
                                <div class="user_item">
                                    <p><a href="{{asset('user/check-logout')}}">Đăng xuất</a></p>
                                </div>
                            </div>
                        </div>
                    @endif
                    </li>
                </ul>
            </div>

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Navbar Section Ends Here -->
    
    <div>
        @yield('content') 
    </div>

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
            <p>Thiết kế bởi <a href="#">Group 8</a>.</p>
        </div>
    </section>
    <!-- footer Section Ends Here -->


    <script src="{{asset('frontend/js/main.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        //add cart
        function addToCart(event) {
            event.preventDefault();
            let url = $(this).data('url');
            console.log(url);
            $.ajax({
                type: "GET",
                url: url,
                dataType: 'json',
                success: function(data) {
                    if(data.code === 200) {
                        alert('Thêm món ăn vào giỏ hàng thành công!');
                    }
                },
                error: function() {

                }
            });
        }

        $(function(){
            $('.add_to_cart').on('click', addToCart);
            // $(document).on('click', '.add_to_cart', cartUpdate);
        });

        //update cart
        function cartUpdate(event) {
            event.preventDefault();
            let url = $('.update_cart_url').data('url');
            let id = $(this).data('id');
            let quantity = $(this).parents('tr').find('input.cart-qty').val();

            $.ajax({
                type: "GET",
                url: url,
                data: {id: id, quantity: quantity},
                success: function(data) {
                    if(data.code === 200) {
                        $('body').html(data.cartComponent);
                        alert('Cập nhật thành công!');
                    }
                },
                error: function() {

                }
            });
        }

        //Remove cart
        function cartRemove(event) {
            event.preventDefault();
            let url = $('.remove_cart_url').data('url');
            let id = $(this).data('id');
            $.ajax({
                type: "GET",
                url: url,
                data: {id: id},
                success: function(data) {
                    if(data.code === 200) {
                        $('body').html(data.cartComponent);
                        alert('Cập nhật thành công!');
                    }
                },
                error: function() {

                }
            });
        }

        $(function() {
            $(document).on('click', '.cart_update', cartUpdate);
            $(document).on('click', '.cart_remove', cartRemove);
        });
    </script>

    <script>
        function AddtoCartHome(food_id)
        {
            let id = food_id;
            let path_url = document.URL + 'cart/add/'.concat(id);
            console.log(path_url);
            $.ajax({
                type: "GET",
                url: path_url,
                dataType: 'json',
                success: function(data) {
                    if(data.code === 200) {
                        alert('Thêm món ăn vào giỏ hàng thành công!');
                    }
                },
                error: function() {

                }
            });
        }
    </script>

    <!-- load_data -->
    <script type="text/javascript">
        $(document).ready(function(){
            var _token = $('input[name="_token"]').val();

            load_more('', _token);

            function load_more(id = '', _token)
            {
                $.ajax({
                    url:'{{ url('/load-more') }}',
                    method:"POST",
                    data:{id:id, _token:_token},
                    success:function(data)
                    {
                        $('#load_more_button').remove();
                        $('#post_food').append(data);
                    }
                })
            }

            $(document).on('click', '#load_more_button', function(){
                var id =  $(this).data('id');
                $('#load_more_button').html('<p>Loading...</p>');
                load_more(id, _token);
            });
        });
    </script>

</body>
</html>