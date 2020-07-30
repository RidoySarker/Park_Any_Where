<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class locationZoneRequest extends FormRequest
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
            'location_zone_name' => 'required',
            'location_zone_description' => 'required',
            'location_zone_status' => 'required',
        ];
    }
    public function message()
    {
        return [
            'location_zone_name.required' => 'Name Required',
            'location_zone_description.required' => 'Description Required',
            'location_zone_status.required' => 'Status Required',
        ];
    }
}
