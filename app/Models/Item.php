<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
     protected $table = 'itens';

    protected $fillable = [
        'categoria_id',
        'local_id',
        'nome',
        'quantidade_total',
        'quantidade_disponivel',
        'descricao'
    ];


    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }

    public function local()
    {
        return $this->belongsTo(Local::class, 'local_id');
    }
}
