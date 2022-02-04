@extends('layouts.site')
@section('content')
<div class="box">
    <div class="container">
    <div class="row">
        <nav>
            <div class="nav-wrapper blue" style="margin-top:10px;">
                <div class="col s12">
                    <a href="{{route('site.home')}}" class="breadcrumb">Início</a>
                    <a href="#!" class="breadcrumb">Lista de Clientes</a>
                </div>
            </div>
        </nav>
    </div>

<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>Cpf</th>
            <th>E-mail</th>
            <th>Rua</th>
            <th>Número</th>
            <th>Bairro</th>
            <th>Cidade</th>
            <th>Estado</th>
            <th>Cep</th>
            <th>Complemento</th>
            <th>Data Nascimento</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($clientes as $cliente)
        <tr>
            <td>{{$cliente->id}}</td>
            <td>{{$cliente->nome}}</td>
            <td>{{$cliente->cpf}}</td>
            <td>{{$cliente->email}}</td>
            <td>{{$cliente->rua}}</td>
            <td>{{$cliente->numero}}</td>
            <td>{{$cliente->bairro}}</td>
            <td>{{$cliente->cidade}}</td>
            <td>{{$cliente->uf}}</td>
            <td>{{$cliente->cep}}</td>
            <td>{{$cliente->complemento}}</td>
            <td>{{$cliente->data_nasc}}</td>
            <td>
                <a class="material-icons" href="{{route('site.cliente.editar',$cliente->id)}}" title="Editar">edit</a>
                <a class="material-icons" href="javascript:if(confirm('Deseja excluir este registro?')){window.location.href = '{{route('site.cliente.excluir',$cliente->id)}}'}" title="Excluir">delete</a>
            </td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <td>
                <a class="btn blue" href="{{route('site.cliente.adicionar')}}">Novo cliente</a>
            </td>
        </tr>
    </tfoot>
</table>
</div>
</div>
@endsection