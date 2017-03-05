<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cupo extends Model
{
	protected $table = 'cupos';

    protected $fillable = [
        'nombre_cupo',
    ];
}
