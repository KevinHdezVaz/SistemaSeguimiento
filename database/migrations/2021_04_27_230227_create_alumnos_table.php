<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlumnosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('programa_educativo', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion');
            $table->timestamps();
        });


        Schema::create('tipo_titulacion', function (Blueprint $table) {
            $table->id();
            $table->string('tipo');
            $table->timestamps();
        });


        Schema::create('alumnos', function (Blueprint $table) {
            $table->id();


            $table->string('matricula')->unique();
            $table->string('nombre');
            $table->string('apellido_paterno');
            $table->string('apellido_materno');
            $table->unsignedBigInteger('tipo_titulacion_id'); // Relación con categorias
            $table->foreign('tipo_titulacion_id')->references('id')->on('tipo_titulacion'); // clave foranea


            $table->unsignedBigInteger('programa_educativo_id'); // Relación con categorias
            $table->foreign('programa_educativo_id')->references('id')->on('programa_educativo'); // clave foranea


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
        Schema::dropIfExists('alumnos');
    }
}
