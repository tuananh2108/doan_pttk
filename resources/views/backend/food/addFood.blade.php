@extends('backend.master.master')
@section('title', 'Thêm món ăn')
@section('content')

    <h2 class="main-title">Thêm món ăn</h2>
    @if(session()->has('success'))
    <div class="message-success">{{session()->get('success')}}</div>
    @endif
    <div class="main-edit">
        <form action="" method="POST" enctype="multipart/form-data">
        @csrf
            <table class="table-edit">
                <tr>
                    <td>Tên món:</td>
                    <td>
                        <input type="text" name="title" required>
                    </td>
                </tr>
                <tr>
                    <td>Miêu tả:</td>
                    <td>
                        <textarea name="description" id="" cols="40" rows="5" required></textarea>
                    </td>
                </tr>
                <tr>
                    <td>Đơn giá:</td>
                    <td>
                        <input type="number" name="price" required>
                    </td>
                </tr>
                <tr>
                    <td>Chọn ảnh:</td>
                    <td>
                        <input type="file" name="image" class="table-edit_file" required>
                    </td>
                </tr>
                <tr>
                    <td>Thuộc loại:</td>
                    <td>
                        <select name="category" id="">
                            @foreach($catelist as $cate)
                                <option value="{{$cate->id}}">{{$cate->title}}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Nổi bật:</td>
                    <td>
                        <input type="radio" name="featured" value="Yes" required><span>Yes</span>
                        <input type="radio" name="featured" value="No" required><span>No</span>
                    </td>
                </tr>
                <tr>
                    <td>Hoạt động:</td>
                    <td>
                        <input type="radio" name="active" value="Yes" required><span>Yes</span>
                        <input type="radio" name="active" value="No" required><span>No</span>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Thêm mới" class="primary-default-btn table-edit_btn">
                    </td>
                </tr>
            </table>
        </form>
    </div>

@endsection