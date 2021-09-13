<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUser extends FormRequest
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
            'name' => 'min:8|max:40|required|string',
            'email' => 'required|email|max:50|unique:users',
            'password' => 'required|min:8|max:15',
            'activo' => 'required',
            'rols_id' => 'required'
        ];
    }
}
