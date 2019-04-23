<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class IdiomaFreelancer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('idioma_freelancer', function (Blueprint $table) {
            
            $table->increments('id_idioma_freelancer');
            $table->decimal('porcentaje', 2);
            $table->integer('id_user')->unsigned();
            $table->integer('id_idioma')->unsigned();
        
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
