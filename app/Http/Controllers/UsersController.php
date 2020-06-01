<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Order;

class UsersController extends Controller
{
    public function index(){
        $users = User::all();
        return view('admin.users.index',compact('users'));
    }

    public function show($id)
    {   
        //find the order
        $orders = Order::where('user_id',$id)->get();
        
        //return back to user detail
        return view('admin.users.details',compact('orders'));
    }

}
