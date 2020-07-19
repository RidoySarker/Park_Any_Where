<?php

namespace App;
Use Auth;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $table ="vehicles";
    protected $primaryKey='vehicle_id';
    protected $fillable=['vehicle_type','vehicle_charge','vehicle_time','vehicle_period','vehicle_status','created_by','updated_by'];


    
    public function scopeSearch($query, $search){
        return $query->where('vehicle_type', 'LIKE', '%' . $search . '%')
                    ->orwhere('vehicle_charge', 'like' ,"%$search%");
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
