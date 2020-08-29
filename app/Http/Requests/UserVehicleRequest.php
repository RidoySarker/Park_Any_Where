<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserVehicleRequest extends FormRequest
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
            'vehicle_image' => 'required',
            'licence_no' => 'required',
            'vehicle_color' => 'required',
            'v_status' => 'required',
        ];
    }

    public function messages(){

        return [
            'vehicle_image.required' => 'Select Vehicle Image',
            'licence_no.required' => 'Enter Vehicle Licence',
            'vehicle_color.required' => 'Enter Vehicle Color',
            'v_status.required' => 'Select Status',
        ];
    }
}
