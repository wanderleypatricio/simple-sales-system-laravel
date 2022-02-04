<?php

namespace App;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Cliente extends Authenticatable
{
    
    protected $guard = 'cliente';
    protected $fillable = [
        'nome','whatsapp', 'email','password','rua','bairro','referencias'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];


    public function pedido(){
        return $this->hasMany('App\Pedido','cliente_id');
    }
}
