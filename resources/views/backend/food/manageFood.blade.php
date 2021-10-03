@extends('backend.master.master')
@section('title', 'Món ăn')
@section('content')

    <h2 class="main-title">Quản lý món ăn</h2>
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
                        <th>Tên món</th>
                        <th>Đơn giá</th>
                        <th>Ảnh món</th>
                        <th>Nổi bật</th>
                        <th>Hoạt động</th>
                        <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($foods as $food)
                        <tr>
                            <td>{{$food->id}}.</td>
                            <td>{{$food->title}}</td>
                            <td>{{number_format($food->price,0,',','.')}} VND</td>
                            <td>
                                <div class="categories-table-img">
                                <picture><source srcset="{{asset('backend/img/food/'.$food->image)}}" type="image/webp"><img src="{{asset('backend/img/food/'.$food->image)}}" alt="category"></picture>
                                </div>
                            </td>
                            <td>
                                <label class="users-table__checkbox">
                                    <input @if($food->featured == "Yes") checked @endif type="checkbox" class="check">
                                </label>
                            </td>
                            <td>
                                <label class="users-table__checkbox">
                                    <input @if($food->active == "Yes") checked @endif type="checkbox" class="check">
                                </label>
                            </td>
                            <td>
                                <span class="p-relative">
                                    <button class="dropdown-btn transparent-btn" type="button" title="More info">
                                    <div class="sr-only">More info</div>
                                    <i data-feather="more-horizontal" aria-hidden="true"></i>
                                    </button>
                                    <ul class="users-item-dropdown dropdown">
                                    <li><a href="{{asset('admin/food/edit/'.$food->id)}}">Cập nhật</a></li>
                                    <li><a href="{{asset('admin/food/delete/'.$food->id)}}">Xóa</a></li>
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