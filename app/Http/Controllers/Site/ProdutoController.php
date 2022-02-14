<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Produtos;
use Illuminate\Support\Facades\DB;

class ProdutoController extends Controller
{
    public function index() {
        $produtos  = DB::table('produtos')->join('galerias','produtos.id','=','galerias.produto_id')
        ->where('ordem','=','1')->select('produtos.*', 'galerias.imagem')->get();
        
        return view('layouts._site.produto.index', ['produtos' => $produtos]);
    }

    public function adicionar(){
        return view('layouts._site.produto.adicionar');
    }

    public function salvar(Request $request) {
        $dados = $request->all();
        $produto = new Produtos();
        $produto->id = $dados['id'];
        $produto->titulo = $dados['titulo'];
        $produto->preco = $dados['preco'];
        $produto->qtde = $dados['qtde'];
        $produto->save();

        \Session::flash('mensagem', ['msg' => 'Cadastrado com sucesso', 'class' => 'green white-text']);


        return redirect()->route('site.produtos');
    }
    
    public function editar($id) {
        $produto = Produtos::find($id);
        return view('layouts._site.produto.editar', ['produto' => $produto]);
    }

    public function detalheProduto($id)
    {
        $produto = Produtos::find($id);
        $galeria = DB::table('galerias')->join("produtos","galerias.produto_id", "=", "produtos.id")->select("galerias.*")->where("galerias.produto_id","=",$id)->orderBy('galerias.ordem')->get();
        return view('layouts._site.produto', compact('produto','galeria'));
    
    }

    public function ajaxProduto($id)
    {
        $produto = Produtos::find($id);
        return response()->json(json_encode($produto));
    
    }


    public function atualizar(Request $request, $id) {
        $produto = Produtos::find($id);
        $dados = $request->all();

        $produto->id = $id;
        $produto->titulo = $dados['titulo'];
        $produto->preco = $dados['preco'];
        $produto->qtde = $dados['qtde'];
        $produto->save();
        \Session::flash('mensagem', ['msg' => 'Dados alterados com sucesso', 'class' => 'green white-text']);
        return redirect()->route('site.produtos');
    }

    public function excluir($id) {
        $produto = Produtos::find($id);
        $produto->delete();
        \Session::flash('mensagem', ['msg' => 'Dados excluídos com sucesso', 'class' => 'green white-text']);
        return redirect()->route('site.produtos');
        
    }

}
