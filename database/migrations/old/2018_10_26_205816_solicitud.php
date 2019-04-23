<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Solicitud extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitud', function (Blueprint $table){
            $table->increments('id_solicitud');
            $table->string('mensaje');
            $table->enum('estatus',['Rechazada', 'Aceptada', 'En Contacto', 'En Espera', 'Retirada'])->default('En Espera');
            $table->date('limite')->nullable();
            $table->integer('id_proyecto')->unsigned();
            $table->integer('id_user')->unsigned();
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
