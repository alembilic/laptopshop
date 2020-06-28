<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrdersProduct;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public static function orders(){
        $user_id = Auth::user()->id;
        $order = Order::where('user_id',$user_id)->where('ordered', 0)->first();
        $order ? $items = OrdersProduct::where('order_id',$order->id)->count() : $items=0;

        return $items;
    }
}
