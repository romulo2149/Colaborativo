<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DetalleTrabajo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_trabajo', function (Blueprint $table){
            $table->increments('id_detalle_trabajo');
            $table->integer('id_progreso')->unsigned();
            $table->integer('id_req')->unsigned()->nullable();
            $table->decimal('monto', 10,2);
            $table->integer('id_trabajo')->unsigned();
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
