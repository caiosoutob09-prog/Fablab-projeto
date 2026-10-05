<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class usuario extends Model
{
   protected $table = 'usuario';

    protected $fillable = [
        'nome',
        'email',
        'senha',
        'turma',
        'nivel'
    ];


}
