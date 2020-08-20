<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
class PriceVechileInfo extends Model
{
    protected $table ="vechile_price_info";
    protected $primaryKey='price_vechile_info_id';
    protected $fillable=['parking_name','parking_price_id','vehicle_type','vehicle_charge','vehicle_time', 'vehicle_period', 'created_by' ,'updated_by'];

    public function vehicletype()
    {
        return $this->belongsTo("App\Vehicle", "vehicle_type");
    }
    
}
