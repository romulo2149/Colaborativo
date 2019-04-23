<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $dateFormat = 'Y-m-d h:i:s';
    protected $fillable = [
        'email', 'password', 'name', 'apellido_paterno', 'apellido_materno', 'fecha_nacimiento',
        'rol', 'ciudad_residencia', 'celular', 'telefono', 'suscripcion', 'token_verificacion',
        'rating', 'identidad_verificada', 'autorenovacion', 'firma_electronica', 'empresa', 'sitio_web',
        'correo_verificado', 'suscripcion_valida_hasta', 'email_verified_at', 'profile_image',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
