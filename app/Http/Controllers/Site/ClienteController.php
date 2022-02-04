<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Cliente;
use Illuminate\Support\Facades\DB;

class ClienteController extends Controller
{

    public function index()
    {
        $clientes = Cliente::all();
        return view('layouts._site.clientes.index', ['clientes' => $clientes]);
    }

    
    public function adicionar()
    {
        return view('layouts._site.clientes.adicionar');
    }

    public function salvar(Request $request)
    {
        $dados = $request->all();
        $cliente = DB::table('clientes')->where('email', '=', $dados['email'])->get();
        if ($cliente) {
            \Session::flash('mensagem', [
                'msg' => 'Já existe um cliente com esse e-mail cadastrado!',
                'class' => 'red white-text'
            ]);

            //enviar email de confirmação
            return $this->index();
        } else {
            $cliente = new Cliente();
            $cliente->nome = $dados['nome'];
            $cliente->cpf = $dados['cpf'];
            $cliente->email = $dados['email'];
            $cliente->rua = $dados['rua'];
            $cliente->numero = $dados['numero'];
            $cliente->bairro = $dados['bairro'];
            $cliente->cidade = $dados['cidade'];
            $cliente->uf = $dados['uf'];
            $cliente->cep = $dados['cep'];
            $cliente->complemento = $dados['complemento'];
            $cliente->data_nasc = $dados['data_nasc'];
            $cliente->save();

            \Session::flash('mensagem', [
                'msg' => 'Cadastrado com sucesso! Verifique seu e-mail para ativar seu cadastro.',
                'class' => 'green white-text'
            ]);


            return $this->index();
        }
    }


    public function editar($id)
    {

        $cliente = Cliente::find($id);
        return view('layouts._site..clientes.editar', ['cliente' => $cliente]);
    }

    public function atualizar(Request $request, $id)
    {
        $cliente = Cliente::find($id);
        $dados = $request->all();

        $cliente->id = $id;
        $cliente->nome = $dados['nome'];
        $cliente->cpf = $dados['cpf'];
        $cliente->email = $dados['email'];
        $cliente->rua = $dados['rua'];
        $cliente->numero = $dados['numero'];
        $cliente->bairro = $dados['bairro'];
        $cliente->cidade = $dados['cidade'];
        $cliente->uf = $dados['uf'];
        $cliente->cep = $dados['cep'];
        $cliente->complemento = $dados['complemento'];
        $cliente->data_nasc = $dados['data_nasc'];
        $cliente->save();

        \Session::flash('mensagem', [
            'msg' => 'Dados alterados com sucesso',
            'class' => 'green white-text'
        ]);
        return redirect()->route('site.clientes');
    }

    public function excluir($id)
    {
        $cliente = Cliente::find($id);
        $cliente->delete();
        \Session::flash('mensagem', ['msg' => 'Dados excluídos com sucesso', 'class' => 'green white-text']);
        return redirect()->route('site.clientes');
    }

    public function compras()
    {
        return $this->retornaParametrosView('PainelCliente.admin.compras');
    }

}
