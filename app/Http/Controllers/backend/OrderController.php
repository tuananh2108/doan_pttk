<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\{order, food};
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function getOrder()
    {
        $data['qty_order'] = count(order::all());
        $data['orders'] = DB::table('orders')
                            ->orderBy('orders.id', 'desc')
                            ->get();
        
        return view('backend.order.indexOrder', $data);
    }

    public function getUpdateOrder($id)
    {
        $data['qty_order'] = count(order::all());
        $data['order'] = order::find($id);
        $data['foods'] = DB::table('order_food')
                            ->join('foods', 'order_food.food_id', '=', 'foods.id')
                            ->select('foods.title', 'foods.price', 'order_food.quantity')
                            ->where('order_food.order_id', $id)
                            ->get();
        return view('backend.order.update_order', $data);
    }

    public function postUpdateOrder(Request $request, $id) 
    {
        $order = order::find($id);
        if($request->order_status == 1) {
            $order->status = "Đã xác nhận";
        }
        elseif($request->order_status == 2) {
            $order->status = "Đang giao hàng";
        }
        elseif($request->order_status == 3) {
            $order->status = "Đã giao hàng";
        }
        else {
            $order->status = "Đã hủy";
        }
        $order->save();
        return redirect('admin/order')->with('success', 'Cập nhật thành công!');
    }

    public function getDeleteOrder($id)
    {
        order::destroy($id);
        return back()->with('success', 'Xóa thành công!');
    }
}
