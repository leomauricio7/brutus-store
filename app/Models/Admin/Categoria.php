<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    //colunas opodem ser preenchidas pelo usuário
    protected $fillable = ['nome','slug','icon'];
    //colunas que não podem ser preenchidas pelo usuário
    //protected $guarded = [];
}
