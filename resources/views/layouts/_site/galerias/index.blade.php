@extends('layouts.site')
@section('content')
<div class="box">
<div class="container">
    <div class="row">
        <nav>
            <div class="nav-wrapper blue" style="margin-top:10px;">
                <div class="col s12">
                    <a href="{{route('site.home')}}" class="breadcrumb">Início</a>
                    <a href="{{route('site.produtos')}}" class="breadcrumb">Lista Produtos</a>
                    <a href="" class="breadcrumb">{{$produto->titulo}}</a>
                    <a href="#!" class="breadcrumb">Lista de Imagens</a>
                </div>
            </div>
        </nav>
    </div>

<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>Imagem</th>
            <th>Ordem</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($galeria as $img)
        <tr>
            <td>{{$img->id}}</td>
            <td>
                <img src="{{ asset($img->imagem)}}" width="100">
            </td>
            <td>{{$img->ordem}}</td>
            <td>
                <a style="width: 130px;padding-bottom: 3px;" 
                class="btn orange" href="{{route('site.galerias.editar',$img->id)}}">Editar</a>
                <a style="width: 130px;float: left;" class="btn red" 
                href="javascript:if(confirm('Deseja excluir este registro?')){window.location.href = '{{route('site.galerias.excluir',$img->id)}}'}">Excluir</a>
                
            </td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <td>
                <a class="btn blue" href="{{route('site.galerias.adicionar',$produto->id)}}">Nova Imagem</a>
            </td>
        </tr>
    </tfoot>
</table>
</div>
</div>
    @endsection