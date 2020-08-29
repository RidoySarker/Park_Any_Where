<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
class InvoicePaymentInfo extends Model
{
    protected $table = "invoice_payment_info";
    protected $primaryKey = "invoice_payment_info_id";
    protected $fillable = ['invoice_base_info_id', 'booking_id', 'customer_id', 'invoice_total', 'invoice_vat','invoice_discount','invoice_sub_total','pay_amount','due_amount','invoice_payment_method','invoice_transaction_number','created_by','updated_by'];


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
