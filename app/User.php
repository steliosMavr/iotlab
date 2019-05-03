<?php

namespace App;

use App\Notifications\VerifyEmail;
use App\Notifications\ResetPassword;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','token',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function verified(){


        return $this->token === null;

    }

    public function sendPasswordResetNotification($token)
    {
       // Your your own implementation.
        $this->notify(new ResetPassword($token));
    }

    public function projects(){
        return $this->hasMany('App\Project');
    }


    public function sendVerificationEmail(){

        $this->notify(new VerifyEmail($this));

    }


}
