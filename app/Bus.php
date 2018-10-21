<?php

namespace busplannersystem;

use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    

    protected $fillable = [
         'totSeat','id', 'registration_plate'


    ];

    protected $table = 'buses';

    protected $primaryKey = 'busID';

    
}
