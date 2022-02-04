@extends('layouts.site')

@section('content')
<div class="box">
<div class="container">
    <h2 class="center">Alterar Imagem</h2>
    <div class="row">
        <nav>
            <div class="nav-wrapper blue" style="margin-top:10px;">
                <div class="col s12">
                    <a href="{{route('site.home')}}" class="breadcrumb">Início</a>
                    <a href="{{route('site.produtos')}}" class="breadcrumb">Lista de Produtos</a>
                    <a href="{{route('site.galerias',$galeria->id)}}" class="breadcrumb">Imagens</a>
                    <a class="breadcrumb">Alterar imagem do produto</a>
                </div>
            </div>
        </nav>
    </div>
    <div class="row">
        <form action="{{route('site.galerias.atualizar',$galeria->id)}}" 
        method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <input type="hidden" name="_method" value="put">
            @include('layouts._site.galerias._form')
            <button class="btn blue">
                Atualizar
            </button>
        </form>
    </div>
</div>
</div>
@endsection