<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\PedidoProduto;

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

    public function pedidos()
    {
        return $this->hasMany(PedidoProduto::class,'cliente_id');
    }
}
