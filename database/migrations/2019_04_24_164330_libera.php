<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Libera extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('liberar', function (Blueprint $table){
            $table->increments('id_liberar');
            $table->integer('id_user_liberado')->unsigned();
            $table->integer('id_user_libera')->unsigned();
            $table->integer('valoracion')->unsigned();
            $table->integer('id_proyecto')->unsigned();
            $table->string('comentario');
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
        //
    }
}
