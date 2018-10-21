<?php

namespace busplannersystem;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = [
        'company_name', 
        'busID' , 
        'date_depart',
        'time_depart',
        'ticket_price',
    ];

    protected $table = 'tickets';

    protected $primaryKey = 'tripID';

    

   
}
