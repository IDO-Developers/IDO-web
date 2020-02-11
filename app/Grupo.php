<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    protected $fillable = [
        'Id_Grupo','Modalidad', 'Grado', 'Jornada','Grupo','Modulo','Estado_Grupo','Num_Hombres','Num_Mujeres'
    ];
}
