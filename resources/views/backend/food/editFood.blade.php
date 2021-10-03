@extends('backend.master.master')
<!-- @section('title', 'Thêm món ăn') -->
@section('content')

    <h2 class="main-title">Cập nhật món ăn</h2>
    <div class="main-edit">
        <form action="" method="POST" enctype="multipart/form-data">
            @csrf
            <table class="table-edit">
                <tr>
                    <td>Tên món:</td>
                    <td>
                        <input type="text" name="title" value="{{$food->title}}" required>
                    </td>
                </tr>
                <tr>
                    <td>Miêu tả:</td>
                    <td>
                        <textarea name="description" id="" cols="40" rows="5" required>{{$food->description}}</textarea>
                    </td>
                </tr>
                <tr>
                    <td>Đơn giá:</td>
                    <td>
                        <input type="number" name="price" value="{{$food->price}}" required>
                    </td>
                </tr>
                <tr>
                    <td>Ảnh hiện hành:</td>
                    <td>
                        <img src="{{asset('backend/img/food/'.$food->image)}}" width="150px">
                    </td>
                </tr>
                <tr>
                    <td>Ảnh mới:</td>
                    <td>
                        <input type="file" name="image" class="table-edit_file">
                    </td>
                </tr>
                <tr>
                    <td>Thuộc loại:</td>
                    <td>
                        <select name="category">
                            @foreach($categories as $category)
                                <option value="{{$category->id}}" @if($category->id==$food->category_id) selected @endif>{{$category->title}}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Nổi bật:</td>
                    <td>
                        <input @if($food->featured == "Yes") checked @endif type="radio" name="featured" value="Yes" required><span>Yes</span>
                        <input @if($food->featured == "No") checked @endif type="radio" name="featured" value="No" required><span>No</span>
                    </td>
                </tr>
                <tr>
                    <td>Hoạt động:</td>
                    <td>
                        <input @if($food->active == "Yes") checked @endif type="radio" name="active" value="Yes" required><span>Yes</span>
                        <input @if($food->active == "No") checked @endif type="radio" name="active" value="No" required><span>No</span>
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