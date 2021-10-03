@extends('frontend.master')
@section('content')

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <form action="{{asset('search/')}}" role="search" method="GET">
                <input type="search" name="search" placeholder="Bạn muốn ăn gì?" required>
                <input type="submit" name="submit" value="Tìm kiếm" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Thực đơn</h2>
            @foreach($foods as $food)
                <div class="food-menu-box">
                    <div class="food-menu-img">
                        <img src="{{asset('backend/img/food/'.$food->image)}}" alt="{{$food->title}}" class="img-responsive img-curve img-food">
                    </div>

                    <div class="food-menu-desc">
                        <h4 class="food-title">{{$food->title}}</h4>
                        <p class="food-price">{{number_format($food->price)}} VND</p>
                        <p class="food-detail">{{$food->description}}</p>
                        <br>

                        <a href="#" data-url="{{asset('cart/add/'.$food->id)}}" class="btn btn-primary add_to_cart">Thêm vào giỏ</a>
                    </div>
                </div>
            @endforeach
            <div class="clearfix"></div>
        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

@endsection