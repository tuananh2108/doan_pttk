@extends('frontend.master')

@section('content')
    <div class="cart">
        <div class="container remove_cart_url" data-url="{{asset('cart/remove')}}">
            <div class="cart-content">
                <table class="cart_table update_cart_url" data-url="{{asset('cart/update')}}">
                    <thead>
                        <tr>
                            <th></th>
                            <th class="text-left cart-th">Sản phẩm</th>
                            <th>Đơn giá</th>
                            <th>Số lượng</th>
                            <th>Thành tiền</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
    
                    <tbody>
                        @php
                            $total = 0;
                            $sn = 0;
                        @endphp
                        @if (count($carts) > 0)
                            @foreach($carts as $id => $cart)
                                @php
                                    $sn++;
                                    $total += $cart['price']*$cart['quantity']; 
                                @endphp
                            <tr>
                                <td>{{$sn}}.</td>
                                <td class="flex-item">
                                    <img src="{{asset('backend/img/food/'.$cart['image'])}}" class="cart-img">
                                    <p class="food_order-title">{{$cart['title']}}</p>
                                </td>
                                <td class="text-center">{{number_format($cart['price'])}} VND</td>
                                <td class="text-center">
                                    <input type="number" value="{{$cart['quantity']}}" min="1" class="cart-qty">
                                </td>
                                <td class="text-center">{{number_format($cart['price']*$cart['quantity'])}} VND</td>
                                <td class="text-center">
                                    <a href="" data-id="{{$id}}" class="btn btn-primary cart-btn cart_update">Cập nhật</a>
                                    <a href="" data-id="{{$id}}" class="btn btn-remove cart-btn cart_remove">Xóa</a>
                                </td>
                            </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
    
                <div class="cart-footer">
                    <div class="cart-total flex-item">
                        <p>Tổng thanh toán: </p>
                        <span>{{number_format($total)}} VND</span>
                    </div>
                    <div class="flex-item cart-footer-link">
                        <a href="{{asset('cart/delete')}}" class="btn btn-delete cart-btn">Xóa tất cả</a>
                        @if (count($carts) > 0)
                        <a href="{{asset('checkout')}}" class="btn btn-primary cart-btn">Thanh toán</a>
                        @else
                        <button href="" class="btn btn-primary cart-btn">Thanh toán</button>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection