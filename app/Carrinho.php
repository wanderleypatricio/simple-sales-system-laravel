<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Produtos;
class Carrinho extends Model
{
    protected $fillable = [
        'id','produto_id', 'qtde_itens_produto','preco_produto','valor_total','sessao_cliente','status'
    ];

    //um produto pode ter várias imagens
    public function produto(){
        return $this->hasMany('App\Produtos','produto_id');
    }
}
