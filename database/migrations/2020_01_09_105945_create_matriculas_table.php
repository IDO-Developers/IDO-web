<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatriculasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Matriculas', function (Blueprint $table) {
            $table->bigIncrements('Id_Matricula');
            $table->string('RNE_Alumno',13)->unique() ;
              $table->string('Id_Grupo',2)->nullable();
            $table->string('Semestre',30)->nullable();
             $table->string('Retrasadas')->nullable();
             $table->string('Certificado_Estudio',2)->default("No");
            $table->string('Partd_Nac',2)->default("No");
            $table->string('Foto',2)->default("No");
            $table->string('Copia_Acta',2)->default("No");
            $table->string('Otros',100)->nullable()->default("No");
            $table->string('Estado',25)->nullable()->default("No");;
            $table->string('Numero_Recibo',10)->default("0000");;
            $table->string('Condicion',12)->nullable();
            $table->string('Estado_Pago',15)->default("No Pagado");;

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Matriculas');
    }
}
