<?php

namespace App;
Use Auth;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $table ="vehicles";
    protected $primaryKey='vehicle_id';
    protected $fillable=['vehicle_type','vehicle_charge','vehicle_period','vehicle_status','created_by','updated_by'];


    public function validation(){

    	return [
            'vehicle_type' => 'required',
            'vehicle_charge' => 'required',
            'vehicle_period' => 'required',
            'vehicle_status' => 'required',
    	];
    }

    public function message(){

        return [
            'vehicle_type.required' => 'Vehicle Type Required',
            'vehicle_charge.required' => 'Enter Vehicle Charge',
            'vehicle_period.required' => 'Select Vehicle Period',
            'vehicle_status.required' => 'Select Status',
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


}
