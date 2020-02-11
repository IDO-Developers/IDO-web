<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AlumnoRequest extends FormRequest
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
            'RNE_Alumno'=>'required|string|min:13|max:13|unique:Registro__Alumnos',
            'Nombres'=>'required|string',
            'Apellidos'=>'required|string',
            'Sexo'=>'required',
            'Fecha_Nacimiento'=>'required',
            'Edad'=>'required',
            'Discapacidad'=>'required',
            'Direccion'=>'required',
            'Distancia_Vivienda'=>'required',






        ];
    }
}
