<?php

namespace busplannersystem;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

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



}
