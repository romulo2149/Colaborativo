<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contactos extends Model
{
    protected $table='contactos';
    public $primaryKey = 'id_contacto';
    public $incrementing = true;
    public $fillable = ['usuario', 'contacto'];
    public $timestamps = false;
}
