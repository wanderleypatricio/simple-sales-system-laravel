<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produtos extends Model
{
    //um produto pode ter várias imagens
    public function galeria(){
        return $this->hasMany('App\Galeria','produto_id');
    }

    //um produto pode estar contido em vaários pedidos
    public function itenspedido(){
        return $this->belongsToMany('App\ItensPedido','produto_id');
    }
}
