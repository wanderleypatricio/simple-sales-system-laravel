@extends('layouts.site')

@section('content')
<div class="box">
<div class="container">
    <div class="row">
        <nav>
            <div class="nav-wrapper blue" style="margin-top:10px;">
                <div class="col s12">
                    <a href="{{route('site.home')}}" class="breadcrumb">Início</a>
                    <a href="{{route('site.clientes')}}" class="breadcrumb">Lista de Clientes</a>
                    <a href="#" class="breadcrumb">Adiciona Cliente</a>
                </div>
            </div>
        </nav>
    </div>
    <div class="row">
        <form action="/cliente/salvar" method="post">
            {{csrf_field()}}
            @include('layouts._site.clientes._form')
            <button class="btn blue">
                Adicionar
            </button>
        </form>
    </div>
</div>
</div>
@endsection