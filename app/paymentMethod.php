<?php

namespace App;
use Auth;
use Illuminate\Database\Eloquent\Model;

class paymentMethod extends Model
{
    protected $table ="payment_methods";
    protected $primaryKey='payment_method_id';

    protected $fillable=['payment_method_name','payment_method_description','payment_method_status','created_by','updated_by'];

    public function scopeSearch($query, $search){
        return $query->where('payment_method_name', 'LIKE', '%' . $search . '%')
                    ->orwhere('payment_method_description', 'like' ,"%$search%");
    }

    public function scopeActive($query)
    {
        return $query->where('payment_method_status', 1);
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
