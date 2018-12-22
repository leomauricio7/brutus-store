<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
      //colunas que podem ser preenchidas pelo usuário
      protected $fillable = ['image'];

      //colunas que não podem ser preenchidas pelo usuário
      protected $guarded = [];
}
