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
}
