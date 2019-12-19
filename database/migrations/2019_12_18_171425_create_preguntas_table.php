<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreguntasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preguntas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->enum('opcion',['Excelente','Muy bueno','Bueno','Regular','Pobre'])->nullable();
            $table->decimal('nota',9,2)->default(0);
            $table->unsignedBigInteger('admision_id');
            $table->foreign('admision_id')->references('id')->on('admisions');
            $table->unsignedBigInteger('cuestionario_id');
            $table->foreign('cuestionario_id')->references('id')->on('cuestionarios');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('preguntas');
    }
}
