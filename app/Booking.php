<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
class Booking extends Model
{
    protected $table = "bookings";
    protected $primaryKey = "booking_id";
    protected $fillable = ['invoice_base_info_id','parking_name', 'vehicle_type', 'parking_space', 'customer_id', 'invoice_total', 'invoice_vat','invoice_discount','invoice_sub_total','vehicle_licence','vehicle_time','arrival_time','release_time','booking_status','created_by','updated_by'];


    public function scopeActive($query)
    {
        return $query->where('booking_status', 1);
    }



    public function validation()
    {
        return [
            'vehicle_type' => 'required',
            'parking_space' => 'required',
            'vehicle_time' => 'required',
            'vehicle_licence' => 'required',
            'vehicle_period' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'parking_space.required' => 'Select Parking Space',
        ];
    }


    public function parkingname()
    {
        return $this->belongsTo("App\ParkingZone", "parking_name");
    }

    public function parkingspace()
    {
        return $this->belongsTo("App\ParkingSpace", "parking_space");
    }

    public function invoiceInfo()
    {
        return $this->belongsTo("App\InvoiceBaseInfo", "invoice_base_info_id");
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
