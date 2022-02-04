<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItensPedido extends Model
{
    
    public function pedido(){
        return $this->belongsTo('App\Pedido', 'pedido_id');
    }

    public function produtos(){
        return $this->hasMany('App\Produtos', 'produto_id');
    }
}
