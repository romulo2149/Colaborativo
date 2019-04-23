<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CertificacionFreelancer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('certificacion_freelancer', function (Blueprint $table) {
            
            $table->increments('id_certificacion_freelancer');
            $table->date('expedicion');
            $table->date('vencimiento')->nullable();
            $table->integer('id_cert')->unsigned();
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
