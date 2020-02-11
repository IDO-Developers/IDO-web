<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RegistroEncargado extends Model
{
    protected $fillable = [
        'RNE_Encargado', 'Nombres', 'Apellidos','Telefono','Sexo','Edad','Ocupacion','Estado_Trabajo','Salario','Nivel_Academico'
    ];
}
