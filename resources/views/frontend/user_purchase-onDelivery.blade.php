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
        <div class="user-purchase">
            <div class="user-purchase-head">
                <ul>
                    <li><a href="{{asset('user/purchase/'.Auth::user()->id)}}">Tất cả</a></li>
                    <li><a href="{{asset('user/purchase/ordered/'.Auth::user()->id)}}">Chờ xác nhận</a></li>
                    <li><a href="{{asset('user/purchase/on-delivery/'.Auth::user()->id)}}">Đang giao</a></li>
                    <li><a href="{{asset('user/purchase/delivered/'.Auth::user()->id)}}">Đã giao</a></li>
                    <li><a href="{{asset('user/purchase/cancelled/'.Auth::user()->id)}}">Đã hủy</a></li>
                </ul>
            </div>
            @if(session()->has('success'))
                <div class="message-success message-user_purchase">{{session()->get('success')}}</div>
            @endif
            <div class="user-purchase-body">
                @foreach($orders as $order)
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="purchase-detail">
                        <div class="purchase-detail-head">
                            <div class="purchase-detail-title text-right">
                                <h3>{{$order->status}}</h3>
                            </div>
                                <ul class="purchase-detail-body">
                                    @foreach ($order->foods as $food)
                                        <li>
                                            <div class="flex-item">
                                                <img src="{{asset('backend/img/food/'.$food->image)}}">
                                                <div class="purchase-detail-info">
                                                    <p>{{ $food->title }}</p>
                                                    <span>x{{ $food->pivot->quantity }}</span>
                                                </div>
                                            </div>
                                            <div class="purchase-detail-price"><p>{{number_format($food->price)}} VND</p></div>
                                        </li>
                                    @endforeach
                                </ul>
                        </div>
                        <div class="purchase-detail-footer text-right">
                            <div class="purchase-detail-total flex-item">
                                <p>Tổng số tiền: </p>
                                <p class="p-price">{{number_format($order->total)}} VND</p>
                            </div>
                            <div class="purchase-detail-link">
                                @if($order->status=='Đã xác nhận')
                                    <a href="{{asset('user/purchase/cancel/'.$order->id)}}" class="btn btn-primary">Hủy đơn</a>
                                @endif
                                <a href="{{asset('user/purchase/get/order/'.$order->id)}}" class="btn btn-primary">Mua Lần Nữa</a>
                            </div>
                        </div>
                    </div>
                </form>
                    @endforeach
            </div>
        </div>
    </div>
</div>

@endsection