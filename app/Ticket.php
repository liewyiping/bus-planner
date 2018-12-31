<?php

namespace busplannersystem;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{

  protected $fillable = [
           'ticket_id',
           'route_id',
           'bus_id',
           'bus_company_id',
           'destination',
           'depart',
           'booked_total',
           'seat_no',
           'date',
           'time',
           'price_total',
         ];

    protected $primaryKey="ticket_id";
  
    public function user()
    {
        return $this->belongsTo('busplannersystem\User', 'user_id');
    }

    public function route()
    {
        return $this->belongsTo('busplannersystem\User', 'user_id');
    }

    public function trip()
    {
        return $this->belongsTo('busplannersystem\Trip', 'trip_id');
    }

    

    




}
