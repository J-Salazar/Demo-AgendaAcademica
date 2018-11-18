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
            $table->foreign('orgnz_id')->references('id')->on('orgnzs');

            $table->string('title');
            $table->text('description');
            $table->string('site');
            $table->string('tag');
            $table->timestamp('init_date');
            $table->timestamp('end_date');

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
