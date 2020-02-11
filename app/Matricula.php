<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{
    protected $fillable = [
        'RNE_Alumno','Id_Grupo','Semestre','Retrasadas', 'Certificado_Est','Partd_Nac','Foto','Copia_Acta','Otros','Estado','Estado_Pago'
    ];
}
