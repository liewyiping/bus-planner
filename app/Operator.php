<?php

namespace busplannersystem;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Operator extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    protected $guard ='operator';
    protected $table = 'operators';

   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $primaryKey = 'operator_id';

    protected $fillable = [
        'license_number', 'bus_company_id', 'password',
    ];

   

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function user_operator(){

        return $this->belongsTo('busplannersystem\User', 'user_id_operators');
    
     }
}
