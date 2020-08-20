<?php

namespace App;
use Auth;
use Illuminate\Database\Eloquent\Model;

class ParkingPrice extends Model
{
    protected $table ="parking_prices";
    protected $primaryKey='parking_price_id';
    protected $fillable=['parking_name', 'price_status', 'created_by' ,'updated_by'];

    public function scopeSearch($query, $search){
        return $query->where('parking_name', 'LIKE', '%' . $search . '%');
    }

    public function scopeActive($query)
    {
        return $query->where('location_zone_status', 1);
    }

    public function parkingzone()
    {
        return $this->belongsTo("App\ParkingZone", "parking_name");
    }

    public static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            $model->created_by = Auth::user()->id;
        });

        static::updating(function ($model) {
            $model->updated_by = Auth::user()->id;
        });
    }
}
