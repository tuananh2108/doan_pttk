@extends('backend.master.master')
@section('content')

    <h2 class="main-title">Cập nhật đơn hàng</h2>
    <div class="row">
        <div class="col-1"></div>
        <div class="col-6">
            <div class="main-content">
                <form action="" method="POST">
                    @csrf
                    <table class="table-edit">
                        <tr>
                            <td>Mã đơn hàng</td>
                            <td class="col-sm-8">{{$order->id}}</td>
                        </tr>
                        <tr>
                            <td>Tổng thanh toán</td>
                            <td class="col-sm-8">{{number_format($order->total)}} VND</td>
                        </tr>
                        <tr>
                            <td>Ngày đặt hàng</td>
                            <td class="col-sm-8">{{$order->order_date}}</td>
                        </tr>
                        <tr>
                            <td>Trạng thái</td>
                            <td class="col-sm-8">
                                <select name="order_status">
                                    @if($order->status == "Đã xác nhận")
                                    <option value="1">Đã xác nhận</option>
                                    <option value="2">Đang giao hàng</option>
                                    <option value="3">Đã giao hàng</option>
                                    <option value="4">Đã hủy</option>
                                    @elseif($order->status == "Đang giao hàng")
                                    <option value="2">Đang giao hàng</option>
                                    <option value="3">Đã giao hàng</option>
                                    <option value="4">Đã hủy</option>
                                    <option value="1">Đã xác nhận</option>
                                    @elseif($order->status == "Đã giao hàng")
                                    <option value="3">Đã giao hàng</option>
                                    <option value="4">Đã hủy</option>
                                    <option value="1">Đã xác nhận</option>
                                    <option value="2">Đang giao hàng</option>
                                    @else
                                    <option value="4">Đã hủy</option>
                                    <option value="1">Đã xác nhận</option>
                                    <option value="2">Đang giao hàng</option>
                                    <option value="3">Đã giao hàng</option>
                                    @endif
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Tên khách hàng</td>
                            <td class="col-sm-8">{{$order->customer_name}}</td>
                        </tr>
                        <tr>
                            <td>Số điện thoại</td>
                            <td class="col-sm-8">{{$order->customer_contact}}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td class="col-sm-8">{{$order->customer_email}}</td>
                        </tr>
                        <tr>
                            <td>Địa chỉ</td>
                            <td class="col-sm-8">{{$order->customer_address}}</td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="submit" name="submit" value="Cập nhật" class="primary-default-btn table-edit_btn">
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
        <div class="col-4">
            <div class="users-table">
                <table>
                    <thead>
                        <th></th>
                        <th>Tên món</th>
                        <th>Đơn giá</th>
                        <th>Số lượng</th>
                    </thead>
                    <tbody>
                        @php $sn=1; @endphp
                        @foreach($foods as $food)
                        <tr class="col-sm-4">
                            <td>{{$sn++}}.</td>
                            <td>{{$food->title}}</td>
                            <td>{{ number_format($food->price) }} VND</td>
                            <td>{{ $food->quantity }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection