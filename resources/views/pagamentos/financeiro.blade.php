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
                        <form class="financeiro" action="{{ URL::to('excluir') }}" method="post" novalidate>
                            <div class="m-t-30">
                                <h4>ADESÃO</h4>
                                <hr>
                            </div>
                            
                            <div class="col-lg-2 m-t-30">
                                <h5>Planos Contratados:</h5>
                            </div>                            

                            <div class="col-lg-12  adesao">
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
                                                    <th class="text-center"><i class="fa fa-pencil text-warning" title="Renovação Automática"></i></th>
                                                    <th class="text-center"><i class="fa fa-ban text-danger" title="Cancelar Serviço"></i></th>
                                                </tr>
                                            @endforeach                                    
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <br>
                        </form>

                        <form class="financeiro" action="{{ URL::to($acao) }}" method="post" novalidate>
                            
                            <div class="contatofinanceiro">
                                <div class="m-t-30">
                                    <h4>CONTATO</h4>
                                    <hr>
                                </div>
                                <div class="col-lg-2 m-t-30">
                                    <h5>Cadastrado Como:</h5>
                                </div> 

                                <div class="col-lg-8 m-t-30">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <input type="email" class="form-control col-lg-12" style="font-style: italic;" value="{{$planos[0]->email_fatura}}" >
                                        </div>
                                        
                                            <a href="editar" class="col"><input type="button" class="btn btn-success" value="Editar"></a>
                                        
                                    </div>
                                </div>

                            </div>
                            <br>
                                
                            <div class="contatofinanceiro">
                                <div class="m-t-30">
                                    <h4>FORMA DE PAGAMENTO</h4>
                                    <hr>
                                </div>
                                <div class="col-lg-2 m-t-30">
                                    <h5>Cadastrado Como:</h5>
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
                                                        <th class="text-center"><i class="fa fa-pencil text-warning" title="Editar Automática"></i></th>
                                                    </tr>
                                                @endforeach                                    
                                            </tbody>
                                        </table>
                                    </div>
                                </div>                                

                                <div class="row">
                                    <div class="m-t-30">
                                        <div class="col">
                                          <label class="checkbox"><input type="checkbox" ><b>&nbsp; Cartão de Crédito</b></label>
                                          <label><a href="editar">Editar</a></label>
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
