<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateGrupoRequest extends FormRequest
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
            'Modalidad'=>'required|string',
            'Jornada'=>'required|string',
            'Grado'=>'required|string',
            'Grupo'=>'required|string|max:2',
            'Modulo'=>'required|string',
            'Estado_Grupo'=>'required|string',
            'Num_Mujeres'=>'required|integer',
            'Num_Hombres'=>'required|integer',



        ];
    }
}
