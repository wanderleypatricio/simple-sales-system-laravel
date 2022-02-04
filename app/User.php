<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Papel;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /*public function papeis()
    {
        return $this->belongsToMany('App\Papel');
    }
    
    public function adicionaPapel($papel)
    {
        if(is_string($papel)){
            return $this->papeis()->save(
                    
                    );
        }
        return $this->papeis()->save(
                
                );
    }
    public function removePapel($papel)
    {
        if(is_string($papel)){
            return $this->papeis()->detach(
                        //Papel::where('nome','=',$papel)->FirstorFail();
                    );
        }
        return $this->papeis()->detach(
                    //Papel::where('nome','=',$papel->nome)->FirstorFail();
                );
    }*/

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function papeis(){
        return $this->belongsToMany(Papel::class);
    }

    public function adicionaPapel($papel){
        if(is_string($papel)){
            return $this->papeis()->save(
                Papel::where('nome', '=', $papel)->firstOrFail()
            );
        }
        return $this->papeis()->save(
            Papel::where('nome', '=', $papel->nome)->firstOrFail()
        );
    }

    public function removePapel($papel){
        if(is_string($papel)){
            return $this->papeis()->detach(
                Papel::where('nome', '=', $papel)->firstOrFail()
            );
        }
        return $this->papeis()->detach(
            Papel::where('nome', '=', $papel->nome)->firstOrFail()
        );
    }
}
