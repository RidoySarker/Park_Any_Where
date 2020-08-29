<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
Use Auth;
class UserVehicle extends Model
{
    protected $table ="user_vehicles";
    protected $primaryKey='user_vehicle_id';
    protected $fillable=['user_id','licence_no','vehicle_image','vehicle_color','note','v_status','created_by','updated_by'];

    public function scopeActive($query)
    {
        return $query->where('v_status', 1);
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
