<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
     protected $table = 'admin';

    protected $fillable = [
        'usuario_id',
        'nome',
        'email',
        'senha'
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }
}

