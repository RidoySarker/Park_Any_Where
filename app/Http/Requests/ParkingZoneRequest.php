<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ParkingZoneRequest extends FormRequest
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
            'parking_name' => 'required',
            'location_zone_name' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'parking_limit' => 'required',
            'parking_address' => 'required',
            // 'parking_status' => 'required',
        ];
    }
}
