<?php

namespace busplannersystem;

use Illuminate\Database\Eloquent\Model;

class ApplicationForm extends Model
{
    

    protected $fillable = [
        'name', 'email' , 'file_link' ,'company_name', 'operator_resume','operator_license'
 
 
    ];
 
    protected $table = 'programs';
 








}
