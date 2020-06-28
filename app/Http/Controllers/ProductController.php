<?php

namespace App\Http\Controllers;

use App\Product;
use App\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Console\Input\Input;

class ProductController extends Controller
{
    public function view($id){
        $product = Product::where('id', $id)->first();
        $product->views=$product->views+1;
        $product->update();

        $reviews=Review::where('product_id',$id)->with('user')->orderBy('id','desc')->paginate(3);

        if (Auth::user()){
            $user_id = Auth::user()->id;
            $reviewed = Review::where('product_id', $id)->where('user_id',$user_id)->count();
        }else{
            $reviewed=1;
        }

        return view('product', compact('product','id','reviewed','reviews'));
    }

    public function index(Request $request){
        $q = $request->q;
        if($q != ""){
            $products = Product::where('available', 1)->where ( 'title', 'LIKE', '%' . $q . '%' )->orWhere ( 'description', 'LIKE', '%' . $q . '%' )->paginate (9)->setPath ( '' );
        }else{
            $products = Product::where('available', 1)->paginate(6);
        }

        return view('products', compact('products','q'));
    }

    public function review(Request $request){
        $user_id = Auth::user()->id;

        $review = new Review();
        $review->review=$request->review;
        $review->rating=$request->rating;
        $review->user_id=$user_id;
        $review->product_id=$request->product_id;
        $review->save();

        return $this->view($request->product_id);
    }
}
