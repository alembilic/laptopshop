<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Mews\Purifier\Purifier;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $featuredProducts = Product::where('available',1)->orderBy('id','desc')->paginate(4);
        $popularProducts = Product::where('available',1)->orderBy('views','desc')->paginate(6);
        $productsNo = Product::where('available',1)->count();
        $views = Product::where('available',1)->sum('views');

        return view('home', compact('featuredProducts', 'popularProducts','productsNo','views'));
    }

    public function contact_us(){
        return view('contact_us');
    }

    public function contact_us_form(Request $request){
        $data['request']=$request;
        MailController::html_email2($data);

        return $this->index();
    }
}
