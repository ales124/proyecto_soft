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
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('rut')->unique();
            $table->tinyInteger('status');//0 desabil, 1 habili
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->enum('rol',['Administrador','Jefe Carrera', 'Alumno']);

            $table->unsignedBigInteger('carrera_id')->nullable(); //nullable pq hay usuarios que no tienen carrera (admin y jefe)
            $table->foreign('carrera_id')->references('id')->on('carreras');

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
