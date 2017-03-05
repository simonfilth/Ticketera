<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventoTipoEntrada extends Model
{
	protected $table = 'evento_tipo_entradas';

    protected $fillable = [
        'evento_id', 'tipo_entradas_id','descripcion_entrada','precio_entrada',
    ];
}
