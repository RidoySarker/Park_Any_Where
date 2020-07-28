<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Packages extends Model
{
    protected $table = "packages";
    protected $primaryKey = "package_id";
    protected $fillable = ['package_name', 'vehicle_type', 'package_time', 'package_period', 'package_charge', 'package_note', 'package_status'];



    public function scopeActive($query)
    {
        return $query->where('package_status', 1);
    }
    
    public function scopeSearch($query, $search){
        return $query->where('package_name', 'like', "%$search%");
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
