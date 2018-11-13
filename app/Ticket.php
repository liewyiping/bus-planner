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

}
