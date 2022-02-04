<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Galeria;
Use App\Produtos;

class GaleriaController extends Controller {

    public function index($id) {
        $produto = Produtos::find($id);
        $galeria = $produto->galeria()->orderBy('ordem')->get();
        return view('layouts._site.galerias.index', compact('galeria', 'produto'));
    }

    public function adicionar($id) {
        $produto = Produtos::find($id);
        return view('layouts._site.galerias.adicionar', compact('produto'));
    }

    public function salvar(Request $request, $id) {
        $dados = $request->all();
        $produto = Produtos::find($id);
        $galeria = new Galeria();
        $galeria->produto_id = $produto->id;

        if ($produto->galeria()->count()) {
            $galeria = $produto->galeria()->orderBy('ordem', 'desc')->first();
            $ordemAtual = $galeria->ordem;
        } else {
            $ordemAtual = 0;
        }

        if (isset($dados['imagens'])) {

            $arquivo = $request->file('imagens');
            foreach ($arquivo as $imagem) {
                $galeria = new Galeria();
                $rand = rand(11111, 99999);
                $diretorio = "img/produto/" . $produto->id . "/";
                $ext = $imagem->guessClientExtension();
                $nomeArquivo = "img_" . $rand . "." . $ext;
                $imagem->move($diretorio, $nomeArquivo);
                $galeria->produto_id = $produto->id;
                $galeria->ordem = $ordemAtual + 1;
                $ordemAtual++;
                $galeria->imagem = $diretorio . "" . $nomeArquivo;

                $galeria->save();
            }
        }



        \Session::flash('mensagem', ['msg' => 'Cadastrado com sucesso', 'class' => 'green white-text']);


        return redirect()->route('site.galerias', $produto->id);
    }

    public function editar($id) {
        $galeria = Galeria::find($id);
        $produto = $galeria->produto;
        return view('layouts._site.galerias.editar', compact('galeria', 'produto'));
    }

    public function atualizar(Request $request, $id) {
        $galeria = Galeria::find($id);
        $dados = $request->all();

        $galeria->ordem = $dados['ordem'];

        $produto = $galeria->produto;

        $galeria->produto_id = $produto->id;
        
        if (isset($dados['imagem'])) {
            
            $file = $request->file('imagem');
            if ($file) {
                $rand = rand(11111, 99999);
                $diretorio = "img/produtos/" . $produto->id. "/";
                $ext = $file->guessClientExtension();
                $nomeArquivo = "img_" . $rand . "." . $ext;
                $file->move($diretorio, $nomeArquivo);
            }
            $galeria->imagem = $diretorio."".$nomeArquivo;
        }

        $galeria->update();
        \Session::flash('mensagem', ['msg' => 'Dados alterados com sucesso', 'class' => 'green white-text']);
        return redirect()->route('site.galerias', $produto->id);
    }

    public function excluir($id) {
        $galeria = Galeria::find($id);
        $produto = $galeria->produto;
        $galeria->delete();

        \Session::flash('mensagem', ['msg' => 'Dados excluídos com sucesso', 'class' => 'green white-text']);
        return redirect()->route('site.galerias', $produto->id);
    }

}
