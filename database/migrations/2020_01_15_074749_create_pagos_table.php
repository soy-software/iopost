<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('factura')->nullable();
            $table->enum('estado',['Ingresado','Cancelado'])->default('Ingresado');
            $table->enum('opcion',['Registro','Matricula','Colegiatura'])->nullable();
            $table->string('detalle')->nullable();
            $table->decimal('valor',19,2)->default(0)->nullable();

            $table->bigInteger('responsable')->nullable();


            $table->unsignedBigInteger('inscripcion_id');
            $table->foreign('inscripcion_id')->references('id')->on('inscripcions');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pagos');
    }
}
