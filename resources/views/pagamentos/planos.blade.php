@extends(('layouts/default'))
{{-- Page title --}}
@section('title')
    Planos
    @parent
@stop
{{-- page level styles --}}
@section('header_styles')
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/c3/css/c3.min.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/custom.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/components.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/toastr/css/toastr.min.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/switchery/css/switchery.min.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/pages/new_dashboard.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/style.css')}}"/>
    <link href="{{asset('assets/css/pages/flot_charts.css')}}" rel="stylesheet" type="text/css">
@stop
@section('content')
    <header class="head">
        <div class="main-bar">
            <div class="row no-gutters">
                <div class="col-6">
                    <h4 class="m-t-5">
                        Planos
                    </h4>
                </div>
            </div>
        </div>
    </header>
    <main>
        <div class="outer">
            <div class="inner bg-container">
                <div class="card m-l-15 m-t-15">
                    <div class="card-body ">
                        <div class=" m-b-20">
                            <b>Selecione o Plano mais adequado para o seu negócio</b>
                        </div>

                        @foreach($planos as $plano)
                            <div class="gallery">
                                <a href="{{ url(sprintf('/pagamentos/forma_pagamento/%s', $plano->id)) }}">
                                    <img src="{{asset($plano->imagem)}}" class="card" alt="Plano {{$plano->nome}}" title="Plano {{$plano->nome}}">
                                </a>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </main>
    @stop