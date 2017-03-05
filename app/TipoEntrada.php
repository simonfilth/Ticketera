<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoEntrada extends Model
{
    protected $table = 'tipo_entradas';

    protected $fillable = [
        'nombre_entrada',
    ];
}
