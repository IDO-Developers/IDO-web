<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserCreateRequest extends FormRequest
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
            'RNE_Empleado'=>'required|string|min:13|max:13|unique:users',
            'name'=>'required|string|max:15',
            'Id_Rol'=>'required',
            'password'=>'required|confirmed|string|min:8',
        ];
    }
}
