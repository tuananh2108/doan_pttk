<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\models\{category, order};
use Illuminate\Http\Request;
use App\Http\Requests\{AddCategoryRequest, EditCategoryRequest};
use App\Services\PermissionServices;

class CategoriesController extends Controller
{
    public function getCategory()
    {
        $data['qty_order'] = count(order::all());
        $data['categories'] = category::all();
        return view('backend.category.indexCategory', $data);
    }

    public function getAddCategory()
    {
        $data['qty_order'] = count(order::all());
        return view('backend.category.addCategory', $data);
    }

    public function postAddCategory(AddCategoryRequest $request)
    {
        $category = new category;
        $category->title=$request->title;
        if($request->hasFile('image'))
        {
            $file = $request->image;
            $filename= Str::random(9).'.'.$file->getClientOriginalExtension();
            $file->move('backend/img/category', $filename);
            $category->image=$filename;
        }
        else
        {
            $category->image = 'no-img.jpg';
        }
        $category->featured=$request->featured;
        $category->active=$request->active;
        $category->save();
        return redirect()->back()->with('success', 'Thêm thành công!');
    }

    public function getEditCategory($id)
    {
        $data['qty_order'] = count(order::all());
        $data['category'] = category::find($id);
        return view('backend.category.editCategory', $data);
    }

    public function postEditCategory(EditCategoryRequest $request, $id)
    {
        $category = category::find($id);
        $category->title=$request->title;
        if($request->hasFile('image'))
        {
            $file = $request->image;
            $filename= Str::random(9).'.'.$file->getClientOriginalExtension();
            $file->move('backend/img/category', $filename);
            $category->image=$filename;
        }
        $category->featured=$request->featured;
        $category->active=$request->active;
        $category->save();
        return redirect()->intended('admin/category')->with('success', 'Cập nhật thành công!');
    }

    public function getDeleteCategory($id)
    {
        category::destroy($id);
        return back()->with('success', 'Xóa thành công!');
    }
}
