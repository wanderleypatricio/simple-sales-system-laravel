@extends('layouts.site')

@section('content')
<div class="box">
<div class="container">
    <div class="row">
        <nav>
            <div class="nav-wrapper blue" style="margin-top:10px;">
                <div class="col s12">
                    <a href="{{route('site.home')}}" class="breadcrumb">Início</a>
                    <a href="{{route('site.pedidos')}}" class="breadcrumb">Lista de Pedidos</a>
                    <a href="#" class="breadcrumb">Adiciona Pedidos</a>
                </div>
            </div>
        </nav>
    </div>
    <div class="row">
        <input type="hidden" name="token" value="{{csrf_field()}}"/>
            @include('layouts._site.pedidos._form')
            <button class="btn blue" onclick="finalizarPedido()">
                Adicionar
            </button>
        
    </div>
</div>
</div>
@endsection