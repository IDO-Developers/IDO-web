<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registro_Alumno extends Model
{
    protected $fillable = [
        'RNE_Alumno','RNE_Encargado', 'Nombres', 'Apellidos','Sexo','Edad','Direccion','Distancia_Vivienda','Discapacidad','Fecha_Nacimiento',
    ];
}
