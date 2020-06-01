<?php

namespace App;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use\App\Notifications\AdminResetPasswordNotification;
use\App\Notifications\AdminSendVerificationEmail;
use \App\Http\Controllers\AdminVerificationController;

class AdminUser extends Authenticatable implements MustVerifyEmail
{
    use Notifiable; 

    protected $guard = 'admin';
    
    protected $fillable = [
        'name', 'email', 'password','verifytoken'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new AdminResetPasswordNotification($token));
       

    }

    public function sendEmailVerifiactionNotification($hash,$id) 
    {

        $this->notify(new AdminSendVerificationEmail($hash,$id));
     }

    public function order()
    {
        return $this->hasMany(Order::class);
    }
}
