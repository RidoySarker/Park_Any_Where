<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class paymentMethod extends Model
{
    protected $table ="payment_methods";
    protected $primaryKey='payment_method_id';

    protected $fillable=['payment_method_name','payment_method_description','payment_method_status'];

    public function validation()
    {
        return [
            'payment_method_name' => 'required',
            'payment_method_description' => 'required',
            'payment_method_status' => 'required',
        ];
    }

    public function message()
    {
        return [
            'payment_method_name.required' => 'Name Required',
            'payment_method_description.required' => 'Description Required',
            'payment_method_status.required' => 'Status Required',
        ];
    }
}
