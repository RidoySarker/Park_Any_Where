<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddUserRequest extends FormRequest
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
        $user_id = $this->route('adduser');
        return [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$user_id.',id',
            'number' => 'required|unique:users,number,'.$user_id.',id',
            'gender' => 'required',
            'status' => 'required',
        ];
    }
}
