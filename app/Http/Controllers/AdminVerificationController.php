<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AdminUser;
use Illuminate\Support\Str;
use DB;
use Mail;
use Illuminate\Support\Facades\Auth;

use App\Mail\resendVerificationEmail;

class AdminVerificationController extends Controller
{
public function index(){
    return view('admin.users.resend');
}

public function resend(Request $request)
{
    # code...
    $user = $request->only('email');
    
    
    
    //$request->request->add(['password' => $thisUser['password']]);
     $request->validate([
         'email'=>'required|email',
        
    //     //'password'
        
        
     ]);

    $user = $request->only('email');
  
    if(!AdminUser::where(['email'=> $user['email']])){//Auth::guard('admin')->attempt($user)){   
        //return redirect('/admin/login')-with('msg','Error occurred!'); 
         return back()->withErrors([
              'message' => 'Wrong credentials please try again'
              ]); 
    }else{
        //session message
        //$thisUser = AdminUser::where(['email'=> $user['email']])->first();
        $thisUser = AdminUser::where(['email'=> $user['email']])->first();
        //$thisUser[] = $thisUse->all();
        $this->sendEmail($thisUser);
        return redirect()->to('/admin/email/sent');

// //redirection
//return 'ab'; 
 
    }

    
  }
  public function emailResend(){
    return view('admin.activation');
}


  

  public function sendEmail($thisUser) {
    Mail::to($thisUser['email'])->send(new resendVerificationEmail($thisUser));
}

public function emailSent($email,$verifytoken){
    $user = AdminUser::where(["email"=>$email, "verifytoken"=>$verifytoken])->first();

    if($user){
     AdminUser::where(["email"=>$email, "verifytoken"=>$verifytoken])->update(["status" => 1,"verifytoken" => NULL]);
    return redirect('/admin/login')->with('msg','Your Email is verified , you can login now!');
    }else{
        return "user not found";
    }    
  }

}
