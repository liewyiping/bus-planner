<?php

namespace busplannersystem;

use Illuminate\Database\Eloquent\Model;

class Route extends Model
{

    protected $fillable = [
        'route_name', 
        'operatorID' , 
        'origin_terminal',
        'destination_terminal',
        
    ];

    protected $table = 'routes';

    protected $primaryKey = 'routeID';
}
