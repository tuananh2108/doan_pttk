<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User;
use App\models\order;
use Auth;
use DB;

class UserProfileController extends Controller
{
    public function getLogout()
    {
        Auth::logout();
        return redirect()->intended('/');
    }

    public function getUserProfile($id)
    {
        $data['user'] = User::find($id);
        return view('frontend.user_profile', $data);
    }

    public function postUserProfile(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->contact = $request->contact;
        $user->address = $request->address;
        $user->save();
        return back()->with('success', 'Thay đổi thông tin thành công!');
    }

    public function getUserPassword($id)
    {
        $data['user'] = User::find($id);
        return view('frontend.user_password', $data);
    }

    public function postUserPassword(Request $request, $id)
    {
        $user = User::find($id);
        if(Hash::check($request->current_password, $user->password)) {
            if($request->new_password==$request->confirm_password) {
                $user->password = Hash::make($request->new_password);
                $user->save();
                return redirect()->back()->with('success', 'Thay đổi mật khẩu thành công!');
            }
            else {
                return redirect()->back()->with('error', 'Mật khẩu xác nhận không trùng khớp!');
            }
        }
        else {
            return redirect()->back()->with('error', 'Mật khẩu hiện tại không đúng!');
        }
    }

    //purchase
    public function getUserPurchase($id)
    {
        $orders = order::where('user_id', $id)->orderBy('id', 'DESC')->get();
      
        return view('frontend.user_purchase', compact('orders'));
    }

     //purchase
    //  public function checkData()
    //  {
    //     $orders = order::where('user_id', 2)->get();
    //     $orderArray = [];
    //     foreach ($orders as $index => $order) {
    //         $orderArray[$index]['price'] = $order['total'];
    //         $orderArray[$index]['status'] = $order['status'];
    //         $foods = $order->foods()->get();
    //         if ($foods->count() > 0) {
    //             foreach ($foods as $food) {
    //                 $orderArray[$index]['foods'][] = $food;
    //             }
    //         }
    //     }
    //     dd($orderArray);
    //  }


    public function getCancelOrderPurchase($id) {
        $order = order::find($id);
        $order->status = "Đã hủy";
        $order->save();
        return redirect('user/purchase/'.Auth::user()->id)->with('success', 'Bạn đã hủy đơn thành công!');
    }

    // public function getCancelOrderLastest()
    // {
    //     //get user
    //     $user = Auth::user();
    //     $orderStatus = 'cancel'; // viet const o model
    //     $orderLastest = order::where('user_id', $user->id)
    //                             ->where('status', $orderStatus)
    //                             ->first();
    //     if ($orderLastest) {
    //         return view('xyz', $orderLastest);
    //     } else {
    //         return 've trang co button voi 1 message la ban chua co don gan nhat'
    //     }
        
    // }

    //mua lại đơn hàng
    public function getOrderPurchase($id) {
        $orders = DB::table('orders')
                            ->join('order_food', 'orders.id', '=', 'order_food.order_id')
                            ->join('foods', 'foods.id', '=', 'order_food.food_id')
                            ->select('order_food.food_id','order_food.quantity', 'foods.price', 'foods.title', 'foods.image')
                            ->where('orders.id', $id)
                            ->get();
        // foreach($orders as $order) {
        //     echo $order->food_id;
        // }
        session()->forget('cart');
        $cart = session()->get('cart');
        foreach($orders as $order) {
            $cart[$order->food_id] = [
                'food_id' => $order->food_id,
                'title' => $order->title,
                'image' => $order->image,
                'price' => $order->price,
                'quantity' => $order->quantity,
            ];
        }
        session()->put('cart', $cart);

        $data['carts'] = [];
        $data['carts'] = session()->get('cart');

        return view('frontend.cart', $data);
    }

    //lọc danh sách order trong trang user_purchase
    public function getOrderedPurchase($id)
    {
        $orders = order::where([['user_id', $id],['status', 'Đã xác nhận']])->orderBy('id', 'DESC')->get();
        return view('frontend.user_purchase-ordered', compact('orders'));
    }

    public function getOnDeliveryPurchase($id)
    {
        $orders = order::where([['user_id', $id],['status', 'Đang giao hàng']])->orderBy('id', 'DESC')->get();
        return view('frontend.user_purchase-onDelivery', compact('orders'));
    }

    public function getDeliveredPurchase($id)
    {
        $orders = order::where([['user_id', $id],['status', 'Đã giao hàng']])->orderBy('id', 'DESC')->get();
        return view('frontend.user_purchase-onDelivery', compact('orders'));
    }

    public function getCancelledPurchase($id)
    {
        $orders = order::where([['user_id', $id],['status', 'Đã hủy']])->orderBy('id', 'DESC')->get();
        return view('frontend.user_purchase-onDelivery', compact('orders'));
    }
}
