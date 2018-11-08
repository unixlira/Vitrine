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
                        Pagamentos
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
                            <h2>Finalizar Pedido</h2><br>
                        </div>
                        
                        <form class="pagto" action="{{ URL::to($acao) }}" method="post" novalidate>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="usuario" value="{{ $usuario->id }}">
                            <input type="hidden" name="id_plano" value="{{ $planos[0]->id }}">                           
                            <input type="hidden" name="preco_plano" value="{{ $planos[0]->preco }}">                           
                            <div class="m-t-5">
                                <div class="m-t-30">
                                    <h4>PASSO 1: REVISE O PLANO SELECIONADO</h4>
                                    <hr>
                                </div>

                                <div class="m-l-20 m-t-5">
                                    <div class="m-t-30">
                                        <h5>Plano:</h5><br>
                                    </div>
                                    <div>                                    
                                        @foreach($planos as $plano)                                    
                                            @if($plano->id == $request->id)                           
                                            <label class="checkbox-inline" for="nome_plano"><input type="checkbox"  value="{{$plano->nome}}" name="nome_plano" checked required>&nbsp {{$plano->nome}} (R$ {{$plano->preco}},00 / mês) &nbsp</label>
                                            @endif                                    
                                        @endforeach
                                    </div>
                                    
                                    <br>
                                    <label>Contrato de vigência de 1(um) ano</label>
                                </div>
                            </div>

                            <div class="clearfix"></div>

                            <div class="m-t-5">
                                <div class="m-t-30">
                                    <h4>PASSO 2: ENVIO FATURA / RECIBOS</h4>
                                    <hr>
                                </div>

                                <div class="m-l-20 m-t-20">
                                    <div id="oldemail">
                                        <label class="m-t-20" for="email_cadastrado"><input type="checkbox"  id="checkemailcad" name="email_cadastrado" required>&nbsp Eu quero receber em um e-mail já cadastrado</label>
                                        <input type="email" class="form-control col-lg-4" name="email_cadastrado" value="{{\Request::session()->get('email')}}" required>
                                    </div>
                                    <br>
                                    <div id="newemail">
                                        <label for="email_fatura"><input type="checkbox" id="checknewemail" name="email_fatura"  onclick="myFunction()" required>&nbsp Eu quero utilizar um novo endereço de e-mail</label><br>
                                        <input type="email" class="form-control col-lg-4" style="display: none;" id="inputEmail" name="email_fatura">
                                    </div>
                                </div>
                            </div>

                            <div class="clearfix"></div>

                            <div class="formPagto ">
                                <div class="m-t-30">
                                    <h4>PASSO 3: FORMA DE PAGAMENTO</h4>
                                    <hr>
                                </div>

                                <div class="m-t-30">
                                    <label>Por favor selecione a opção de pagamento desejada</label>
                                </div>

                                
                                <div id="myCartao" class="cartao">
                                    <div class="m-t-30">
                                        <div class="col ">
                                            <label class="checkbox" for="checkbox"><input type="checkbox" id="myCard" name="radio" value="1" onclick="clickBoleto(),showCard()"><b>&nbsp Cartão de Crédito</b></label>
                                        </div>
                                    </div>

                                    <div class="m-t-10">
                                        <img src="{{asset('assets/img/pagamentos/visa.png')}}" width="70" height="25" class="m-l-20">
                                        <img src="{{asset('assets/img/pagamentos/master.png')}}" width="60" height="30" class="m-l-20">
                                        <img src="{{asset('assets/img/pagamentos/amex.png')}}" width="45" height="35" class="m-l-20">
                                        <img src="{{asset('assets/img/pagamentos/diners.png')}}" width="100" height="30" class="m-l-20">
                                    </div>

                                    <div class="col-md-12 dadosCartao ">
                                        <div class="col m-t-30">
                                            <label for="nome_cartao"><b>Nome impresso no Cartão</b></label>
                                            <input type="text" name="nome_cartao" class="form-control col-lg-12" placeholder="Nome" style="font-style: italic;" required>
                                            <label class="m-t-10" for="numero_cartao"><b>Número do Cartão</b></label>
                                            <input type="text" name="numero_cartao" class="form-control col-lg-12" placeholder="Número" style="font-style: italic;" required>

                                            <div class="datavalidade col-lg-6">
                                                    <div class="row ">
                                                        <label class="m-t-10"><b>Data de Validade</b>
                                                            <div class="col-12  row m-t-10">
                                                                <input type="text" name="mes_cartao" class="form-control col-lg-5" placeholder="&nbsp MM" style="font-style: italic;" required>&nbsp
                                                                <input type="text" name="ano_cartao" class="form-control col-lg-5" placeholder="&nbsp AA" style="font-style: italic;" required>
                                                            </div>
                                                        </label>
                                                    </div>
                                            </div>

                                            <div class="ccv">
                                                <label class="m-t-10" for="cvv_cartao"><b>CCV</b></label>
                                                <input type="text" name="cvv_cartao" class="form-control col-lg-6" placeholder="CCV" style="font-style: italic;">
                                            </div>
                                        </div>
                                    </div>    
                                </div><br>

                                <div class="boleto" id="myBoleto">
                                    <div class="m-t-30">
                                        <div class="col ">
                                            <label class="checkbox" for="radio1"><input type="checkbox"  id="myBol" name="radio" value="2" onclick="clickCartao(),showBol()"><b>&nbsp Boleto Bancário</b></label>
                                        </div>
                                    </div>

                                    <div class=" m-t-10">
                                        <img src="{{asset('assets/img/pagamentos/boleto.png')}}" width="100" height="30" class="m-l-20">
                                        <label ><a href="boleto.php">&nbsp  Gerar Boleto</a></label>
                                    </div>
                                </div>
                            </div><br>
                            <div class="clearfix"></div>                            
                            
                            <div class="col termos m-t-20">
                                <label><input type="checkbox" required>&nbsp Eu li e concordo com os <b><a href="termos"><b>Termos e Condições</b></a></b></label>
                            </div>
                            <div class="col-lg-8">
                                <div class="m-t-30">
                                    <img src="{{asset('assets/img/pagamentos/ssl.png')}}" width="150" height="40" class=" mx-auto d-block">
                                </div>
                            </div>
                            
                            
                            <div class="clearfix"></div>
                            
                            <div class="m-t-30">
                                <h4>PASSO 4: CONFIRMAR PEDIDO</h4>
                                <hr>
                            </div>
                            <div>
                                <table class="table table-striped table-bordered table-hover dataTable no-footer textoEsquerda" id="teste" role="grid">
                                    @foreach ($planos as $plano)
                                        @if($plano->id == $request->id)                           
                                            <thead>
                                                <tr role="row">
                                                    <th width="50%">PLANO ADERIDO</th>
                                                    <th class="text-center">Valor Mensal</th>
                                                    <th class="text-center">Vigência</th>
                                                    <th width="20%" class="text-center">Forma de Pagto.</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th >{{$plano->nome}}</th>
                                                    <th class="text-center">R$ {{$plano->preco}},00</th>
                                                    <th class="text-center">12&nbsp&nbspmeses</th>                                                    
                                                    <th class="text-center" id="text" style="display:none;" >Cartão de Crédito</th>
                                                    <th class="text-center" id="textbol" style="display:none;" >Boleto Bancário</th>
                                                    <th id="clear"></th>
                                                </tr>
                                            </tbody>
                                        @endif 
                                    @endforeach                                    
                                </table>
                            </div>

                            <div class=text-right>
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#ModalCentralizado">Finalizar Pedido</button>
                            </div>                           
                                
                            <!-- Modal -->
                            <div class="modal fade" id="ModalCentralizado" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <img src="{{ asset('assets/img/logo_vitrine.png') }}" class="admin_img">
                                        </div>
                                        <div class="modal-body text-center">
                                            <p aria-hidden="true">Pedido concluído com sucesso.</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-success">Continuar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </form>
                     </div>
                </div>
            </div>
        </div>
    </main>
    @stop
