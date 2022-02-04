<nav class="indigo darken-4" style="height:100px;font-family:Roboto;">
                <div class="menu">
                    <div class="container">
                        <div class="row">
                        <div style="float:left;">
                            <div style="font-family:Roboto;margin-left:-100px; margin-top: 15px; float:left;">
                            <a href="{{route('site.home')}}" class="brand-logo">Store</a></div>
                            <div style="margin-left:-100px;font-family:Roboto; margin-top: 40px;">
                            <span >Controle de Vendas</span></div>
                        </div>
                        <a href="#" data-activates="mobile-demo" class="button-collapse">
                            <i class="material-icons">menu</i></a>
                        <ul class="right hide-on-med-and-down">
                            <li><a href="{{route('site.home')}}">Início</a></li>
                            <li><a href="{{route('site.clientes')}}">Clientes</a></li>
                            <li><a href="{{route('site.produtos')}}">Produtos</a></li>
                            <li><a href="{{route('site.pedidos')}}">Pedidos</a></li>
                            
                        </ul>

                        <ul class="side-nav" id="mobile-demo">
                            <li><a href="{{route('site.home')}}">Início</a></li>
                            <li><a href="{{route('site.clientes')}}">Clientes</a></li>
                            <li><a href="{{route('site.produtos')}}">Produtos</a></li>
                            <li><a href="{{route('site.pedidos')}}">Pedidos</a></li>
                               
                        </ul>
                    </div>
                </div>
            </nav>