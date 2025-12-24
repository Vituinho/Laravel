<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = [
        'nome',
        'descricao',
        'preco',
        'id_usuario',
    ];

    public function usuario() {
        return $this->belongsTo(Usuarios::class, 'id_usuario');
    }
}
