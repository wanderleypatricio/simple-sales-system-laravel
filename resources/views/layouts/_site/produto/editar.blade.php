@extends('layouts.site')

@section('content')
<div class="box">
<div class="container">
<br>
    <div class="row">
        <nav>
            <div class="nav-wrapper blue" style="margin-top:10px">
                <div class="col s12">
                    <a href="{{route('site.home')}}" class="breadcrumb">Início</a>
                    <a href="{{route('site.produtos')}}" class="breadcrumb">listar Produtos</a>
                    <a class="breadcrumb">Alterar Produto</a>
                </div>
            </div>
        </nav>
    </div>
    <div class="row">
        <form action="{{route('site.produto.atualizar', $produto->id)}}" method="post">
            {{csrf_field()}}
            <input type="hidden" name="_method" value="put">
            @include('layouts._site.produto._form')
            <button class="btn blue">
                Atualizar
            </button>
        </form>
    </div>
</div>
</div>
@endsection