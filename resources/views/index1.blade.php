@extends(('layouts/default'))
{{-- Page title --}}
@section('title')
    Dashboard-1
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
    <link href="{{asset('assets/css/pages/flot_charts.css')}}" rel="stylesheet" type="text/css">
@stop
@section('content')
    <header class="head">
        <div class="main-bar">
            <div class="row no-gutters">
                <div class="col-6">
                    <h4 class="m-t-5">
                        <i class="fa fa-home"></i>
                        Página Inicial
                    </h4>
                </div>
            </div>
        </div>
    </header>
<div class="outer">
    <div class="inner bg-container">
        <div class="row">
            <div class="col-xl-6 col-lg-7 col-12">
                <div class="row">
                    <div class="col-sm-6 col-12">
                        <div class="bg-disponibilizados top_cards">
                            <div class="row icon_margin_left">

                                <div class="col-lg-4 col-4 icon_padd_left">
                                    <div class="float-left">
                                        <span class="fa-stack fa-sm">
                                        <i class="fa fa-circle fa-stack-2x"></i>
                                        <i class="fa fa-refresh fa-stack-1x fa-inverse text-success sales_hover"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-lg-8 col-8 icon_padd_right">
                                    <div class="float-right cards_content" align="right">
                                        <span class="number_val" id="produtos_visualizados"></span>
                                        <i class="fa fa-long-arrow-up fa-2x"></i>
                                        <br/>
                                        <span class="card_description">Visualização dos Produtos</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-12">
                        <div class="bg-spins top_cards">
                            <div class="row icon_margin_left">
                                <div class="col-lg-5  col-5 icon_padd_left">
                                    <div class="float-left">
                                        <span class="fa-stack fa-sm">
                                        <i class="fa fa-circle fa-stack-2x"></i>
                                        <i class="fa fa-circle-o-notch fa-stack-1x fa-inverse text-success visit_icon"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-lg-7 col-7 icon_padd_right">
                                    <div class="float-right cards_content" align="right">
                                        <span class="number_val" id="produtos_reservados"></span><i
                                            class="fa fa-long-arrow-up fa-2x"></i>
                                        <br/>
                                        <span class="card_description">Reservas de Produtos</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-12">
                        <div class="bg-participantes top_cards">
                            <div class="row icon_margin_left">
                                <div class="col-lg-5 col-5 icon_padd_left">
                                    <div class="float-left">
                                        <span class="fa-stack fa-sm">
                                        <i class="fa fa-circle fa-stack-2x"></i>
                                        <i class="fa fa-users fa-stack-1x fa-inverse text-participantes revenue_icon"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-lg-7 col-7 icon_padd_right">
                                    <div class="float-right cards_content" align="right">
                                        <span class="number_val" id="totalClientes"></span><i
                                            class="fa fa-long-arrow-up fa-2x"></i>
                                        <br/>
                                        <span class="card_description">Clientes Cadastrados</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-12">
                        <div class="bg-acessos top_cards">
                            <div class="row icon_margin_left">
                                <div class="col-lg-5 col-5 icon_padd_left">
                                    <div class="float-left">
                                        <span class="fa-stack fa-sm">
                                        <i class="fa fa-circle fa-stack-2x"></i>
                                        <i class="fa fa-bookmark-o  fa-stack-1x fa-inverse text-acessos  sub"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-lg-7 col-7 icon_padd_right">
                                    <div class="float-right cards_content" align="right">
                                        <span class="number_val" id="acessos"></span><i
                                            class="fa fa-long-arrow-down fa-2x"></i>
                                        <br/>
                                        <span class="card_description">Acessos em Tempo Real</span>
                                        <br />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-5 col-12 stat_align  m-t-15">
                <div class="card col-12 m-t-10">
                    <div class="card-header bg-white">Top 5 - Produtos Visualizados</div>
                    <div class="card-body p-0" style="text-align: center !important;">
                        <div class="row task-item2">
                            <div class="col-3" id="topProduto0">Nome Promoção 1</div>
                            <div class="col-5" id="progress-bar">
                                <!--<progress class="progress progress-danger" value="52"-->
                                <!--max="100"></progress>-->
                                <div class="progress">
                                    <div id="topProduto0Progress" class="progress-bar bg-danger" role="progressbar"
                                         style="width: 0%" aria-valuenow="0" aria-valuemin="0"
                                         aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="col-2">
                                <span class="progress-info" id="totalTop10_0">0</span>
                            </div>
                            <div class="col-2">
                                <span class="progress-info" id="porcentagemTop10_0">0%</span>
                            </div>
                        </div>
                        <div class="row task-item2">
                            <div class="col-3" id="topProduto1">Nome Promoção 2</div>
                            <div class="col-5" id="progress-bar">
                                <!--<progress class="progress progress-danger" value="52"-->
                                <!--max="100"></progress>-->
                                <div class="progress">
                                    <div id="topProduto1Progress" class="progress-bar bg-success" role="progressbar"
                                         style="width: 0%" aria-valuenow="0" aria-valuemin="0"
                                         aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="col-2">
                                <span class="progress-info" id="totalTop10_1">0</span>
                            </div>
                            <div class="col-2">
                                <span class="progress-info" id="porcentagemTop10_1">0%</span>
                            </div>
                        </div>
                        <div class="row task-item2">
                            <div class="col-3" id="topProduto2">Nome Promoção 3</div>
                            <div class="col-5" id="progress-bar">
                                <!--<progress class="progress progress-danger" value="52"-->
                                <!--max="100"></progress>-->
                                <div class="progress">
                                    <div id="topProduto2Progress" class="progress-bar bg-warning" role="progressbar"
                                         style="width: 0%" aria-valuenow="0" aria-valuemin="0"
                                         aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="col-2">
                                <span class="progress-info" id="totalTop10_2">0</span>
                            </div>
                            <div class="col-2">
                                <span class="progress-info" id="porcentagemTop10_2">0%</span>
                            </div>
                        </div>
                        <div class="row task-item2">
                            <div class="col-3" id="topProduto3">Nome Promoção 4</div>
                            <div class="col-5" id="progress-bar">
                                <!--<progress class="progress progress-danger" value="52"-->
                                <!--max="100"></progress>-->
                                <div class="progress">
                                    <div id="topProduto3Progress" class="progress-bar bg-info" role="progressbar"
                                         style="width: 0%" aria-valuenow="0" aria-valuemin="0"
                                         aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="col-2">
                                <span class="progress-info" id="totalTop10_3">0</span>
                            </div>
                            <div class="col-2">
                                <span class="progress-info" id="porcentagemTop10_3">0%</span>
                            </div>
                        </div>
                        <div class="row task-item2">
                            <div class="col-3" id="topProduto4">Nome Promoção 5</div>
                            <div class="col-5" id="progress-bar">
                                <!--<progress class="progress progress-danger" value="52"-->
                                <!--max="100"></progress>-->
                                <div class="progress">
                                    <div id="topProduto4Progress" class="progress-bar bg-primary" role="progressbar"
                                         style="width: 0%" aria-valuenow="0" aria-valuemin="0"
                                         aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="col-2">
                                <span class="progress-info" id="totalTop10_4">0</span>
                            </div>
                            <div class="col-2">
                                <span class="progress-info" id="porcentagemTop10_4">0%</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 col-12 m-t-15">
                <div class="card">
                    <ul id="clothing-nav" class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">Volume Acessos à Loja</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#hats" role="tab" data-toggle="tab" aria-controls="hats" id="nome_mes"></a>
                        </li>
                    </ul>
                    <div class="card-body">
                        <div id="clothing-nav-content" class="tab-content">
                            <div role="tabpanel" class="tab-pane fade show active" id="home"
                                 aria-labelledby="home-tab">
                                <div id="area-chart" class="flotChart003"></div>
                            </div>
                            <!--
                            <div role="tabpanel" class="tab-pane fade" id="hats" aria-labelledby="hats-tab">
                                <div id="area-chart2" class="flotChart3"></div>
                            </div>
                            -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row"> <!-- Graficos de Rosca -->
            <div class="col-lg-4 col-12 m-t-35">
                <div class="card">
                    <div class="card-header bg-white">
                        Gênero dos Participantes
                    </div>
                    <div class="card-block">
                        <div id="piechart" class="flotChart03"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-12 m-t-35">
                <div class="card">
                    <div class="card-header bg-white">Compartilhamentos</div>
                    <div class="card-header bg-white" style="border-bottom: 0px !important"><strong><h1><span id="compartilhamento">0</span></h1><div class="margemBaixo"></div></strong></div>
                </div>
                <div class="card m-t-35">
                    <div class="card-header bg-white">Clientes Cadastrados (Dia/Semana/Mês)</div>
                    <div class="card-header bg-white" style="border-bottom: 0px !important">
                        <div class="row">
                            <div class="col-md-4 ">
                                <strong><h2><span id="clientesDia">0</span></h2></strong><br>Diário
                            </div>
                            <div class="col-md-4 ">
                                <strong><h2><span id="clientesSemana">0</span></h2></strong><br>Semanal
                            </div>
                            <div class="col-md-4 ">
                                <strong><h2><span id="clientesMes">0</span></h2></strong><br>Mensal
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-12 m-t-35">
                <div class="card">
                    <div class="card-header bg-white">
                            Faixa Etária dos Clientes 
                    </div>
                    <div class="card-block">
                        <!--
                        <canvas id="bar-chart" style="width: 100%; height: 207px;" class="margemEsq"></canvas>
                        -->
                        <div id="basicFlotLegend2" class="flotLegend"></div>
                        <div id="bar-chart" class="flotChart1" style="padding: 0px;"></div>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-12 m-t-35">
                <div class="card">
                    <div class="card-header bg-white">
                        <div class=" twitter_section_head">
                            <a href="acoesrecentes" style="color: #0069a0;">Atividades Recentes</a>
                        </div>
                    </div>
                    <div class="card-block twitter_section">
                        <ul id="nt-example1" style="height: 265px; overflow: hidden;">
                            <li style="margin-top: 0px;">
                                <div class="row">
                                    <div class="col-2 col-lg-3 col-xl-2">
                                        <a id="linkPerfilAcao0" href="#"><img src="{{asset('assets/img/foto_perfil/foto_perfil.png')}}" id="imagemAcao0" class="rounded-circle" alt="image not found"></a>
                                    </div>
                                    <div class="col-10 col-lg-9 col-xl-10">
                                        <span class="name" id="nomeUsuarioAcao0">Nome Usuário</span> <span id="dataAcao0" class="time">DD/MM/AAAA</span>
                                        <br>
                                        <span class="msg"><a id="linkAcao0" href="#"><span id="acao0">Ação Usuário</span></a></span>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-2 col-lg-3 col-xl-2">
                                        <a id="linkPerfilAcao1" href="#"><img src="{{asset('assets/img/foto_perfil/foto_perfil.png')}}" id="imagemAcao1" class="rounded-circle" alt="image not found"></a>
                                    </div>
                                    <div class="col-10 col-lg-9 col-xl-10">
                                        <span class="name" id="nomeUsuarioAcao1">Nome Usuário</span> <span id="dataAcao1" class="time">DD/MM/AAAA</span>
                                        <br>
                                        <span class="msg"><a id="linkAcao1" href="#"><span id="acao1">Ação Usuário</span></a></span>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-2 col-lg-3 col-xl-2">
                                        <a id="linkPerfilAcao2" href="#"><img src="{{asset('assets/img/foto_perfil/foto_perfil.png')}}" id="imagemAcao2" class="rounded-circle" alt="image not found"></a>
                                    </div>
                                    <div class="col-10 col-lg-9 col-xl-10">
                                        <span class="name" id="nomeUsuarioAcao2">Nome Usuário</span> <span id="dataAcao2" class="time">DD/MM/AAAA</span>
                                        <br>
                                        <span class="msg"><a id="linkAcao2" href="#"><span id="acao2">Ação Usuário</span></a></span>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-2 col-lg-3 col-xl-2">
                                        <a id="linkPerfilAcao3" href="#"><img src="{{asset('assets/img/foto_perfil/foto_perfil.png')}}" id="imagemAcao3" class="rounded-circle" alt="image not found"></a>
                                    </div>
                                    <div class="col-10 col-lg-9 col-xl-10">
                                        <span class="name" id="nomeUsuarioAcao3">Nome Usuário</span> <span id="dataAcao3" class="time">DD/MM/AAAA</span>
                                        <br>
                                        <span class="msg"><a id="linkAcao3" href="#"><span id="acao3">Ação Usuário</span></a></span>
                                    </div>
                                </div>
                                <hr>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-8 col-12">
                <div class="row">
                    <div class="col-lg-7 col-12 m-t-35">
                        <div class="card to_do">
                            <div class="card-header bg-white">
                                Lista de Afazeres
                            </div>
                            <div class="card-block no-padding to_do_section">
                                <div >
                                    <div style="position: relative; overflow: hidden; width: auto; height: 213px;">
                                        <div id="salvandoAfazeres" style="background: url('{{asset('assets/img/loader.gif')}}') no-repeat center; height: 245px; display: none;"></div>
                                        <div class="todo_section" id="formListaAfazeres">
                                                <?php $c = 0;?>
                                                @foreach($listagemAfazeres as $tarefa)
                                                <form class="list_of_items" id="atualizaAfazer{{$listagemAfazeres[$c]->id}}" action="atualizaAfazer/{{$listagemAfazeres[$c]->id}}" method="POST">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <div class="todolist_list showactions px-3">
                                                        <div class="row">
                                                            <div class="col-9 nopad custom_textbox1"> 
                                                                <div class="todo_mintbadge todo_mintbadge"> </div> 
                                                                
                                                                <div class="todotext todoitem">{{$listagemAfazeres[$c]->texto}}</div>
                                                            </div>
                                                            <div class="col-3 showbtns todoitembtns" style=""> 
                                                                <a href="#" id="salvaAfazer" onclick="document.getElementById('atualizaAfazer{{$listagemAfazeres[$c]->id}}').submit();" class="todoedit margemDir">
                                                                    
                                                                </a>
                                                                <a id="excluirAfazer" href="removeAfazer/{{$listagemAfazeres[$c]->id}}" class="tododelete redcolor">
                                                                    <span class="fa fa-trash"></span>
                                                                </a>
                                                            </div>
                                                            <span class="seperator"></span>
                                                        </div>
                                                    </div>
                                                </form>
                                                <?php $c++?>
                                                @endforeach
                                        </div>
                                    </div>
                                    <form id="main_input_box" class="form-inline" action="insereAfazer" method="POST">
                                        <div class="input-group todo" id="custom_textbox">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input name="texto" type="text" required="" placeholder="Digite e aperte Enter" class="input-md form-control"  maxlength="254" size="75">
                                        </div>
                                    </form>
                                </div>
                                <div class="mycontent">
                                    <div class="border_color bg-danger border_danger" data-color="btn-danger" data-badge="bg-danger"></div>
                                    <div class="border_color bg-primary border_primary" data-color="btn-primary" data-badge="bg-primary"></div>
                                    <div class="border_color bg-info border_info" data-color="btn-info" data-badge="bg-info"></div>
                                    <div class="border_color bg-mint border_mint" data-color="btn-mint" data-badge="bg-mint"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-12 m-t-35">
                        <div class="block widget-notes">
                            <div class="card" >
                                <form id='atualizaNota' action="salvaNotas" method="POST">
                                    <div class="card-header bg-white">
                                        Notas <span id="salvarNotas" onclick="document.getElementById('atualizaNota').submit();" title="Salvar Notas" class='fa fa-check divdireita'></span>
                                    </div>
                                    
                                    <div class="content" id="mostraNotas">
                                        <div id="salvandoNotas" style="background: url('{{asset('assets/img/loader.gif')}}') no-repeat center; height: 265px; display: none;"></div>
                                        <div contenteditable="true">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <textarea name='notas' class="notes col-12" style="border-top:1px solid #ffffff; border-bottom:1px solid #ffffff; border-left:1px solid #ffffff; border-right:1px solid #ffffff; height: 265px;" contenteditable="true">{{$notas[0]->notas}}</textarea>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12 col-12">
                <div class="row">
                    <div class="col-lg-12 col-12">
                        <div class="bg-warning m-t-15 header_align">
                            <div class="row">
                                <div class="col-lg-12 col-12">
                                    <div class="row">
                                        <div class="col-12" style="font-size: 20px;">
                                            <span class="current-date float-left margemEsq"></span><span class="time float-right margemDir " id="time"></span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                          
        </div>
        <!-- /.inner -->
    </div>
    <!-- /.outer -->

    <!-- /#content -->
@stop
@section('footer_scripts')

    <script type="text/javascript" src="{{asset('assets/vendors/slimscroll/js/jquery.slimscroll.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/grafico-sexo.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/charts.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/raphael/js/raphael-min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/d3/js/d3.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/c3/js/c3.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/toastr/js/toastr.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/switchery/js/switchery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/flotchart/js/jquery.flot.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/flotchart/js/jquery.flot.resize.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/flotchart/js/jquery.flot.stack.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/flotchart/js/jquery.flot.time.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/flotspline/js/jquery.flot.spline.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/flotchart/js/jquery.flot.categories.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/flotchart/js/jquery.flot.pie.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/flot.tooltip/js/jquery.flot.tooltip.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/jquery_newsTicker/js/newsTicker.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/countUp.js/js/countUp.min.js')}}"></script>
    <!--end of plugin scripts
    <script type="text/javascript" src="{{asset('assets/js/pages/new_dashboard.js')}}"></script> -->
    <script type="text/javascript" src="{{asset('assets/vendors/moment/js/moment.min.js')}}"></script>
    <script type="text/javascript">
        
    $(document).ready(function(){
        acoesRecentesUsuarios();
        carregaQuadradinhos();
        carregatop5Produtos();
        carregaSexos();
        totalClientesCadastrados();
        carregaGraficoIdade();
        carregaCalendario();
    });


    setInterval('acoesRecentesUsuarios()', 10000);
    setInterval('carregaQuadradinhos()', 10000);
    setInterval('carregatop5Produtos()', 30000);
    setInterval('carregaSexos()', 45000);
    setInterval('totalClientesCadastrados()', 30000);
    setInterval('carregaGraficoIdade()', 30000);    
    setInterval('carregaCalendario()', 45000);

    


    
    //Acoes dos Usuarios
    function acoesRecentesUsuarios(){
        $.ajax({
            type: 'GET',
            url: "acoesrecentesusuarios",
            success: function(data) {
                for (i = 0; i <= data.length -1 ; i++) {
                    let dataAtual = new Date(data[i].created_at);
                    let dia = dataAtual.getDate();
                    let mes = dataAtual.getMonth()+1;
                    let ano = dataAtual.getFullYear();
                    let hora = dataAtual.getHours();
                    let minuto = dataAtual.getMinutes();
                    let segundo = dataAtual.getSeconds();
                    let horaImprimivel = hora + ":" + minuto + ":" + segundo;

                    if (dia.toString().length == 1){
                      dia = "0"+dia;
                    }
                    if (mes.toString().length == 1){
                      mes = "0"+mes;
                    }
                    if (hora.toString().length == 1){
                      hora = "0"+hora;
                    }
                    if (minuto.toString().length == 1){
                      minuto = "0"+minuto;
                    }
                    if (segundo.toString().length == 1){
                      segundo = "0"+segundo;
                    }
                    let dataFinal = dia +'/'+mes+'/'+ano+' '+hora+':'+minuto+':'+segundo;
                    let dir = "{{asset('assets/img/foto_perfil/')}}";
                    $('#linkPerfilAcao'+i).attr("href", "usuarios/perfilusuario/" + data[i].id_usuario);
                    $('#nomeUsuarioAcao'+i).html(data[i].nome);
                    $('#dataAcao'+i).html(dataFinal);
                    $('#linkAcao'+i).attr("href", data[i].link);
                    $('#acao'+i).html(data[i].acao);
                    $('#imagemAcao'+i).attr("src", dir+'/'+data[i].foto);
                }               
            }
        });
    }

    function carregaQuadradinhos(){
        //Carregando os quadradinhos:
        $.ajax({
            type: 'GET',
            url: "carregaquadradinhos",
            success: function(data) {
                //ANIMACAO DOS NUMEROS DOS QUADROS COLORIDOS E BARRA DE PROGRESSO DA PONTUACAO
                var opcoes = {
                    useEasing: true,
                    useGrouping: true,
                    separator: ',',
                    decimal: '.',
                    prefix: '',
                    suffix: ''
                };

                new CountUp("produtos_visualizados", 0, (data[0][0].produtos_visualizados), 0, 2.5, opcoes).start();
                new CountUp("produtos_reservados", 0, data[1][0].produtos_reservados, 0, 2.5, opcoes).start();
                new CountUp("totalClientes", 0, data[2][0].total_clientes, 0, 2.5, opcoes).start();
                new CountUp("acessos", 0, data[3][0].acessos, 0, 2.5, opcoes).start();

                //Compartilhamentos:
                $('#compartilhamento').html(data[4][0].compartilhamentos);
            }
        });
    }

    function carregatop5Produtos(){
        //Carregando o TOP10 Promocoes Aderidas:
        $.ajax({
            type: 'GET',
            url: "carregatop5Produtos",
            success: function(data) {                
                let total = 0;
                //somando a quantidade de adesoes total             
                for (var i = 0; i <= data.length - 1; i++) {
                    total += data[i].total;
                }
                let porcentagem = 0;
                //montando o layout
                for (var i = 0; i <= data.length - 1; i++) {
                    //calculando a Porcentagem:
                    porcentagem = (( data[i].total * 100 ) / total ).toFixed(2);
                    if (typeof porcentagem == 'number') {
                        $('#topProduto'+i+'Progress').css({'width:': porcentagem+'%', 'aria-valuenow:': porcentagem});
                        $('#porcentagemTop10_'+i).html(porcentagem+'%');
                    }else{
                        $('#topProduto'+i+'Progress').css('width: 0%; aria-valuenow: 0');
                        $('#porcentagemTop10_'+i).html('0%');
                    }
                    $('#topProduto'+i).html('<a href="publicacoes/publicacoes/'+data[i].id+'" class="text-info">'+data[i].titulo+'</a>');
                    $('#totalTop10_'+i).html('<a href="verdetalhespublicacao/'+data[i].id+'/0" class="text-info">'+data[i].total+'</a>');
                }
            }
        });
    }


    //Carregando grafico de sexos:
    google.charts.load('current', {'packages':['corechart']});
    
    function carregaSexos(){
        //Grafico de Sexos
        $.ajax({
            type: 'GET',
            url: "carregasexos",
            success: function(dados) {
                // -- GRAFICO ROSCA -- //
                google.charts.setOnLoadCallback(drawChart(dados));

                function drawChart(dados) {

                    var data = google.visualization.arrayToDataTable([
                      ['Task', 'Hours per Day'],
                      ['Homem', parseInt(dados[0][0].homens)],
                      ['Mulher', parseInt(dados[1][0].mulheres)]
                    ]);

                    var options = {
                      //title: 'Gênero dos Participantes'
                      is3D: true
                    };

                    var chart = new google.visualization.PieChart(document.getElementById('piechart'));

                    chart.draw(data, options);
                }
            }
        });
    }


    //Numeros do Total de Participantes e dia/semana/mes
    function totalClientesCadastrados(){
        $.ajax({
            type: 'GET',
            url: "totalclientescadastrados",
            success: function(data) {
                $('#clientesDia').html(data[0][0].clientesDia);
                $('#clientesSemana').html(data[1][0].clientesSemana);
                $('#clientesMes').html(data[2][0].clientesMes);
            }
        });
    }

    function carregaGraficoIdade()
    {
        $.ajax({
            type: 'GET',
            url: "carregagraficoidade",
            success: function(dados) {
                let idade = [0,0,0,0,0,0,0,0]; // Array que vai armazenar os totais das idades
                for (let i = 0; i < dados.length; i++) {
                    if (dados[i].idade < 17) {
                        idade[0] +=1;
                    }else if(dados[i].idade >= 17 && dados[i].idade < 21){
                        idade[1] +=1;
                    }else if(dados[i].idade >= 21 && dados[i].idade < 26){
                        idade[2] +=1;
                    }else if(dados[i].idade >= 26 && dados[i].idade < 31){
                        idade[3] +=1;
                    }else if(dados[i].idade >= 31 && dados[i].idade < 36){
                        idade[4] +=1;
                    }else if(dados[i].idade >= 36 && dados[i].idade < 41){
                        idade[5] +=1;
                    }else if(dados[i].idade >= 41 && dados[i].idade < 51){
                        idade[6] +=1;
                    }else if(dados[i].idade >= 51 && dados[i].idade < 61){
                        idade[7] +=1;
                    }else{
                        idade[8] +=1;
                    }
                }

                var d1 = [["0-16", idade[0]],["17-20", idade[1]],["21-25", idade[2]],["26-30", idade[3]],["31-35", idade[4]],["36-40", idade[5]],["41-50",idade[6]],["51-60", idade[7]],["61 ou +", idade[8]]];
                $.plot("#bar-chart", [{
                    data: d1,
                    label: "Quantidade",
                    color: "#0fb0c0"
                }], {
                    series: {
                        bars: {
                            align: "center",
                            lineWidth: 0,
                            show: !0,
                            barWidth: .6,
                            fill: .9
                        }
                    },
                    grid: {
                        borderColor: "#ddd",
                        borderWidth: 1,
                        hoverable: !0
                    },
                    legend: {
                        container: '#basicFlotLegend2',
                        show: true
                    },
                    tooltip: true,
                    tooltipOpts: {
                        content: '%s: %y'
                    },

                    xaxis: {
                        tickColor: "#ddd",
                        mode: "categories"
                    },
                    yaxis: {
                        tickColor: "#ddd"
                    },
                    shadowSize: 0
                });
            }
        });
    }

    //Funcoes de carregamento Ajax
    // CARREGA CALENDARIO DOS ACESSOS DOS CLIENTES NO MES VIGENTE
    function carregaCalendario()
    {
        var mes_atual = new Array();
        mes_atual[0] = "Janeiro";
        mes_atual[1] = "Fevereiro";
        mes_atual[2] = "Março";
        mes_atual[3] = "Abril";
        mes_atual[4] = "Maio";
        mes_atual[5] = "Junho";
        mes_atual[6] = "Julho";
        mes_atual[7] = "Agosto";
        mes_atual[8] = "Setembro";
        mes_atual[9] = "Outubro";
        mes_atual[10] = "Novembro";
        mes_atual[11] = "Dezembro";

        var d = new Date();

        $.ajax({
        type: 'GET',
        url: "carregacalendario",
        success: function(dados){
            $('#nome_mes').text('Acessos vs Data ('+mes_atual[d.getMonth()]+"/"+d.getFullYear()+')')
            var acessos_dia = new Array(dados);
            $.plot("#area-chart", [{
                data: acessos_dia[0],
                label: mes_atual[d.getMonth()]+"/"+d.getFullYear(),
                color: "#0000CD"
            }
            ], {
                series: {
                    lines: {
                        show: !0,
                        fill: .8,
                        fillColor: { colors: [{ opacity: 0.0 }, { opacity: 0.6}] }
                    },
                    points: {
                        show: !0,
                        radius: 3
                    }
                },
                grid: {
                    borderColor: "#fff",
                    borderWidth: 1,
                    hoverable: !0
                },
                tooltip: true,
                tooltipOpts: {
                    content: "%y",
                    defaultTheme: true
                },
                xaxis: {
                    tickColor: "#eff",
                    mode: "categories"
                },
                yaxis: {
                    tickColor: "#eff"
                },
                shadowSize: 0
                });
            }
        });
    }


    
    //Fim - Funcoes de carregamento Ajax
    
    $(".todo_section").on('dblclick',".todotext", function(e) { //duplo clique no item da listagem:
        let editButton = " <a href='#' class='todoedit'><span class='fa fa-pencil'></span></a>";
        e.preventDefault();
        $(this).closest('.todolist_list').find('.striked').toggle();
        if ($(this).text() == " ") {
            $(this).closest('.todolist_list').find(".showbtns").toggleClass("opacityfull");
            let text1 = $(this).closest('.todolist_list').find("input[type='text'][name='text']").val().trim();
            if (text1 === '') {
                alert('Come on! you can\'t create a todo without title');
                $(this).closest('.todolist_list').find("input[type='text'][name='text']").focus();
                $(this).closest('.todolist_list').find(".striked").hide();
                return;
            }
            $(this).closest('.todolist_list').find('.todotext').html(text1);
            $(this).html("<span class='fa fa-pencil'></span>");
            $(this).closest('.todolist_list').find(".showbtns").toggleClass("opacityfull");
            return;
        }
        let text = '';
        text = $(this).closest('.todolist_list').find('.todotext').text();
        text = "<input type='text' name='afazerAtualizado' id='afazerAtualizado' value='" + text + "' onkeypress='return event.keyCode != 13;' />";
        $(this).closest('.todolist_list').find('.todoedit').html("<span class='fa fa-check'></span> ");
        $(this).html(text);
        text = '';
        return;
    });

    $().on('dblclick',".todoedit", function(e) {
        let editButton = " <a href='#' class='todoedit'><span class='fa fa-pencil'></span></a>";
        e.preventDefault();
        $(this).closest('.todolist_list').find('.striked').toggle();
        if ($(this).text() == " ") {
            $(this).closest('.todolist_list').find(".showbtns").toggleClass("opacityfull");
            let text1 = $(this).closest('.todolist_list').find("input[type='text'][name='text']").val().trim();
            if (text1 === '') {
                alert('Come on! you can\'t create a todo without title');
                $(this).closest('.todolist_list').find("input[type='text'][name='text']").focus();
                $(this).closest('.todolist_list').find(".striked").hide();
                return;
            }
            $(this).closest('.todolist_list').find('.todotext').html(text1);
            $(this).html("");
            $(this).closest('.todolist_list').find(".showbtns").toggleClass("opacityfull");
            return;
        }
        let text = '';
        text = $(this).closest('.todolist_list').find('.todotext').text();
        text = "<input type='text' name='text' value='" + text + "' onkeypress='return event.keyCode != 13;' />";
        $(this).closest('.todolist_list').find('.todotext').html(text);
        /*$(this).html("<span class='fa fa-check'></span> "); */
        text = '';
        return;
    });

    // -- GIF SALVANDO -- //
    //Na tela Afazeres:
    $('#salvaAfazer, #excluirAfazer').click(function(){
        $('#salvandoAfazeres, #formListaAfazeres').css('display','block');
        $('#custom_textbox').children().css('pointer-events','none');
        $('#custom_textbox').children().css('opacity',0.5);
        $('#custom_textbox').children().css('background','#CCC');
    });
    $("form#main_input_box").submit(function(event) {
        $('#salvandoAfazeres, #formListaAfazeres').css('display','block');
        $('#custom_textbox').children().css('pointer-events','none');
        $('#custom_textbox').children().css('opacity',0.5);
        $('#custom_textbox').children().css('background','#CCC');
    });
    //Na tela Notas
    $('#salvarNotas').click(function(){
        $('#salvandoNotas, #mostraNotas').css('display','block');
        $('#salvarNotas').css('visibility','hidden');
    });


    //Hora atual no rodape
    let datetime = null, time = null, date = null;

    let update = function () {
        date = moment(new Date());
        datetime.html(date.format('DD MMMM YYYY - dddd'));
        time.html(date.format('H:mm:ss'));
    };

    if($('.current-date')[0] && $('.time')[0]) {
        datetime = $('.current-date');
        time = $('#time');

        update();
        setInterval(update, 1000);
    }

    /* Mensagem de bem vindo */

    var i = -1;
    var toastCount = 0;
    var $toastlast;

    var shortCutFunction = "success";
    var msg = "{{Request::session()->get('nome')}}";
    var title = "<span>Bem-vindo!</span>";
    var $showDuration = 1000;
    var $hideDuration = 1000;
    var $timeOut = 5000;
    var $extendedTimeOut = 1000;
    var $showEasing = "swing";
    var $hideEasing = "linear";
    var $showMethod = "fadeIn";
    var $hideMethod = "fadeOut";
    var toastIndex = toastCount++;
    toastr.options = {
        closeButton: $('#closeButton').prop('checked'),
        debug: $('#debugInfo').prop('checked'),
        positionClass: 'toast-top-right',
        onclick: null
    };
    if ($showDuration.length) {
        toastr.options.showDuration = $showDuration;
    }
    if ($hideDuration.length) {
        toastr.options.hideDuration = $hideDuration;
    }
    if ($timeOut.length) {
        toastr.options.timeOut = $timeOut;
    }
    if ($extendedTimeOut.length) {
        toastr.options.extendedTimeOut = $extendedTimeOut;
    }
    if ($showEasing.length) {
        toastr.options.showEasing = $showEasing;
    }
    if ($hideEasing.length) {
        toastr.options.hideEasing = $hideEasing;
    }
    if ($showMethod.length) {
        toastr.options.showMethod = $showMethod;
    }
    if ($hideMethod.length) {
        toastr.options.hideMethod = $hideMethod; 
    }
    if ("{{Request::session()->get('acesso')}}" == 1) {

        $("#toastrOptions").text("Command: toastr[" + shortCutFunction + "](\"" + msg + (title ? "\", \"" + title : '') + "\")\n\ntoastr.options = " + JSON.stringify(toastr.options, null, 2));
        var $toast = toastr[shortCutFunction](msg, title); // Wire up an event handler to a button in the toast, if it exists
        $toastlast = $toast;
        <?php Request::session() ->put('acesso',0)?>
    }

</script>
@stop
