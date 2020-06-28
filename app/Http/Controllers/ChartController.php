<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrdersProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChartController extends Controller
{
    public function index(){
        $user_id = Auth::user()->id;
        $order = Order::where('user_id',$user_id)->where('ordered', 0)->first();
        if($order)$items = OrdersProduct::where('order_id', $order->id)->with('products')->get();
        else $items=[];

        return view('chart', compact('items'));
    }

    public function add($id){
        $user_id = Auth::user()->id;
        $order = Order::where('user_id',$user_id)->where('ordered', 0)->first();
        if ($order){
            $this->add_item($id, $order->id);
        }else{
            $order = new Order();
            $order->user_id = $user_id;
            $order->ordered = 0;
            $order->save();

            $this->add_item($id, $order->id);
        }
    }

    public function add_item($id, $order_id){
        $exists = OrdersProduct::where('order_id',$order_id)->where('product_id', $id)->first();
        if ($exists){
            echo json_encode(['message' => "This product has been already added!", 'type' => 'warn']);
        }else{
            $item = new OrdersProduct();
            $item->order_id=$order_id;
            $item->product_id=$id;
            $item->save();

            echo json_encode(['message' => "Product has been added to cart!", 'type' => 'success']);
        }
    }

    public function delete($id){
        $item = OrdersProduct::where('id',$id)->delete();
        echo json_encode(['message' => "Product has been removed!", 'type' => 'danger']);
    }

    public function delete_all(){
        $user_id = Auth::user()->id;
        $order = Order::where('user_id',$user_id)->where('ordered', 0)->first();
        $item = OrdersProduct::where('order_id',$order->id)->delete();
        echo json_encode(['message' => "Products has been removed!", 'type' => 'danger']);
    }

    public function order(){
        $user = Auth::user();
        $order = Order::where('user_id',$user->id)->where('ordered', 0)->first();
        $items = OrdersProduct::where('order_id', $order->id)->with('products')->get();

        $order->ordered=1;
        $order->update();

        $data['user']=$user;
        $data['items']=$items;
        MailController::html_email($data);
    }
}
