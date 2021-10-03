@extends('backend.master.master')
<!-- @section('title', 'Update Category') -->
@section('content')

    <h2 class="main-title">Cập nhật loại đồ ăn</h2>
    <div class="main-edit">
        <form action="" method="POST" enctype="multipart/form-data">
            @csrf
            <table class="table-edit">
                <tr>
                    <td>Tên loại:</td>
                    <td>
                        <input type="text" name="title" value="{{$category->title}}" required>
                    </td>
                </tr>
                <tr>
                    <td>Ảnh hiện tại:</td>
                    <td>
                        <img src="{{asset('backend/img/category/'.$category->image)}}" alt="" width="150px">
                    </td>
                </tr>
                <tr>
                    <td>Ảnh mới:</td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>
                <tr>
                    <td>Nổi bật:</td>
                    <td>
                        <input @if($category->featured == "Yes") checked @endif type="radio" name="featured" value="Yes" required><span>Yes</span>
                        <input @if($category->featured == "No") checked @endif type="radio" name="featured" value="No" required><span>No</span>
                    </td>
                </tr>
                <tr>
                    <td>Hoạt động:</td>
                    <td>
                        <input @if($category->active == "Yes") checked @endif type="radio" name="active" value="Yes" required><span>Yes</span>
                        <input @if($category->active == "No") checked @endif type="radio" name="active" value="No" required><span>No</span>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Cập nhật" class="primary-default-btn table-edit_btn">
                    </td>
                </tr>
            </table>
        </form>
    </div>

@endsection