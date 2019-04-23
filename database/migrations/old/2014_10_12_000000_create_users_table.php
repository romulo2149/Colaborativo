<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email', 100)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('apellido_paterno')->nullable();
            $table->string('apellido_materno')->nullable();
            $table->enum('rol', ['Freelancer', 'Cliente'])->nullable();
            $table->date('fecha_nacimiento')->nullable();
            $table->string('sitio_web')->nullable();
            $table->string('empresa')->nullable();
            $table->boolean('correo_verificado')->nullable();
            $table->boolean('identidad_verificada')->nullable();
            $table->string('ciudad_residencia')->nullable();
            $table->string('celular')->nullable();
            $table->string('telefono')->nullable();
            $table->decimal('rating', 4, 2)->nullable();
            $table->integer('suscripcion')->unsigned();
            $table->date('suscripcion_valida_hasta')->nullable();
            $table->boolean('autorenovacion')->default(true)->nullable();
            $table->string('token_verificacion', 15)->nullable();
            $table->string('firma_electronica', 25)->nullable();
            $table->string('profile_image')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
        DB::statement('ALTER TABLE users ADD id_frente MEDIUMBLOB null');
        DB::statement('ALTER TABLE users ADD id_atras MEDIUMBLOB null');
        DB::statement('ALTER TABLE users ADD comprobante_domicilio MEDIUMBLOB null');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
