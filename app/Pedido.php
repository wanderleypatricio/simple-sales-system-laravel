<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    public function cliente()
    {
        return $this->belongsTo('App\Cliente','id');
    }

    public function itenspedido(){
        return $this->hasMany('App\ItensPedido','pedido_id')
        ->join('produtos','produtos.id','=','itens_pedidos.produto_id')
        ->join('galerias', 'galerias.produto_id','=','produtos.id')
        ->where('galerias.ordem','=',1);
    }
}
