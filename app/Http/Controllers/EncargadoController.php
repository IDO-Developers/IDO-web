<?php

namespace App\Http\Controllers;

use App\Http\Requests\AlumnoRequest;
use App\Registro_Alumno;
use Illuminate\Http\Request;

class EncargadoController extends Controller
{
    public function encargado(AlumnoRequest $request)
    {


        $prematricula = new Registro_Alumno();

        $prematricula->RNE_Alumno = $request->RNE_Alumno;
        $prematricula->Nombres = $request->Nombres;
        $prematricula->Apellidos = $request->Apellidos;
        $prematricula->Sexo = $request->Sexo;
        $prematricula->Fecha_Nacimiento = $request->Fecha_Nacimiento;
        $prematricula->Edad = $request->Edad;
        $prematricula->Discapacidad = $request->Discapacidad;
        $prematricula->Direccion = $request->Direccion;
        $prematricula->Distancia_Vivienda = $request->Distancia_Vivienda;





        $prematricula->save();
        return view('prematriculas.edit',['RNE_Alumno'=> $request->RNE_Alumno]);

    }
}
