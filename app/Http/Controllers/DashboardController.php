<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Order;
use App\User;

class DashboardController extends Controller
{

   /* public function __construct(){
        $this->middleware('auth:admin');
    }*/

    public function index(){
        $product= new Product();
        $order = new Order();
        $user = new User();

        return view('admin.Dashboard',compact('product','order','user'));
    }
}
