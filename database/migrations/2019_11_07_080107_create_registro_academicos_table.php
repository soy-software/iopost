<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistroAcademicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registro_academicos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            // datos pregrado
            $table->string('institucion_pregrado');
            $table->enum('nivel',['TÉCNOLOGICO SUPERIOR','LICENCIATURA','TERCER NIVEL','CUARTO NIVEL','DOCTORADO'])->default('TERCER NIVEL');
            $table->enum('tipo_pregrado',['PÚBLICA','PRIVADA','MIXTA'])->default('PÚBLICA');
            $table->string('titulo_pregrado');
            $table->string('especialidad_pregrado')->nullable();
            $table->integer('duracion_pregrado')->nullable();
            $table->date('fecha_graduacion_pregrado')->nullable();
            $table->decimal('calificacion_grado_pregrado',8,2)->nullable();
            $table->string('pais_pregrado')->nullable();
            $table->string('provincia_pregrado')->nullable();
            $table->string('canton_pregrado')->nullable();

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('registro_academicos');
    }
}
