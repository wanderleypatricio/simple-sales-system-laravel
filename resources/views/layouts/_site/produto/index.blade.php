@extends('layouts.site')
@section('content')

<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<!-- Compiled and minified CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
<div class="box">
<div class="container">
    <br>
    <div class="row">
        <nav>
            <div class="nav-wrapper blue">
                <div class="col s12">
                    <a href="{{route('site.home')}}" class="breadcrumb">Início</a>
                    <a href="#!" class="breadcrumb">Lista de Produtos</a>
                </div>
            </div>
        </nav>
    </div>

<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>Título</th>
            <th>imagem</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($produtos as $produto)
        <tr>
            <td>{{$produto->id}}</td>
            <td>{{$produto->titulo}}</td>
            <td>
                <a class="material-icons" href="{{route('site.produto.editar',$produto->id)}}" title="Editar">edit</a>
                <a class="material-icons" href="javascript:if(confirm('Deseja excluir este registro?')){window.location.href = '{{route('site.produto.excluir',$produto->id)}}'}" title="Excluir">delete</a>
                <a style="width: 130px;float: left;" class="material-icons" href="{{route('site.galerias',$produto->id)}}" title="Add imagem">image</a>
            </td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <td>
                <a class="btn blue" href="{{route('site.produto.adicionar')}}">Novo produto</a>
            </td>
        </tr>
    </tfoot>
</table>
</div>
</div>
    @endsection

    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    
<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        