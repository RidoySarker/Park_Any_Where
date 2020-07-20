<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Packages extends Model
{
    protected $table = "packages";
    protected $primaryKey = "package_id";
    protected $fillable = ['package_name', 'vehicle_type', 'package_time', 'package_period', 'package_charge', 'package_note', 'package_status'];

    public function validation()
    {
        return [
            'package_name' => 'required',
            'vehicle_type' => 'required',
            'package_time' => 'required',
            'package_period' => 'required',
            'package_charge' => 'required',
            'package_status' => 'required',
        ];
    }

    public function message()
    {
        return [
            'package_name.required' => 'Package Name Required',
            'vehicle_type.required' => 'Vehicle Type Required',
            'package_time.required' => 'Package Time Required',
            'package_period.required' => 'Package Period Required',
            'package_charge.required' => 'Package Charge Required',
            'package_status.required' => 'Package Status Required',

        ];
    }

    public function scopeActive($query)
    {
        return $query->where('package_status', 1);
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
}
