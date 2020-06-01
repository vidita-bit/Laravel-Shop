<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Str;

class RegistrationController extends Controller
{

    public function index(){
        return view('front.registrations.index');
    }

    public function store(Request $request){
        //validate the user
        $request->validate([
            'name'=> 'required',
            'email'=>'required',
            'password'=>'required|confirmed',
            'address'=>'required'
        ]);

        //save the data
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'address' => $request->address
        ]);

        //sign the user
        auth()->login($user);


        //Redirect to
        return redirect('/user/profile/')->with('msg','verify your email');

    }
}
