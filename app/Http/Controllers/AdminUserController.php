<?php

namespace App\Http\Controllers;
use App\AdminUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminUserController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
        //$this->middleware(['verified:admin']);
    }

    public function index()
    {
        return view('admin.login');
    }

    
    public function store(Request $request){
        
        //validate the user
        $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);
        //Log the user
        $credentials = $request->only('email','password');
        $user = AdminUser::where(['email'=>$credentials['email']])->pluck('status');
        
        
        if($user[0]==0){
            
            return redirect('admin/resend')->with('msg','Verify your email first!');
            //return redirect('/admin/login')->with('msg','Verify your email first!');
        }else{

            if(!Auth::guard('admin')->attempt($credentials)){    
                return back()->withErrors([
                    'message' => 'Wrong Credentials please try again'
                    ]); 
            }else{
                //session message
        session()->flash('msg','You hav logged in');

        // //redirection
         return redirect('./admin');
        }
    

            
            }
        }
        
    
        

    
    public function logout(){
        auth()->guard('admin')->logout();

        session()->flash('msg','You have been Logged out');

        return redirect('/admin/login');
    }

}
