<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;

class OrderController extends Controller
{
    public function index(){
        $orders = Order::all();
        return view('admin.orders.index',compact('orders'));
    }
    public function confirm($id){
        //find order
        $order = Order::find($id);

        //update order
        $order -> update(['status'=>1]);

        //session message
        session()->flash('msg','Order has been confirmed');

        //redirect back
        return redirect('admin/orders');
    }
    
    public function pending($id){
        //find order
        $order = Order::find($id);

        //update order
        $order -> update(['status'=>0]);

        //session message
        session()->flash('msg','Order has been again into pending');

        //redirect back
        return redirect('admin/orders');
    }

    public function show($id){
        $order = Order::find($id);
        return view('admin.orders.details',compact('order'));
    }
}
