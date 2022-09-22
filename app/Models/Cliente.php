<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = [
        'nome',
        'logradouro',
        'bairro',
        'numero',
        'complemento',
        'cpf',
        'telefone'
    ];
}
