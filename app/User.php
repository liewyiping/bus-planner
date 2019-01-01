<?php

namespace busplannersystem;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Mail;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role',
    ];

    protected $primaryKey = 'user_id'; 

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function tickets(){

        return $this->hasMany('busplannersystem\Ticket');
    }

    public function buses(){

        return $this->hasMany('busplannersystem\Bus');
    }

    public function applicationform(){

        return $this->hasOne('busplannersystem\ApplicationForm');

    }

    public function operator(){

        return $this->hasOne('busplannersystem\Operator');

    }

    public static function sendWelcomeEmail($user)
    {
      // Generate a new reset password token
      $token = app('auth.password.broker')->createToken($user);
      
      // Send email
      Mail::send('emails.welcome', ['user' => $user, 'token' => $token], function ($m) use ($user) {
        $m->from('hello@appsite.com', 'Your App Name');
        $m->to($user->email, $user->name)->subject('Welcome to Bus Planner System');
      });
    }


}
