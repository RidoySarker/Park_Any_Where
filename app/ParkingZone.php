<?php

namespace App;
Use Auth;
use Illuminate\Database\Eloquent\Model;

class ParkingZone extends Model
{
    protected $table = "parking_zones";
    protected $primaryKey='parking_zone_id';
    protected $fillable=['parking_name','latitude','longitude','parking_type','package_name','vehicle_type','parking_charge','parking_time','parking_period','parking_limit','parking_address','parking_note','parking_status','created_by','updated_by'];


    public function validation()
    {
        return [
            'parking_name' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'parking_limit' => 'required',
            'parking_address' => 'required',
            'parking_status' => 'required',
            'parking_type' => 'required',
        ];
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

    public function vehicleType()
    {
        return $this->belongsTo("App\Vehicle", "vehicle_type");
    }

    public function PackageVehicle()
    {
        return $this->belongsTo("App\Packages", "package_name");
    }


}
