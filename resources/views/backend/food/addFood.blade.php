@extends('backend.master.master')
@section('title', 'Thêm món ăn')
@section('content')
<div class="main-content">
        <div class="wrapper">
            <h1>Add Food</h1>

            <br><br>
            <!-- Add category Form -->
            <form action="" method="POST" enctype="multipart/form-data">
                @csrf
                @include('errors.note')
                <table class="tbl-30">
                    <tr>
                        <td>Title:</td>
                        <td><input type="text" name="title" placeholder="Title of the Food."></td>
                    </tr>

                    <tr>
                        <td>Description:</td>
                        <td>
                            <textarea name="description" id="" cols="30" rows="5" placeholder="Description of the Food."></textarea>
                        </td>
                    </tr>

                    <tr>
                        <td>Price:</td>
                        <td>
                            <input type="number" name="price">
                        </td>
                    </tr>

                    <tr>
                        <td>Select Image:</td>
                        <td><input type="file" name="image"></td>
                    </tr>

                    <tr>
                        <td>Category</td>
                        <td>
                            <select require name="category" id="">
                                @foreach($catelist as $cate)
                                <option value="{{$cate->id}}">{{$cate->title}}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td>Featured:</td>
                        <td>
                            <input type="radio" name="featured" value="Yes">Yes 
                            <input type="radio" name="featured" value="No">No 
                        </td>
                    </tr>

                    <tr>
                        <td>Active:</td>
                        <td>
                            <input type="radio" name="active" value="Yes">Yes 
                            <input type="radio" name="active" value="No">No 
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <input type="submit" name="submit" value="Add Food" class="btn-secondary">
                        </td>
                    </tr>
                </table>
            </form>
            
        </div>
    </div>
@endsection