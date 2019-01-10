<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('name');
            $table->string('last_name');
            $table->string('eap');//escuela academico profesional
            $table->string('my_tag')->nullable();//tema de preferencia
            $table->string('sys_tag')->nullable();//temas de preferencia asignados por actividad(por implementar)
            $table->string('alias')->unique();//nickname
            $table->integer('code')->unique();//codigo de alumno
            $table->string('email')->unique();
            $table->integer('phone');
            $table->string('password');
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
        Schema::drop('users');
    }
}
