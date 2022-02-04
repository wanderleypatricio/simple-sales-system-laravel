<?php

namespace App\Http\Controllers\Site;

use App\Cliente;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\ItensPedido;
use App\Pedido;
use App\Produtos;
use Illuminate\Support\Facades\DB;

class PedidoController extends Controller
{
    public function index() {
        $pedidos = Pedido::all();
        return view('layouts._site.pedidos.index', ['pedidos' => $pedidos]);
    }
    
    public function adicionar() {
        $clientes = Cliente::all();
        $produtos = Produtos::all();
        return view('layouts._site.pedidos.adicionar', compact('clientes','produtos'));
    }

    public function salvar(Request $request) {
        $dados = $request->all();
        $pedido = new Pedido();
        $pedido->cliente_id = $dados['cliente_id'];
        $pedido->total = floatval($dados['totalPedido']);
        $pedido->status = $dados['statusPedido'];
        
        
        if($pedido->save()){
            $pedido_id = Pedido::latest('id')->first();
            $itensVendidos = $dados['itensVenda'];
            foreach($itensVendidos as $item){
                $itemPedido = new ItensPedido();
                $itemPedido->pedido_id = $pedido_id["id"];
                $itemPedido->produto_id = $item['produto_id'];
                $itemPedido->preco = $item['preco'];
                $itemPedido->qtde = $item['qtde'];
                $itemPedido->save();
            }

            return response()->json(json_encode("Cadastro realizado com sucesso"));
        }

        
        return response()->json(json_encode("Erro: Não foi possível realizar o cadastro!\n Verifique os dados e tente novamente"));
    }

    public function editar($id) {
        $pedido = Pedido::find($id);
        $itensPedido = json_encode(DB::table('itens_pedidos')->where('pedido_id', $id)->get());
        $clientes = Cliente::all();
        $produtos = Produtos::all();
        return view('layouts._site.pedidos.editar', compact('pedido','itensPedido','clientes','produtos'));
    }

    public function atualizar(Request $request, $id) {
        $pedido = Pedido::find($id);
        $dados = $request->all();

        $pedido->id = $id;
        $pedido->cliente_id = $dados['cliente_id'];
        $pedido->total = $dados['total'];
        $pedido->status = $dados['status'];
        $pedido->save();
        \Session::flash('mensagem', ['msg' => 'Dados alterados com sucesso', 'class' => 'green white-text']);
        return redirect()->route('site.pedidos');
    }

    public function excluir($id) {
        $pedido = Pedido::find($id);
        if($pedido->delete()){
            $itensPedido = DB::table('itens_pedidos')->select('pedido_id', $id)->delete();
            
        }
        \Session::flash('mensagem', ['msg' => 'Dados excluídos com sucesso', 'class' => 'green white-text']);
        return redirect()->route('site.pedidos');
        
    }

}
