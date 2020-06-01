<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Password;
class AdminForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    public function __construct(){
        $this->middleware('guest:admin');
    }

    public function showLinkRequestForm()
    {
        return view('admin.admin-email');
    }

     protected function guard()
     {
         return Auth::guard('admin');
     }

    protected function broker()
    {
        return Password::broker('admin');
    }
}
