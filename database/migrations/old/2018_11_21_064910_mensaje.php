<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Mensaje extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mensaje', function (Blueprint $table){
            $table->increments('id_mensaje');
            $table->integer('id_user')->unsigned();
            $table->integer('chat')->unsigned();
            $table->text('mensaje');
            $table->timestamps();
            $table->boolean('leido');
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
