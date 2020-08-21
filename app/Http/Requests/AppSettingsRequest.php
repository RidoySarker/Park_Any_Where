<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AppSettingsRequest extends FormRequest
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

            'application_name' => 'required',
            'application_email' => 'required|email',
            'application_phone' => 'required|min:11',
            'application_address' => 'required',
            'about' => 'required',
            'vat' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'application_name.required' => 'Application Name Required',
            'application_email.required' => 'Application Email Required',
            'application_phone.required' => 'Application Phone Required',
            'application_address.required' => 'Application Address Required',
            'about.required' => 'Application About Required',
            'vat.required' => 'Application Vat Required',
        ];
    }
}
