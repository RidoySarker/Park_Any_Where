<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PackageRequest extends FormRequest
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
            'package_name' => 'required',
            'vehicle_type' => 'required',
            'package_time' => 'required',
            'package_period' => 'required',
            'package_charge' => 'required',
            'package_status' => 'required',
        ];
    }

    public function message()
    {
        return [
            'package_name.required' => 'Package Name Required',
            'vehicle_type.required' => 'Vehicle Type Required',
            'package_time.required' => 'Package Time Required',
            'package_period.required' => 'Package Period Required',
            'package_charge.required' => 'Package Charge Required',
            'package_status.required' => 'Package Status Required',

        ];
    }
}
