<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $table = 'eventos';

    protected $fillable = [
        'nombre_evento','usuario_id','fecha','hora','cupo_id',
    ];
}
