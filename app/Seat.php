<?php

namespace busplannersystem;

use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    protected $fillable = [
        'trip_id', 
        'seatNo', 'seatTaken', 'seatAvail', 'bus_layout' , 
        
    ];
    
    public $timestamps=false;

    protected $primaryKey = 'seatid';

    public function trip()
    {
        return $this->belongsTo('busplannersystem\Trip', 'trip_id');
    }
    
}
