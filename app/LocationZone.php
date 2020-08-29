<?php

namespace App;
use Auth;
use Illuminate\Database\Eloquent\Model;

class LocationZone extends Model
{
    protected $table ="location_zones";
    protected $primaryKey='location_zone_id';
    protected $fillable=['location_zone_name','location_zone_description','location_zone_status','created_by','updated_by'];

    public function scopeSearch($query, $search){
        return $query->where('location_zone_name', 'LIKE', '%' . $search . '%');
    }

    public function scopeActive($query)
    {
        return $query->where('location_zone_status', 1);
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
