<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformacionLaboralsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('informacion_laborals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->enum('trabaja',['SI','NO'])->default('NO');
            $table->enum('tipo_institucion',['PÚBLICA','PRIVADA','MIXTA'])->nullable();
            $table->string('nombre_empresa')->nullable();
            $table->string('cargo')->nullable();
            $table->unsignedBigInteger('parroquia_id')->nullable();
            $table->foreign('parroquia_id')->references('id')->on('parroquias');
            $table->string('direccion')->nullable();
            $table->string('telefono')->nullable();
            $table->string('extencion')->nullable();
            $table->string('email')->nullable();
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
        Schema::dropIfExists('informacion_laborals');
    }
}
