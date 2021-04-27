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

        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion');
            $table->timestamps();
        });



        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('matricula')->unique();
            $table->string('nombre');
            $table->string('apellido_paterno');
            $table->string('apellido_materno');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');

            $table->unsignedBigInteger('role_id'); // Relación con categorias
            $table->foreign('role_id')->references('id')->on('roles'); // clave foranea


            $table->rememberToken();
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
        Schema::dropIfExists('roles');

        Schema::dropIfExists('users');
    }
}
