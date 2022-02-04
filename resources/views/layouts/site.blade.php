<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Sistema de Controle de V') }}</title>

        <!--Import Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed&display=swap" rel="stylesheet">
        <!-- Styles -->
        <link href="{{ asset('lib/materialize/dist/css/materialize.css') }}" rel="stylesheet">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
        <link href="{{ asset('css/carrinho.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="../../css/styleAdminCliente.css" type="text/css"/>
    </head>
    <body>
        
           
                @include('layouts._site._nav')
            
            <main>
                @if(Session::has('mensagem'))
                <div class="container" style="font-family:'Roboto Condensed', sans-serif; color:black;">
                    <div class="row">
                        <div class="{{Session::get('mensagem')['class']}}">
                            <div align="center" class="">
                                {{Session::get('mensagem')['msg']}}
                                
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            @yield('content')
            </main>
        
        <!-- Scripts -->
        <script src="{{ asset('lib/jquery/dist/jquery.js') }}"></script>
        <script src="{{ asset('lib/materialize/dist/js/materialize.js') }}"></script>
        <script src="{{ asset('js/init.js') }}"></script>
        
        <script src="{{asset('js/script.js')}}"></script>
    </body>
</html>
