@extends('backend.master.master')
@section('content')

    <h2 class="main-title">Quản lý đơn hàng</h2>
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
                        <th>ID</th>
                        <th>Tổng thanh tiền</th>
                        <th>Ngày đặt</th>
                        <th>Trạng thái</th>
                        <th>Tên khách hàng</th>
                        <th>Số điện thoại</th>
                        <th>Email</th>
                        <th>Địa chỉ</th>
                        <th>Chức năng</th>
                    </tr>
                </thead>
                <tbody>
                    @php $sn=1; @endphp
                    @foreach($orders as $order)
                    <tr>
                        <td class="users-table-td">{{$sn++}}.</td>
                        <td class="users-table-td">{{$order->id}}</td>
                        <td class="users-table-td">{{number_format($order->total)}} VND</td>
                        <td class="users-table-td">{{$order->order_date}}</td>
                        <td class="users-table-td">{{$order->status}}</td>
                        <td class="users-table-td">{{$order->customer_name}}</td>
                        <td class="users-table-td">{{$order->customer_contact}}</td>
                        <td class="users-table-td">{{$order->customer_email}}</td>
                        <td class="users-table-td">{{$order->customer_address}}</td>
                        <td>
                            <span class="p-relative">
                                <button class="dropdown-btn transparent-btn" type="button" title="More info">
                                <div class="sr-only">More info</div>
                                <i data-feather="more-horizontal" aria-hidden="true"></i>
                                </button>
                                <ul class="users-item-dropdown dropdown">
                                @if($order->status != "Đã hủy đơn")
                                <li><a href="{{asset('admin/order/update/'.$order->id)}}">Cập nhật</a></li>
                                @endif
                                <li><a href="{{asset('admin/order/delete/'.$order->id)}}">Xóa</a></li>
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