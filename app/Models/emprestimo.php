<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Emprestimo extends Model
{
     protected $table = 'emprestimos';

    protected $fillable = [
        'item_id',
        'usuario_id',
        'horario_retirada',
        'prazo',
        'horario_devolução',
        'responsavel'
    ];

    public function usuario()
    {
        return $this->belongsTo(usuario::class, 'usuario_id');
    }
}
