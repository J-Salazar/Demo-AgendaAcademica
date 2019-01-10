<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrgnzsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orgnzs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('last_name');
            $table->string('desc')->default('Informacion no disponible');//descripicion del organizador
            $table->string('alias')->unique();//nickname
            $table->string('email')->unique();
            $table->string('dir');//direccion
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
        Schema::drop('orgnzs');
    }
}
