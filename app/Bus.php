<?php

namespace busplannersystem;

use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    
    protected $primaryKey = 'bus_id';

    protected $fillable = [
         'total_seat', 'registration_plate', 'operator_id',


    ];

    protected $table = 'buses';

    public function user(){

        return $this->belongsTo('busplannersystem\User');
    
     }

     public function routes(){

          return $this->hasMany('busplannersystem\Route');
      
       }


}
