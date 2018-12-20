<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Categoria;

class Produto extends Model
{
    protected $fillable = [
        'nome',
        'slug',
        'descricao',
        'valor',
        'quantidade',
        'ativo',
        'image',
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
