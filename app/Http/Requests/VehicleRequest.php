<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VehicleRequest extends FormRequest
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
        $vehicle = $this->route('vehicle');

        return [
            'vehicle_type' => 'required|unique:vehicles,vehicle_type,'.$vehicle.',vehicle_id',
            'vehicle_charge' => 'required',
            'vehicle_time' => 'required',
            'vehicle_period' => 'required',
            'vehicle_status' => 'required',
        ];
    }

    public function messages(){

        return [
            'vehicle_type.required' => 'Vehicle Type Required',
            'vehicle_charge.required' => 'Enter Vehicle Charge',
            'vehicle_time.required' => 'Enter Vehicle Time',
            'vehicle_period.required' => 'Select Vehicle Period',
            'vehicle_status.required' => 'Select Status',
        ];
    }


}
