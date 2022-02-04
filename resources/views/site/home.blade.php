<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{asset('css.bootstrap.min.css')}}" type="txt/css">
<link rel="stylesheet" href="{{asset('css.style.css')}}" type="txt/css">

@extends('layouts.site')

@section('content')
<div class="container">
    @include('layouts._site._lista_produtos')
</div>
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="{{asset('js.bootstrap.min.js')}}"></script>