<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class emprestimo extends Model
{
     protected $table = 'emprestimo';

    protected $fillable = [
        'horario_retirada',
        'prazo',
        'horario_devolução',
        'responsavel'
    ];
}
