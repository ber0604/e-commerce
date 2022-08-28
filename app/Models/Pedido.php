<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table = "pedido";

    protected $fillable = ['dt_pedido', 'status' , 'usuario_id',];
}
