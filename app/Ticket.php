<?php

namespace busplannersystem;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = [
           'ticketID',
           'routeID',
           'busID',
           'busCompanyID',
           'destination',
           'depart',
           'bookedTot',
           'seatNo',
           'date',
           'time',
           'priceTot',
        ];
}
