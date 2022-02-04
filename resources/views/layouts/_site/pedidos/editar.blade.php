@extends('layouts.site')

@section('content')
<div class="box">
    <div class="container">
        <div class="row">
            <nav>
                <div class="nav-wrapper blue" style="margin-top:10px;">
                    <div class="col s12">
                        <a href="{{route('site.home')}}" class="breadcrumb">Início</a>
                        <a href="{{route('site.pedidos')}}" class="breadcrumb">Listar pedidos</a>
                        <a class="breadcrumb">Alterar pedido</a>
                    </div>
                </div>
            </nav>
        </div>
        <div class="row">
            <form action="{{route('site.pedido.atualizar',$pedido->id)}}" method="post">
                {{csrf_field()}}
                <input type="hidden" name="_method" value="put">

                <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

                Id:
                <div class="input-field">

                    <input type="text" name="id" class="validate" value="{{isset($pedido['id']) ? $pedido['id'] : ''}}">
                </div>
                Cliente:
                <div class="input-field">

                    <select id="cliente" name="cliente" class="">
                        <option value="null">Selecione o cliente</option>
                        @if(isset($clientes)){
                        @foreach($clientes as $cliente){
                            @if($pedido['cliente_id'] == $cliente['id'])
                            <option value="{{$cliente->id}}" selected>{{$cliente->nome}}</option>
                            @else
                            <option value="{{$cliente->id}}" selected>{{$cliente->nome}}</option>
                            @endif
                        }
                        @endforeach
                        }
                        @endif
                    </select>
                </div>
                Produto:
                <div class="input-field">
                    <select id="produtos" name="produtos">
                        <option value="null">Selecione o produto</option>
                        @if(isset($produtos)){
                        @foreach($produtos as $produto){
                        <option value="{{$produto->id}}">{{$produto->titulo}}</option>
                        }
                        @endforeach
                        }
                        @endif
                    </select>

                    <button type="button" id="add-campo">Adicionar novo item</button>
                </div>
                Itens da Venda:
                <div class="itens-venda input-field">
                    <div id="lista-itens">
                        <table id="tableitem" class="centered responsive-table highlight striped">
                            <thead>
                                <tr>
                                    <th>Código</th>
                                    <th>Produto</th>
                                    <th>preço</th>
                                    <th>Quantidade</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                                              
                            </tbody>
                        </table>
                        
                    </div>
                </div>

                Total do pedido:
                <div class="input-field">
                    <input type="text" id="total" name="total" value="{{isset($pedido['total']) ? $pedido['total'] : ''}}">
                </div>
                Status da Venda:
                <div class="input-field">
                    <select id="status" name="status">
                        <option value="aberto">Selecione o status da venda</option>
                        @if($pedido['status'] == "aberto"){
                        <option value="aberto" selected>Aberto</option>
                        <option value="finalizado">Finalizado</option>
                        <option value="cancelado">Cancelado</option>
                        }
                        @elseif ($pedido['status'] == "finalizado"){
                        <option value="aberto">Aberto</option>
                        <option value="finalizado" selected>Finalizado</option>
                        <option value="cancelado">Cancelado</option>
                        }
                        @else{
                        <option value="aberto">Aberto</option>
                        <option value="finalizado">Finalizado</option>
                        <option value="cancelado" selected>Cancelado</option>
                        }
                        @endif
                    </select>

                </div>

                <button class="btn blue">
                    Atualizar
                </button>
            </form>
        </div>
    </div>
</div>
@endsection