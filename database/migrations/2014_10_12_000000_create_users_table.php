<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();

            $table->string('primer_nombre')->nullable();
            $table->string('segundo_nombre')->nullable();
            $table->string('primer_apellido')->nullable();
            $table->string('segundo_apellido')->nullable();
            $table->string('profesion')->nullable();
            $table->enum('sexo',['Masculino','Femenino'])->default('Masculino');
            $table->enum('tipo_identificacion',['Cédula','Ruc persona Natural','Ruc Sociedad Pública','Ruc Sociedad Privada','Pasaporte','Otros'])->default('Cédula');
            $table->string('identificacion')->nullable();
            $table->date('fecha_nacimiento')->nullable();
            $table->enum('estado_civil',['Soltero/a','Casado/a','Divorciado/a','Vuido/a'])->default('Soltero/a');
            $table->enum('etnia',['Mestizos','Blancos','Afroecuatorianos','Indígenas','Montubios','otros'])->default('Mestizos');
            $table->enum('estado',['Activo','Inactivo'])->default('Activo');
            // contactos
            $table->string('telefono')->nullable();
            $table->string('celular')->nullable();
            // domicilio
            $table->string('pais')->nullable();
            $table->unsignedBigInteger('parroquia_id')->nullable();
            $table->foreign('parroquia_id')->references('id')->on('parroquias');
            $table->string('direccion')->nullable();

            

            // discapacidad
            $table->enum('tiene_discapacidad',['SI','NO'])->default('NO');
            $table->decimal('porcentaje_discapacidad',8,2)->default(0);
            $table->enum('tiene_carnet_conadis',['SI','NO'])->default('NO');
            $table->decimal('porcentaje_carnet_conadis',8,2)->default(0);
            $table->string('foto')->nullable();


            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
