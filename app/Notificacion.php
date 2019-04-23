<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notificacion extends Model
{
    protected $table='notificaciones';
    public $primaryKey = 'id_notificacion';
    public $incrementing = true;
    protected $fillable = ['usuario', 'leido', 'tipo'];
    public $timestamps = false;
}
