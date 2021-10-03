@extends('backend.master.master')
<!-- @section('title', 'Thêm món ăn') -->
@section('content')

    <h2 class="main-title">Cập nhật vai trò</h2>
    <div class="main-edit">
        <form action="" method="POST" enctype="multipart/form-data">
            @csrf
            <table class="table-edit">
                <tr>
                    <td>Họ tên:</td>
                    <td>
                        {{$user->name}}
                    </td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td>
                        {{$user->email}}
                    </td>
                </tr>
                <tr>
                    <td>Mật khẩu:</td>
                    <td>
                        {{$user->password}}
                    </td>
                </tr>
                <tr>
                    <td>Vai trò:</td>
                    <td>
                        <select name="role_id">
                            @foreach($roles as $role)
                                <option value="{{$role->id}}" @if($role->id==$user->role_id) selected @endif>{{$role->uid}}</option>
                            @endforeach
                        </select>
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