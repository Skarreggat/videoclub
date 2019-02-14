<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTipusMovieTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipus_movie', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_movies')->unsigned();
            $table->foreign('id_movies')->references('id')->on('movies');
            $table->integer('id_tipus')->unsigned();
            $table->foreign('id_tipus')->references('id')->on('tipus');
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
        Schema::dropIfExists('tipus_movie');
    }
}
