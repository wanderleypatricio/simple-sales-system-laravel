<div class="row section">
    <h3 align='center'>Produtos</h3>
    <div class="divider"></div>
    <br>

</div>


<div class="row section">

    <div id="content">
        @foreach($produtos as $produto)

        <div class="col s12 m4">
            <div class="card">
                <div>
                    <a href="{{route('site.produto.detalhe',[$produto->id, str_slug($produto->titulo,'_')])}}">
                        <img src="{{asset($produto->imagem)}}" alt="{{$produto->titulo}}" width="200px">
                    </a>
                </div>
                <div class="card-content">
                    <p><b>{{$produto->titulo}}</b></p>
                    @if($produto->qtde > 0)
                    <p>$R {{$produto->preco}}</p>
                    @else
                    <p>Não disponível</p>
                    @endif
                </div>
                <div class="card-action">
                    <a href="{{route('site.produto.detalhe',[$produto->id, str_slug($produto->titulo,'_')])}}">
                        Ver mais...
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"></script>