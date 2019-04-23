<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NuevoRequerimiento extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requerimiento', function (Blueprint $table){
            $table->increments('id_requerimiento');
            $table->string('nombre_requerimiento');
            $table->string('descripcion');
            $table->string('anexo',200)->nullable();
            $table->date('fecha_entrega');
            $table->date('fecha_prorroga')->nullable();
            $table->decimal('costo',8,2)->nullable();
            $table->integer('id_proyecto')->unsigned();
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
