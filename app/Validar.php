<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Validar extends Model
{
    protected $table = 'validar';

    protected $fillable = [
        'usuario_id','evento_id',
    ];
}
