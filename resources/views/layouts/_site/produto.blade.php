@extends('layouts.site')

@section('content')
<div class="container">
    <div class="row section">
        <h2 align='center'>{{isset($produto->titulo) ? $produto->titulo : ''}}</h2>
        <div class="divider"></div>
    </div>
    <div class="row section">
        <div class="col s12 m8">
            @if(isset($galeria))
            <div class="row">
                <div class="slider">
                    <ul class="slides">
                        @foreach($galeria as $imagem)

                        <li><img src="{{asset($imagem->imagem)}}">

                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="row" align="center">
                <button class="btn blue" onclick="sliderPrev()">
                    <<</button>
                    <button class="btn blue" onclick="sliderNext()">>></button>
            </div>
            @else
            <img class="responsive-img" src="{{asset($produto->imagem)}}" width="400px">
            @endif
        </div>
        <div class="col s12 m4">
            <p>
            <h4><b>Preço:</b> {{isset($produto->preco) ? number_format($produto->preco,2,',','.') : ''}}</h4>
            </p>
            <p>
            <h4><b>Estoque:</b> {{isset($produto->qtde) ? $produto->qtde : ''}}</h4>
            </p>
            <form action="/carrinho/adicionar/produto" method="post">
                {{csrf_field()}}
                <input type="hidden" name="produto_id" id="id_produto" value="{{isset($produto->id) ? $produto->id : ''}}" />
                <input type="hidden" name="qtde_itens_produto" id="qtde_itens_produto" value="1" />
                <input type="hidden" name="preco_produto" id="preco_produto" value="{{isset($produto->preco) ? $produto->preco : ''}}" />
                
            </form>


        </div>
    </div>

</div>
@endsection