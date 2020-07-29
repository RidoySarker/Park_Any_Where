<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class paymentMethodRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
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