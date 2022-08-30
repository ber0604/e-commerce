<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemPedido extends Model
{
    protected $table = "itens_pedidos";

    protected $fillable = ['quantidade', 'valor' , 'pedido_id', 'produto_id' ,'dt_item'];
}
