<?php
namespace busplannersystem;
use Illuminate\Database\Eloquent\Model;
class Route extends Model
{

	protected $primaryKey = 'route_id';

    protected $fillable = [
        'route_name', 
        'operator_id' , 
        'origin_terminal',
        'destination_terminal',
        
    ];
    
    protected $table = 'routes';
    
}