<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'nome',
        'numero',
        'ativo',
        'descricao',
        'categories_id'
    ];

    public function categories()
    {
        return $this->belongsTo('App\Models\Category');
    }
}
