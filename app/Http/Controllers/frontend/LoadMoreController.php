<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class LoadMoreController extends Controller
{
    function postLoadMoreFood(Request $request)
    {
        if($request->ajax())
        {
            if($request->id > 0)
            {
                $data = DB::table('foods')
                            ->where('id', '<', $request->id)
                            ->orderBy('id', 'DESC')
                            ->limit(6)
                            ->get();
            }
            else
            {
                $data = DB::table('foods')
                            ->orderBy('id', 'DESC')
                            ->limit(6)
                            ->get();
            }
            $output = '';
            $last_id = '';
            
            if(!$data->isEmpty())
            {
                foreach($data as $food)
                {
                    $output .= '
                        <div class="food-menu-box">
                            <div class="food-menu-img">
                                <img src="'.asset('backend/img/food/'.$food->image).'" alt="'.$food->title.'" class="img-responsive img-curve img-food">
                            </div>

                            <div class="food-menu-desc">
                                <h4 class="food-title">'.$food->title.'</h4>
                                <p class="food-price">'.number_format($food->price).' VND</p>
                                <p class="food-detail">'.$food->description.'</p>
                                <br>

                                <button type="button" id="'.$food->id.'" onclick="AddtoCartHome(this.id);" class="btn btn-primary">Thêm vào giỏ</button>
                            </div>
                        </div>
                    ';
                    $last_id = $food->id;
                }
                $output .= '
                        <p class="text-center btn-load_more">
                            <button type="button" name="load_more_button" data-id="'.$last_id.'" id="load_more_button" class="btn btn-load_more">Xem thêm</button>
                        </p>
                ';
            }
            else
            {
                $output .= '
                        <p class="text-center btn-load_more">
                            <button type="button" name="load_more_button" class="btn btn-load_more">Sản phẩm đang cập nhật thêm...</button>
                        </p>
                ';
            }
            echo $output;
        }
    }
}
