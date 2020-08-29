<?php

namespace App;
Use Auth;
use Illuminate\Database\Eloquent\Model;

class ParkingZone extends Model
{
    protected $table = "parking_zones";
    protected $primaryKey='parking_zone_id';
    protected $fillable=['parking_name','location_zone_name','latitude','longitude','parking_limit','parking_address','parking_note','parking_status','created_by','updated_by'];


    public function scopeActive($query)
    {
        return $query->where('parking_status', 1);
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

    public function locationzone()
    {
        return $this->belongsTo("App\LocationZone", "location_zone_name");
    }

    public function ParkingSpace()
    {
        return $this->hasMany("App\ParkingSpace", "parking_name");
    }

}
