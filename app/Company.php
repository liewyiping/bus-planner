<?php
namespace busplannersystem;
use Illuminate\Database\Eloquent\Model;
class Company extends Model
{

    protected $primaryKey = 'bus_company_id';

    protected $fillable = [
        'bus_company_name',
    ];

    protected $table = 'companies';
    
}