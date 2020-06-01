<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;

class HomeController extends Controller
{
    public function index(){
        $products = Product::inRandomOrder()->take(4)->get();
       
        return view('front.index',compact('products'));
    }
}

