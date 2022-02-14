
@extends('layouts.site')
@section('content')
<div class="box">
    <div class="container">
    <div class="row">
        <nav>
            <div class="nav-wrapper blue" style="margin-top:10px;">
                <div class="col s12">
                    <a href="{{route('site.home')}}" class="breadcrumb">Início</a>
                    <a href="#!" class="breadcrumb">Lista de pedidos</a>
                </div>
            </div>
        </nav>
    </div>

<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>Cliente</th>
            <th>Data/Hora</th>
            <th>Total Vendido</th>
            <th>Status</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($pedidos as $pedido)
        <tr>
            <td>{{$pedido->id}}</td>
            <td>{{$pedido->nome}}</td>
            <td>{{$pedido->created_at}}</td>
            <td>{{$pedido->total}}</td>
            <td>{{$pedido->status}}</td>
            <td>
                <a class="material-icons" href="{{route('site.pedido.editar',$pedido->id)}}" title="Editar">edit</a>
                <a class="material-icons" href="javascript:if(confirm('Deseja excluir este registro?')){window.location.href = '{{route('site.pedido.excluir',$pedido->id)}}'}" title="Excluir">delete</a>
            </td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <td>
                <a class="btn blue" href="{{route('site.pedido.adicionar')}}">Novo pedido</a>
            </td>
        </tr>
    </tfoot>
</table>
</div>
</div>
@endsection