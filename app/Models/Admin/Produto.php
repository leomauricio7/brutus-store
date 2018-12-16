<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = [
        'nome',
        'descricao',
        'valor',
        'quantidade',
        'ativo',
        'categoria_id',
        'tamanho',
        'largura',
        'comprimento',
        'peso',
    ];
    public function categoria()
    {
        return $this->belongsTo('App\Models\Admin\Categoria', 'categoria_id', 'id');
    }
}
