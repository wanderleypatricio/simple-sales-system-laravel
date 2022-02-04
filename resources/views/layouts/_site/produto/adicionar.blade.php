@extends('layouts.site')

@section('content')

<div class="box">
<div class="container">
    <br>
    <div class="row">
        <nav>
            <div class="nav-wrapper blue" style="margin-top:10px;">
                <div class="col s12">
                    <a href="{{route('site.home')}}" class="breadcrumb">Início</a>
                    <a href="{{route('site.produtos')}}" class="breadcrumb">Lista de Produtos</a>
                    <a href="#" class="breadcrumb">Adiciona Produto</a>
                </div>
            </div>
        </nav>
    </div>
    <div class="row">
        <form action="{{route('site.produto.salvar')}}" method="post">
            {{csrf_field()}}
            @include('layouts._site.produto._form')
            <button class="btn blue">
                Adicionar
            </button>
        </form>
    </div>
</div>
</div>
@endsection