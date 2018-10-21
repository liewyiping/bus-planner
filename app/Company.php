<?php

namespace busplannersystem;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'busCompanyName'
    ];

    protected $table = 'companies';

    protected $primaryKey = 'busCompanyID';

    
}
