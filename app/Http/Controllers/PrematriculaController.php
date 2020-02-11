<?php

namespace App\Http\Controllers;

use App\Http\Requests\AlumnoRequest;
use App\Prematricula;
use App\Registro_Alumno;
use Illuminate\Http\Request;

class PrematriculaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {            return view('prematriculas.datos_alumno');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AlumnoRequest $request)
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
        return view('prematriculas.datos_Encargado',['RNE_Alumno'=>'1']);



    }
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
        return view('prematriculas.datos_Encargado',['RNE_Alumno'=> $request->RNE_Alumno]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
