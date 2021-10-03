<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\models\{food, order};
use App\models\category;
use App\Http\Requests\AddFoodRequest;
use DB;

class FoodController extends Controller
{
    public function getFood()
    {
        $data['qty_order'] = count(order::all());
        $data['foods'] = food::all();
        return view('backend.food.manageFood', $data);
    }

    public function getAddFood()
    {
        $data['qty_order'] = count(order::all());
        $data['catelist'] = category::all();
        return view('backend.food.addFood', $data);
    }

    public function postAddFood(AddFoodRequest $request)
    {
        //$filename = $request->image->getClientOriginalName();
        $food = new food;
        $food->title = $request->title;
        $food->description = $request->description;
        $food->price = $request->price;
        //$food->image = $filename;
        if($request->hasFile('image'))
        {
            $file = $request->image;
            $filename= Str::random(9).'.'.$file->getClientOriginalExtension();
            $file->move('backend/img/food', $filename);
            $food->image=$filename;
        }
        else
        {
            $food->image = 'no-img.jpg';
        }
        $food->category_id = $request->category;
        $food->featured = $request->featured;
        $food->active = $request->active;
        $food->save();
        //$request->image->storeAs('img', $filename);
        return redirect()->back()->with('success', 'Thêm thành công!');
    }

    public function getEditFood($id)
    {
        $data['qty_order'] = count(order::all());
        $data['food'] = food::find($id);
        $data['categories'] = category::all();
        return view('backend.food.editFood', $data);
    }

    public function postEditFood(Request $request, $id)
    {
        $food = food::find($id);
        $arr['title'] = $request->title;
        $arr['description'] = $request->description;
        $arr['price'] = $request->price;
        if($request->hasFile('image'))
        {
            $file = $request->image;
            $filename = Str::random(9).'.'.$file->getClientOriginalExtension();
            $file->move('backend/img/food', $filename);
            $arr['image'] = $filename;
        }
        $arr['category_id'] = $request->category;
        $arr['featured'] = $request->featured;
        $arr['active'] = $request->active;
        $food::where('id', $id)->update($arr);

        return redirect('admin/food')->with('success', 'Cập nhật thành công!');
    }

    public function getDeleteFood($id)
    {
        food::destroy($id);
        return back()->with('success', 'Xóa thành công!');
    }
}
