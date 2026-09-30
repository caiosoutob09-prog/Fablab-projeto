<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class itens extends Model
{
     protected $table = 'itens';

    protected $fillable = [
        'nome',
        'quantidade_total',
        'quantidade_disponivel',
        'descricao'
    ];
}
