<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
class InvoiceBaseInfo extends Model
{
    protected $table = "invoice_base_info";
    protected $primaryKey = "invoice_base_info_id";
    protected $fillable = ['invoice_code', 'invoice_date', 'customer_id','created_by','updated_by'];


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
