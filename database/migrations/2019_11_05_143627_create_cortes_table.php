<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCortesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cortes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->integer('numero');
            $table->enum('estado',['Promoción','Registro','Proceso académico','Finalizado'])->default('Promoción');
            $table->decimal('valorRegistro',19,2)->default(0);
            $table->decimal('valorMatricula',19,2)->default(0);
            $table->decimal('valorColegiatura',19,2)->default(0);
            $table->date('fechaInicioDocumentos')->nullable();
            $table->date('fechaFinDocumentos')->nullable();
            $table->date('fechaAdmision')->nullable();
            $table->time('horaAdmision')->nullable();
            $table->date('entrevistaEnsayo')->nullable();
            $table->date('presentacionInformes')->nullable();
            $table->date('resolucionProcesoAdmitidos')->nullable();
            $table->date('publicacionAdmitidos')->nullable();
            $table->date('inicioClases')->nullable();
            $table->date('fechaInicioMatricula')->nullable();
            $table->date('fechaFinMatricula')->nullable();
            
            $table->unsignedBigInteger('maestria_id');
            $table->foreign('maestria_id')->references('id')->on('maestrias');

            $table->bigInteger('usuarioCreado')->nullable();
            $table->bigInteger('usuarioActualizado')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cortes');
    }
}
