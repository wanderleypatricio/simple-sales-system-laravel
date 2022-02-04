<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Produtos;
use App\Galeria;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller {

    public function index() {
        $produtos = DB::table('produtos')->join('galerias','produtos.id','=','galerias.produto_id')
        ->where('ordem','=','1')->select('produtos.*', 'galerias.imagem')->paginate(20);
        return view('site.home', compact('produtos'));
    }

    public function detalhesProduto($id)
    {
        $produto = Produtos::find($id);
        if($produto->galeria()){
            $galeria = $produto->galeria()->orderBy('ordem')->get();
            return view('layouts._site.produto', compact('produto','galeria'));
        }
    }

}
