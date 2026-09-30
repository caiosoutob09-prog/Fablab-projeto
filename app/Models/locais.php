<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class locais extends Model
{
     protected $table = 'locais';

    protected $fillable = [
        'espaco',
        'identifcacao',
        'descricao'
    ];
}
