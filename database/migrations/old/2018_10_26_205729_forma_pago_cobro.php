<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FormaPagoCobro extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forma_pago_cobro', function (Blueprint $table){
            $table->increments('id_forma');
            $table->enum('tipo', ['Pago', 'Cobro']);
            $table->integer('id_tarjeta')->unsigned()->nullable();
            $table->integer('id_wallet')->unsigned()->nullable();
            $table->integer('id_transferencia')->unsigned()->nullable();
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
