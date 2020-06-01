<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AdminUser;
use Illuminate\Support\Str;
use DB;
use Mail;
use App\Mail\verifyemail;

class RegisterController extends Controller
{
    //
   
   public function __construct(){
       $this->middleware('guest:admin');
   }


    public function index(){
        return view('admin.register');
    }

    public function store(Request $request){
        //validate the user
        $request->validate([
            'name'=> 'required',
            'email'=>'required|email',
            'password'=>'required',
            
        ]);
        //return redirect()->to('admin/activation')->with('success');
        $user = AdminUser::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'verifytoken' => Str::random(40),
        ]);
       $thisUser = AdminUser::findOrFail($user->id);
       $this->sendEmail($thisUser);
       
       
       return redirect()->to('admin/verifyemail');
       // return redirect('/admin/login')->with('msg','You r registered with new user, you can login as ur new user now!');

        }   
    

    public function verifyemail() {
        return view('admin.activation');
    }
       
    

    public function sendEmail($thisUser) {
        Mail::to($thisUser['email'])->send(new verifyemail($thisUser));
    }
    
    public function emailSent($email, $verifytoken){
        $user = AdminUser::where(["email"=>$email, "verifytoken"=>$verifytoken])->first();
    
        if($user){
         AdminUser::where(["email"=>$email, "verifytoken"=>$verifytoken])->update(["status" => 1,"verifytoken" => NULL]);
        return redirect('admin/login')->with('msg','Your Email is verified , you can login now!');
        }else{
            return "user not found";
        }    
      }
    

}
