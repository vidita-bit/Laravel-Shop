<?php

use Illuminate\Support\Facades\Route;


Auth::routes(['verify' => true]);


//Admin Route
Route::prefix('admin')->group(function(){

    Route::middleware('auth:admin')->group(function(){
        //Dashboard
        Route::get('/', 'DashboardController@index');//->middleware('verified');
        //Products
        Route::resource('/products','ProductController');
        //Orders
        Route::resource('/orders','OrderController');
        Route::get('/confirm/{id}','OrderController@confirm')->name('order.confirm');
        Route::get('/pending/{id}','OrderController@pending')->name('order.pending');
        //users
        Route::resource('/users','UsersController');
        //logout
        Route::get('/logout','AdminUserController@logout')->name('admin.logout');

    });

        Route::post('/password/email','AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
         Route::get('/password/reset','AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
         Route::post('/password/reset','AdminResetPasswordController@reset')->name('admin.password.update');
        Route::get('/password/reset/{token}','AdminResetPasswordController@showResetForm')->name('admin.password.reset');

    //Admin login
    
    Route::get('/login','AdminUserController@index')->name('admin.login');
    Route::post('/login','AdminUserController@store');
    Route::get('/register','RegisterController@index')->name('admin.register');//->middleware('guest:admin');
    Route::post('/register','RegisterController@store');
    Route::get('/verifyemail','RegisterController@verifyemail')->name('admin.verifyemail');
    Route::get('/verifyemail/{email}/{verifytoken}', ['uses' =>'RegisterController@emailSent', 'as'=>'admin.emailSent']);
    Route::get('/resend','AdminVerificationController@index')->name('admin.resendEmail');
    Route::post('/resend','AdminVerificationController@resend')->name('admin.resend');
    
    Route::get('/email/sent','AdminVerificationController@emailResend');
    Route::get('/email/sent/{email}/{verifytoken}', ['uses' =>'AdminVerificationController@emailSent', 'as'=>'admin.email.Sent']);
    
});


    //front route
    Route::get('/','Front\HomeController@index');

    //user registration
    Route::get('/users/register','Front\RegistrationController@index');
    Route::post('/users/register','Front\RegistrationController@store');
    Route::get('/user/profile','Front\UserProfileController@index');
    //reset password
    Route::post('/user/reset_password_with_token', 'AccountsController@resetPassword');

    //user login
    Route::get('/user/login','Front\SessionController@index');
    Route::post('/user/login','Front\SessionController@store');
    //user logout
    Route::get('/user/logout','Front\SessionController@logout');
    //order detail
    Route::get('/user/order/{id}','Front\UserProfileController@show');

    //cart
    Route::get('/cart','Front\CartController@index')->middleware('verified');
    Route::post('/cart','Front\CartController@store')->name('cart');
    Route::patch('/cart/update/{product}','Front\CartController@update')->name('cart.update');
    Route::delete('/cart/remove/{product}','Front\CartController@destroy')->name('cart-destroy');
    Route::get('empty',function(){
        Cart::instance('default')->destroy();
    });
    Route::post('/cart/saveLater/{product}','Front\CartController@saveLater')->name('cart-saveLater');
    //save for later
    Route::delete('/saveLater/destroy/{product}','Front\SaveLaterController@destroy')->name('saveLater.destroy');
    Route::post('/cart/moveToCart/{product}','Front\SaveLaterController@moveToCart')->name('moveToCart');

    //checkout
    Route::get('/checkout','Front\CheckoutController@index');
    Route::post('/checkout','Front\CheckoutController@store')->name('checkout');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
