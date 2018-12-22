<?php

namespace busplannersystem;

use Illuminate\Database\Eloquent\Model;

class BusRoute extends Model
{
    protected $primaryKey = 'bus_route_id';

    protected $fillable = [
         'route_id', 
         'bus_id',


    ];

    protected $table = 'bus_routes';

    public function bus()
    {
        return $this->belongsTo('busplannersystem\Bus', 'bus_id');
    }

    public function route()
    {
        return $this->belongsTo('busplannersystem\Route', 'route_id');
    }

}
