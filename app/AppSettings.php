<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class AppSettings extends Model
{
    protected $table = "app_settings";
    protected $primaryKey = "appsettings_id";
    protected $fillable = ['application_logo', 'application_name', 'application_email', 'application_phone', 'application_address','about','vat','created_by','updated_by'];


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
