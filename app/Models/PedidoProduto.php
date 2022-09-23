<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Produto;
use App\Models\Cliente;

class PedidoProduto extends Model
{
    protected $fillable = ['status', 'valor', 'desconto', 'produto_id', 'pedido_id', 'cupom_desconto_id'];

    public function produtos()
    {
        return $this->belongsTo(Produto::class, 'produto_id', 'id');
    }
    public function clientes()
    {
        return $this->belongsTo(Cliente::class);
    }
}
