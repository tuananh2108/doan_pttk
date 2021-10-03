<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\{category, food};

class IndexController extends Controller
{
    public function index()
    {
        $data['carts'] = session()->get('cart');
        $data['categories'] = category::where([['featured','Yes'],['active','Yes']])->orderBy('id', 'desc')->take(3)->get();
        $data['foods'] = food::where([['featured','Yes'],['active','Yes']])->take(4)->get();
        return view('frontend.home', $data);
    }

    public function getFood()
    {
        $data['carts'] = session()->get('cart');
        $data['foods'] = food::where('active', 'Yes')->orderBy('id', 'desc')->get();
        return view('frontend.foods', $data);
    }

    public function getFoodCategory($id) {
        $data['carts'] = session()->get('cart');
        $data['category'] = category::find($id);
        $data['foods'] = food::where('category_id', $id)->orderBy('id', 'desc')->get();
        return view('frontend.category_food', $data);
    }

    public function getCategory() {
        $data['carts'] = session()->get('cart');
        $data['categories'] = category::where('active','Yes')->orderBy('id', 'desc')->get();
        return view('frontend.categories', $data);
    }

    public function getSearch(Request $request)
    {
        $data['carts'] = session()->get('cart');
        $search = $request->search;
        $data['keyword'] = $search;
        $search = str_replace(' ', '%', $search);
        $data['foods'] = food::where('title', 'like', '%'.$search.'%')->orderBy('id', 'desc')->get();
        return view('frontend.search', $data);
    }
}
