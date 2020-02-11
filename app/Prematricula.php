<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prematricula extends Model
{
    protected $fillable = [
        'Id_Prematricula','RNE_Alumno', 'Centro_Procedencia', 'Id_Grupo','Condicion','Modalidad'
    ];
}
