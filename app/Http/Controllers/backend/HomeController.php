<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\models\{order, food, category};

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getLogout()
    {
        Auth::logout();
        return redirect()->intended('login');
    }

    public function index()
    {
        $data['qty_order'] = count(order::all());
        $data['qty_category'] = count(category::all());
        $data['qty_food'] = count(food::all());
        $orders = order::all();
        $data['total_revenue'] = 0;
        foreach($orders as $order)
        {
            $data['total_revenue'] += $order->total;
        }
        return view('backend.index', $data);
    }

}
