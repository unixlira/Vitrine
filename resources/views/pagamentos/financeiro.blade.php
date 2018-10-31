@extends(('layouts/default'))
{{-- Page title --}}
@section('title')
    Checkout
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
                        Financeiro
                    </h4>
                </div>
            </div>
        </div>
    </header>
    <main>
        <div class="outer">
            <div class="inner bg-container">
                <div class="card">
                    <div class="card-body ">
                        <div>
                            <h2>Meu Plano</h2><br>
                        </div>
                        <form class="financeiro">
                            <div class="m-t-30">
                                <h4>ADESÃO</h4>
                                <hr>
                            </div>

                            <div class="col-lg-12 m-l-20 m-t-5 adesao">
                                <div class="row">
                                    <div class="col-lg-2 m-t-30">
                                        <h5>Data:</h5>
                                        12/12/2018
                                    </div>

                                    <div class="col-lg-2 m-t-30">
                                        <h5>Vigência:</h5>
                                        12/12/2019
                                    </div>

                                    <div class="col-lg-6 m-t-30">
                                        <label class="checkbox-inline"><input type="checkbox" value="">&nbsp Renovação Automática</label>
                                    </div>

                                    <div class="text-rigth m-t-30">
                                        <label><a href="cancelar.php">&nbsp  Cancelamento do serviço</a></label>
                                    </div>

                                </div>
                            </div>

                            <br>

                            <div class="planocontratado">
                                <div class="m-t-30">
                                    <h4>PLANO CONTRATADO</h4>
                                    <hr>
                                </div>

                                <div class="m-l-20 m-t-20">
                                    <div class="m-t-30">
                                        <h5>Plano:</h5><br>
                                    </div>

                                    <div class="col-lg-12 m-l-20">
                                        <div class="row">
                                            <div class="col-lg-4 m-t-5">
                                                <label>Lite (R$ 200,00 / mês)</label><br>
                                                <label>Contrato de vigência de 1(um) ano</label>
                                            </div>

                                            <div class="col-lg-4 m-t-30">
                                                <label><a href="boleto.php">&nbsp  Editar</a></label>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="contatofinanceiro">
                                <div class="m-t-30">
                                    <h4>CONTATO</h4>
                                    <hr>
                                </div>

                                <div class="col-lg-12 m-t-30">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <input type="email" class="form-control col-lg-12" style="font-style: italic;" value="joseroberto@grafite.com.br" >
                                        </div>
                                        <label class="m-t-20"><a href="boleto.php" class="col">&nbsp  Editar</a></label>
                                    </div>
                                </div>

                            </div>
                            <br>
                                
                            <div class="">
                                <div class="m-t-30">
                                    <h4>FORMA DE PAGAMENTO</h4>
                                    <hr>
                                </div>

                                <div class="row">
                                    <div class="m-t-30">
                                        <div class="col">
                                          <label class="checkbox"><input type="checkbox" ><b>&nbsp Cartão de Crédito</b></label>
                                          <label><a href="editar.php">&nbsp  Editar</a></label>
                                        </div>
                                    </div>
                                </div>

                                <div class="m-t-10">
                                    <img src="{{asset('assets/img/pagamentos/visa.png')}}" width="70" height="25" class="m-l-20">
                                </div> 

                                <div class="m-t-30">
                                    <label><b>Nome impresso no Cartão</b></label>
                                    <input type="text" name="nome" class="form-control col-lg-4" placeholder="Nome" style="font-style: italic;"value="José Roberto Lira">
                                    <label class="m-t-10"><b>Número do Cartão</b></label>
                                    <input type="text" name="nome" class="form-control col-lg-4" placeholder="Número" style="font-style: italic;" value="2341 4277 5574 3478">

                                    <div class="datavalidade col-lg-2">
                                        <div class="row ">
                                            <label class="m-t-10"><b>Data de Validade</b>
                                                <div class="col-lg-12  row m-t-10">
                                                    <input type="text" name="nome" class="form-control col-lg-4" placeholder="&nbsp MM" style="font-style: italic;" value="12">&nbsp
                                                    <input type="text" name="nome" class="form-control col-lg-4" placeholder="&nbsp AA" style="font-style: italic;" value="2024">
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="ccv">
                                    <label class="m-t-10"><b>CCV</b></label>
                                    <input type="text" name="nome" class="form-control col-lg-2" placeholder="CCV" style="font-style: italic;" value="775">
                                </div><br>

                                <div class=text-left>
                                    <button type="button" class="btn btn-success" style="width: 160px;">Salvar</button>
                                </div>
                                
                            </div>
                        </form>
                     </div>
                </div>
            </div>
        </div>
    </main>
    @stop
