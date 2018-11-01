@extends(('layouts/default'))
{{-- Page title --}}
@section('title')
    Financeiro
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
                        
                            
                            <div class="m-t-30">
                                <h4>ADESÃO</h4>
                                <hr>
                            </div>
                            
                            <div class="col-lg-2 m-t-30">
                                <h5>Planos Contratados:</h5>
                            </div>                            

                            <div class="col-lg-8  adesao">
                                <div class="table-responsive">
                                    <table class=" table table-striped table-bordered table-hover dataTable " id="teste" role="grid">
                                        <thead>
                                            <tr scope="row">
                                                <th scope="col" class="text-center" style="color:#00bf86;">Nome</th>
                                                <th scope="col" class="text-center" style="color:#00bf86;">Data de Cadastro</th>
                                                <th scope="col" class="text-center" style="color:#00bf86;">Valor Mensal</th>
                                                <th scope="col" class="text-center" style="color:#00bf86;">Vigência</th>
                                                <th nowrap width=10% scope="col" class="text-center" style="color:#00bf86;">Renovação Automática</th>
                                                <th nowrap width=8% scope="col" class="text-center" style="color:#00bf86;">Cancelar Serviço</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($planos as $plano)
                                                <tr>
                                                    <th class="text-center">{{ $plano->nome_plano }}</th>
                                                    <th class="text-center">{{ $plano->created_at->format('d/m/Y') }}</th>
                                                    <th class="text-center">R$ {{ $plano->preco_plano }},00</th>
                                                    <th class="text-center">{{ date('m', strtotime("+365 days",strtotime( $plano->created_at ))) }} Meses</th>
                                                    
                                                    @if($plano->renovacao_auto == 1)                                                        
                                                        <th class="text-center"><a href="{{ URL::to($acao . $plano->id) }}"><i class="fa fa-check text-success" title="ATIVADO: click para desativar renovação automática"></i><a></th>                                                            
                                                    @else
                                                        <th class="text-center"><a href="{{ URL::to($acao . $plano->id) }}"><i class="fa fa-close text-dark" title="DESATIVADO: click para ativar renovação automática"></i></a></th>
                                                    @endif

                                                    <th class="text-center"><a href={{ "excluir/" . $plano->id }} id="icon"><i class="fa fa-ban text-danger" title="Cancelar Serviço"></i></a></th>
                                                </tr>
                                            @endforeach                                    
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <br>
                                                   
                            <div class="contatofinanceiro">
                                <div class="m-t-30">
                                    <h4>CONTATO</h4>
                                    <hr>
                                </div>
                                <div class="col-lg-2 m-t-30">
                                    <h5>E-mail:</h5>
                                </div> 

                                <form action="{{ URL::to($alteraemail) }}" method="post" novalidate>
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="col-lg-8 m-t-30">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <input name="email_fatura" type="email" class="form-control col-lg-12" style="font-style: italic;" value="{{$planos[0]->email_fatura}}" >
                                            </div>
                                                <button type="submit"class="btn btn-success">Editar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <br>
                                
                            <div class="contatofinanceiro">
                                <div class="m-t-30">
                                    <h4>FORMA DE PAGAMENTO</h4>
                                    <hr>
                                </div>
                                <div class="col-lg-2 m-t-30">
                                    <h5>Cadastrado:</h5>
                                </div>
                                <div class="col-lg-8  adesao">
                                    <div class="table-responsive">
                                        <table class=" table table-striped table-bordered table-hover dataTable m-t-20" id="teste" role="grid">
                                            <thead>
                                                <tr scope="row">
                                                    <th scope="col" class="text-center" style="color:#00bf86;">Nome</th>
                                                    <th scope="col" class="text-center" style="color:#00bf86;">Forma de Pagamento</th>
                                                    <th nowrap width=10% scope="col" class="text-center" style="color:#00bf86;">Editar Pagamento</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($planos as $plano)
                                                    <tr>
                                                        <th class="text-center">{{ $plano->nome_plano }}</th>
                                                        <th class="text-center">{{ $plano->forma_pgto }}</th>
                                                        <th class="text-center"><a href="" id="edit" onclick="showPayfor()"><i class="fa fa-pencil text-warning" title="Editar Forma de Pagamento"></i></a></th>
                                                    </tr>
                                                @endforeach                                    
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                
                                <div id="atualizapagamento" style="display:none">

                                    <div class="col-lg-8 m-t-30 text-center">
                                        <h5>Por favor selecione a opção de pagamento desejada:</h5>
                                    </div>
                                    
                                    <div id="myCartao" class="col-md-6 cartao" style="float:left">
                                        <div class="m-t-30">
                                            <div class="col ">
                                                <label class="checkbox" for="checkbox"><input type="checkbox" id="myCard" name="radio" value="Cartao de Credito" onclick="clickBoleto(),showCard()"><b>&nbsp Cartão de Crédito</b></label>
                                            </div>
                                        </div>
    
                                        <div class="m-t-10">
                                            <img src="{{asset('assets/img/pagamentos/visa.png')}}" width="70" height="25" class="m-l-20">
                                            <img src="{{asset('assets/img/pagamentos/master.png')}}" width="60" height="30" class="m-l-20">
                                            <img src="{{asset('assets/img/pagamentos/amex.png')}}" width="45" height="35" class="m-l-20">
                                            <img src="{{asset('assets/img/pagamentos/diners.png')}}" width="100" height="30" class="m-l-20">
                                        </div>
    
                                        <div class="col-md-8 dadosCartao ">
                                            <div class="col m-t-30">
                                                <label for="nome_cartao"><b>Nome impresso no Cartão</b></label>
                                                <input type="text" name="nome_cartao" class="form-control col-lg-12" placeholder="Nome" style="font-style: italic;" required>
                                                <label class="m-t-10" for="numero_cartao"><b>Número do Cartão</b></label>
                                                <input type="text" name="numero_cartao" class="form-control col-lg-12" placeholder="Número" style="font-style: italic;" required>
    
                                                <div class="datavalidade col-lg-6">
                                                        <div class="row ">
                                                            <label class="m-t-10"><b>Data de Validade</b>
                                                                <div class="col-12  row m-t-10">
                                                                    <input type="number" name="mes_cartao" class="form-control col-lg-5" placeholder="&nbsp MM" style="font-style: italic;" required>&nbsp
                                                                    <input type="number" name="ano_cartao" class="form-control col-lg-5" placeholder="&nbsp AA" style="font-style: italic;" required>
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
                                            <div class="col-md-8 ">
                                                <label class="checkbox" for="radio1"><input type="checkbox"  id="myBol" name="radio" value="Boleto Bancario" onclick="clickCartao(),showBol()"><b>&nbsp Boleto Bancário</b></label>
                                            </div>
                                        </div>
    
                                        <div class=" m-t-10">
                                            <img src="{{asset('assets/img/pagamentos/boleto.png')}}" width="100" height="30" class="m-l-20">
                                            <label ><a href="boleto.php">&nbsp  Gerar Boleto</a></label>
                                        </div>
                                    </div>
                                    <div class="col-md-2 text-center">
                                            <button type="submit" class="btn btn-success" style="width: 160px;">Salvar</button>
                                        </div>
                                        <div class="clearfix"></div><br><br>
                                </div><br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <br> <br> <br> 
    </main>
    @stop
