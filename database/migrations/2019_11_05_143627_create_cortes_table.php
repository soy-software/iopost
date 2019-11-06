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
            $table->enum('estado',['Promoción','Cancelada','Inscripciones','Proceso','finalizado'])->default('Promoción');
            $table->string('detalle');
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