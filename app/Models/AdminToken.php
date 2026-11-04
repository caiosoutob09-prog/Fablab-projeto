<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminToken extends Model
{
    protected $table = 'admin_token';

    protected $fillable = [
        'usuario_id',
        'token',
        'valido_ate',
    ]; 

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }

}
