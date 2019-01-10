<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('orgnz_id')->unsigned();
            $table->foreign('orgnz_id')->references('id')->on('orgnzs');//clave foranea

            $table->string('title');//titulo
            $table->text('description');//descripcion
            $table->string('site');//sitio
            $table->string('tag');//etiquetas o temas tratados
            //
            $table->string('group')->nullable();//grupo del evento
            $table->boolean('closed')->nullable()->default(0);//evento cerrado
            $table->string('speaker')->nullable();//ponentes del evento
            //
            $table->timestamp('init_date');//fecha de inicio del evento
            $table->timestamp('end_date');//fecha de fin del evento

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
        Schema::dropIfExists('events');
    }
}
