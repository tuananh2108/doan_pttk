<?php

namespace App\Http\Controllers\frontend;
use App\Http\Controllers\frontend\DateTime;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\{food, order};
use App\User;
use Auth;
// use App\Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function getAddCart($id)
    {
        // session()->flush('cart');

        $food = food::find($id);
        $cart = session()->get('cart');
        if(isset($cart[$id])) {
            $cart[$id]['quantity'] = $cart[$id]['quantity'] + 1;
        }
        else {
            $cart[$id] = [
                'food_id' => $food->id,
                'title' => $food->title,
                'image' => $food->image,
                'price' => $food->price,
                'quantity' => 1
            ];
        }
        session()->put('cart', $cart);
        // echo "<pre>";
        // print_r(session()->get('cart'));
        return response()->json([
            'code' => 200,
            'message' => 'success'
        ], 200);
    }

    public function index()
    {
        $carts = session()->get('cart');
        $data['carts'] = [];
        if (isset($carts)) {
            $data['carts'] = session()->get('cart');
        }
        return view('frontend.cart', $data);
    }

    public function getUpdateCart(Request $request) 
    {
        if($request->id && $request->quantity) {
            $carts = session()->get('cart');
            $carts[$request->id]['quantity'] = $request->quantity;
            session()->put('cart', $carts);
            $data['carts'] = session()->get('cart');
            $cartComponent = view('frontend.cart', $data)->render();
            return response()->json(['cartComponent' => $cartComponent, 'code' => 200], 200);
        }
    }

    public function getRemoveCart(Request $request)
    {
        if($request->id) {
            $carts = session()->get('cart');
            unset($carts[$request->id]);
            session()->put('cart', $carts);
            $data['carts'] = session()->get('cart');
            $cartComponent = view('frontend.cart', $data)->render();
            return response()->json(['cartComponent' => $cartComponent, 'code' => 200], 200);
        }
    }

    public function getDeleteCart()
    {
        session()->forget('cart');
        return redirect('cart');
    }

    //show thanh toán
    public function getCheckOut() 
    {
        $data['carts'] = session()->get('cart');
        return view('frontend.orders', $data);
    }

    public function postCheckOut(Request $request) 
    {
        $order = new order;
        $total = 0;
        $carts = session()->get('cart');
        foreach($carts as $cart) {
            $total += $cart['price']*$cart['quantity'];
        }

        // $user = User::all();
        if(Auth::check()) {
            $order->total = $total;
            $order->order_date = new \DateTime();
            $order->status = "Đã xác nhận";
            $order->user_id = Auth::user()->id;
            if($request->user_auth == 1)
            {
                $order->customer_name = Auth::user()->name;
                $order->customer_contact = Auth::user()->contact;
                $order->customer_email = Auth::user()->email;
                $order->customer_address = Auth::user()->address;
            }
            else if ($request->user_auth == 2)
            {
                $order->customer_name = $request->full_name;
                $order->customer_contact = $request->contact;
                $order->customer_email = $request->email;
                $order->customer_address = $request->address;
            }
        }
        else {
            $order->total = $total;
            $order->order_date = new \DateTime();
            $order->status = "Đã xác nhận";
            $order->customer_name = $request->full_name;
            $order->customer_contact = $request->contact;
            $order->customer_email = $request->email;
            $order->customer_address = $request->address;
        }
        $order->save();

        foreach ($carts as $cart) {
            $order->foods()->attach($cart['food_id'], ['quantity' => $cart['quantity']]);
        }
        // delete cart session
        $deleteSession = session()->forget('cart');
        return redirect('/')->with('success', 'Đặt hàng thành công!');
    }
}
