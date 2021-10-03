@extends('backend.master.master')
@section('content')
    <h2 class="main-title">Quản lý loại đồ ăn</h2>
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
                    <th>Tên loại</th>
                    <th>Ảnh loại</th>
                    <th>Nổi bật</th>
                    <th>Hoạt động</th>
                    <th>Chức năng</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                    <tr>
                    <td>{{$category->id}}.</td>
                    <td>{{$category->title}}</td>
                    <td>
                        <div class="categories-table-img">
                            <picture><source srcset="{{asset('backend/img/category/'.$category->image)}}" type="image/webp"><img src="{{asset('backend/img/category/'.$category->image)}}" alt="category"></picture>
                        </div>
                    </td>
                    <td>
                        <label class="users-table__checkbox">
                            <input @if($category->featured == "Yes") checked @endif type="checkbox" class="check">
                        </label>
                    </td>
                    <td>
                        <label class="users-table__checkbox">
                            <input @if($category->active == "Yes") checked @endif type="checkbox" class="check">
                        </label>
                    </td>
                    <td>
                        <span class="p-relative">
                        <button class="dropdown-btn transparent-btn" type="button" title="More info">
                            <div class="sr-only">More info</div>
                            <i data-feather="more-horizontal" aria-hidden="true"></i>
                        </button>
                        <ul class="users-item-dropdown dropdown">
                            <li><a href="{{asset('admin/category/edit/'.$category->id)}}">Cập nhật</a></li>
                            <li><a href="{{asset('admin/category/delete/'.$category->id)}}">Xóa</a></li>
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