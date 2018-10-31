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
                        Loja: {{$nome_loja[0]->nome_loja}}
                    </h4>
                </div>
            </div>
        </div>
    </header>
    <?php

        $url = explode('/', (Request::url()));
        $id_loja = $url[4];
    ?>
<div class="outer">
    <div class="inner bg-container">
        <div class="row"> <!-- Quadradinhos -->
            <div class="col-sm-4 col-12">
                <div class="bg-disponibilizados top_cards">
                    <div class="row icon_margin_left">

                        <div class="col-lg-4 col-4 icon_padd_left">
                            <div class="float-left">
                                <span class="fa-stack fa-sm">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-eye fa-stack-1x fa-inverse text-success sales_hover"></i>
                                </span>
                            </div>
                        </div>
                        <div class="col-lg-8 col-8 icon_padd_right">
                            <div class="float-right cards_content" align="right">
                                <span class="number_val" id="totalProdutosVisualizados">92.000</span>
                                <i class="fa fa-long-arrow-up fa-2x"></i>
                                <br/>
                                <span class="card_description">Visualização dos Produtos</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 col-12">
                <div class="bg-spins top_cards">
                    <div class="row icon_margin_left">
                        <div class="col-lg-5  col-5 icon_padd_left">
                            <div class="float-left">
                                <span class="fa-stack fa-sm">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-share-alt fa-stack-1x fa-inverse text-success visit_icon"></i>
                                </span>
                            </div>
                        </div>
                        <div class="col-lg-7 col-7 icon_padd_right">
                            <div class="float-right cards_content" align="right">
                                <span class="number_val" id="totalCompartilhamentos">127</span>
                                <i class="fa fa-long-arrow-up fa-2x"></i>
                                <br/>
                                <span class="card_description">Compartilhamentos</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 col-12">
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
                                <span class="number_val" id="totalReservas">127</span>
                                <i class="fa fa-long-arrow-up fa-2x"></i>
                                <br/>
                                <span class="card_description">Reservas</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- /quadradinhos -->

        <div class="row"> <!-- Tabela Geral de Publicações  -->
            <div class="col-lg-12 col-12">
                <div class="table-responsive m-t-25 card">
                    <table class="table table-bordered">
                        <div class="card-header bg-white">
                            <div class="pull-left" style="margin-top: -6px;">Publicações Ativas</div>
                            <div class="pull-right" style="margin-top: -9px;">
                                <span id="preencherTabelaPublicacoes" class="btn btn-success"><i class="fa fa-plus"></i> Ver Publicações Inativas</span>
                            </div>
                        </div>
                        <thead>
                            <tr>
                                <th class="tituloTabelaCentro">ID</th>
                                <th class="tituloTabelaCentro">Título Publicação</th>
                                <th class="tituloTabelaCentro">Visualizações</th>
                                <th class="tituloTabelaCentro">Minha Lista</th>
                                <th class="tituloTabelaCentro">Compartilhamentos</th>
                                <th class="tituloTabelaCentro">E-commerce</th>
                                <th class="tituloTabelaCentro">Downloads</th>
                                <th class="tituloTabelaCentro">Data Inicial</th>
                                <th class="tituloTabelaCentro">Data Final</th>
                            </tr>
                        </thead>
                        <tbody id="cabecalhoTabela">
                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- /Tabela Geral de Publicações  -->

        <div class="row"> <!-- Tabela Classificações e Reservas -->
            <div class="col-lg-6 col-12 m-t-25">
                <div class="card">
                    <div class="card-header bg-white" style="border-bottom: 1px solid rgba(0, 0, 0, 0.125);">
                        Classificações
                    </div>
                    <div class="card-block" style="text-align: center;">
                        <div id="listarClassificacoes" class="col-12" style="margin-bottom: 10px;">
                            <div class="row m-t-10">
                                <div class="col-6"><strong>Título Publicações</strong></div>
                                <div class="col-3"><i class="fa fa-thumbs-o-up text-info"></i></div>
                                <div class="col-3 "><i class="fa fa-thumbs-o-down text-info"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-12 m-t-25">
                <div class="card">
                    <div class="card-header bg-white" style="border-bottom: 1px solid rgba(0, 0, 0, 0.125);">
                        Reservas de Produtos
                    </div>
                    <div class="card-block" style="text-align: center;">
                        <div id="listarReservas" class="col-12" style="margin-bottom: 10px;">
                            <div class="row m-t-10">
                                <div class="col-8"><strong>Título Publicações</strong></div>
                                <div class="col-4 "><strong>Qtde.</strong></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- /Tabela Classificações e Reservas -->

        <div class="row"> <!-- Graficos e Contagens -->
            <div class="col-lg-4 col-12 m-t-25">
                <div class="card">
                    <div class="card-header bg-white" style="border-bottom: 1px solid rgba(0, 0, 0, 0.125);">
                        Gênero dos Clientes
                    </div>
                    <div class="card-block">
                        <div id="piechart" class="flotChart002"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-12 m-t-25">
                <div class="card">
                    <div class="card-header bg-white" style="border-bottom: 1px solid rgba(0, 0, 0, 0.125);">
                            Faixa Etária dos Clientes 
                    </div>
                    <div class="card-block">
                        <!--
                        <canvas id="bar-chart" style="width: 100%; height: 207px;" class="margemEsq"></canvas>
                        -->
                        <div id="basicFlotLegend2" class="flotLegend"></div>
                        <div id="bar-chart" class="flotChart001" style="padding: 0px;"></div>
                        
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-12 m-t-25">
                <div class="card">
                    <div class="card-header bg-white" style="border-bottom: 1px solid rgba(0, 0, 0, 0.125);">
                        Novas Visualizações (Dia / Semana / Mês)
                    </div>
                    <div class="card-header bg-white" >
                        <div class="row m-t-15" style="text-align: center;">
                            <div class="col-lg-6">
                                Diário
                            </div>
                            <div class="col-lg-6">
                                <h2><span id="visualizacoesDia">14.000</span></h2>
                            </div>
                        </div>
                        <div class="row m-t-20" style="text-align: center;">
                            <div class="col-lg-6">
                                Semanal
                            </div>
                            <div class="col-lg-6">
                                <h2><span id="visualizacoesSemana">95.000</span></h2>
                            </div>
                        </div>
                        <div class="row m-t-20" style="text-align: center;">
                            <div class="col-lg-6">
                                Mensal
                            </div>
                            <div class="col-lg-6">
                                <h2><span id="visualizacoesMes">127.000</span></h2>
                            </div>
                        </div>
                        <div class="row m-t-20" style="text-align: center; margin-bottom: 26px;">
                            <div class="col-lg-6">
                                Acumulado
                            </div>
                            <div class="col-lg-6">
                                <h2><span id="visualizacoesTotal">345.000</span></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- /Graficos e Contagens -->

        <div class="row"> <!-- Atividades Recentes -->
            <div class="col-lg-12 col-12 m-t-25">
                <div class="card">
                    <div class="card-header bg-white" style="border-bottom: 1px solid rgba(0, 0, 0, 0.125);">
                        <div class=" twitter_section_head pull-left">
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
        </div> <!-- /Atividades Recentes -->
    </div><!-- /.inner -->
</div><!-- /.outer -->

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
        totalVisualizacoes();
        mineracaoPublicacoesAtivas();
        preencherListagemClassificacoes();
        preencherListagemReservas();


        carregaSexos();
        carregaGraficoIdade();
    });


    setInterval('acoesRecentesUsuarios()', 10000);
    setInterval('carregaQuadradinhos()', 10000);
    setInterval('totalVisualizacoes()', 30000);
    setInterval('preencherListagemClassificacoes()', 30000);



    setInterval('carregaSexos()', 45000);
    setInterval('carregaGraficoIdade()', 45000);

    


    
    //Acoes dos Usuarios
    function acoesRecentesUsuarios(){
        $.ajax({
            type: 'GET',
            url: "../acoesrecentesusuarioslojas/{{$id_loja}}",
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
                    $('#linkPerfilAcao'+i).attr("href", "../usuarios/perfilusuario/" + data[i].id_usuario);
                    $('#nomeUsuarioAcao'+i).html(data[i].nome);
                    $('#dataAcao'+i).html(dataFinal);
                    $('#linkAcao'+i).attr("href", '../'+data[i].link);
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
            url: "../carregaquadradinhoslojas/{{$id_loja}}",
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

                new CountUp("totalProdutosVisualizados", 0, (data[0][0].produtos_visualizados), 0, 2.5, opcoes).start();
                new CountUp("totalCompartilhamentos", 0, data[1][0].produtos_compartilhados, 0, 2.5, opcoes).start();
                new CountUp("totalReservas", 0, data[2][0].total_reservas, 0, 2.5, opcoes).start();
            }
        });
    }

    function totalVisualizacoes(){
        $.ajax({
            type: 'GET',
            url: "../totalvisualizacoes/{{$id_loja}}",
            success: function(data) {
                $('#visualizacoesDia').html(data[0][0].visualizacoesDia);
                $('#visualizacoesSemana').html(data[1][0].visualizacoesSemana);
                $('#visualizacoesMes').html(data[2][0].visualizacoesMes);
                $('#visualizacoesTotal').html(data[3][0].visualizacoesTotal);
            }
        });
    }


    // Preenchimento da tabela dos dados minerados das Publicações
    function mineracaoPublicacoesAtivas(){
        $.ajax({
            type: 'GET',
            url: "../mineracaopublicacoesativas/{{$id_loja}}",
            success: function(data) {
                let conteudoHtml = '<tbody id="cabecalhoTabela">';
                for (let i = 0; i < data.length; i++) {
                    //Arrumando a data inicial
                    let data1 = new Date(data[i].dataInicial);
                    let dia = data1.getDate();
                    let mes = data1.getMonth()+1;
                    let ano = data1.getFullYear();

                    if (dia.toString().length == 1){
                      dia = "0"+dia;
                    }
                    if (mes.toString().length == 1){
                      mes = "0"+mes;
                    }
                    let dataInicial = dia +'/'+mes+'/'+ano;

                    //Arrumando a data final
                    let data2 = new Date(data[i].dataFinal);
                    dia = data2.getDate();
                    mes = data2.getMonth()+1;
                    ano = data2.getFullYear();

                    if (dia.toString().length == 1){
                      dia = "0"+dia;
                    }
                    if (mes.toString().length == 1){
                      mes = "0"+mes;
                    }
                    let dataFinal = dia +'/'+mes+'/'+ano;

                    conteudoHtml+='<tr><td>'+data[i].id+'</td><td><a href="../publicacoes/publicacoes/'+data[i].id+'">'+data[i].titulo+'</a></td><td>'+data[i].visualizacoes+' <a href="../verdetalhespublicacao/'+data[i].id+'/0" title="Ver Clientes"><i class="fa fa-user-o text-info"></i></a></td><td>'+data[i].minha_lista+' <a href="../verdetalhespublicacao/'+data[i].id+'/1" title="Ver Clientes"><i class="fa fa-user-o text-info"></i></a></td><td>'+data[i].compartilhamentos+' <a href="../verdetalhespublicacao/'+data[i].id+'/2" title="Ver Clientes"><i class="fa fa-user-o text-info"></i></a></td><td>'+data[i].compras+' <a href="../verdetalhespublicacao/'+data[i].id+'/3" title="Ver Clientes"><i class="fa fa-user-o text-info"></i></a></td><td>'+data[i].downloads+' <a href="../verdetalhespublicacao/'+data[i].id+'/4" title="Ver Clientes"><i class="fa fa-user-o text-info"></i></a></td><td>'+dataInicial+'</td><td>'+dataFinal+'</td></tr>';
                }
                $("#cabecalhoTabela").replaceWith(conteudoHtml);
            }
        });
    }

    // Preenchimento da tabela dos dados minerados das Publicações Inativas
    function mineracaoPublicacoesInativas(){
        $.ajax({
            type: 'GET',
            url: "../mineracaopublicacoesinativas/{{$id_loja}}",
            success: function(data) {
                let conteudoHtml = '<tbody id="cabecalhoTabela">';
                for (let i = 0; i < data.length; i++) {
                    //Arrumando a data inicial
                    let data1 = new Date(data[i].dataInicial);
                    let dia = data1.getDate();
                    let mes = data1.getMonth()+1;
                    let ano = data1.getFullYear();

                    if (dia.toString().length == 1){
                      dia = "0"+dia;
                    }
                    if (mes.toString().length == 1){
                      mes = "0"+mes;
                    }
                    let dataInicial = dia +'/'+mes+'/'+ano;

                    //Arrumando a data final
                    let data2 = new Date(data[i].dataFinal);
                    dia = data2.getDate();
                    mes = data2.getMonth()+1;
                    ano = data2.getFullYear();

                    if (dia.toString().length == 1){
                      dia = "0"+dia;
                    }
                    if (mes.toString().length == 1){
                      mes = "0"+mes;
                    }
                    let dataFinal = dia +'/'+mes+'/'+ano;

                     conteudoHtml+='<tr><td>'+data[i].id+'</td><td><a href="../publicacoes/publicacoes/'+data[i].id+'">'+data[i].titulo+'</a></td><td>'+data[i].visualizacoes+' <a href="../verdetalhespublicacao/'+data[i].id+'/0" title="Ver Clientes"><i class="fa fa-user-o text-info"></i></a></td><td>'+data[i].minha_lista+' <a href="../verdetalhespublicacao/'+data[i].id+'/1" title="Ver Clientes"><i class="fa fa-user-o text-info"></i></a></td><td>'+data[i].compartilhamentos+' <a href="../verdetalhespublicacao/'+data[i].id+'/2" title="Ver Clientes"><i class="fa fa-user-o text-info"></i></a></td><td>'+data[i].compras+' <a href="../verdetalhespublicacao/'+data[i].id+'/3" title="Ver Clientes"><i class="fa fa-user-o text-info"></i></a></td><td>'+data[i].downloads+' <a href="../verdetalhespublicacao/'+data[i].id+'/4" title="Ver Clientes"><i class="fa fa-user-o text-info"></i></a></td><td>'+dataInicial+'</td><td>'+dataFinal+'</td></tr>';
                }
                $("#cabecalhoTabela").replaceWith(conteudoHtml);
            }
        });
    }

    //Click no botao verde de ver publicações ativas/inativas
    $('#preencherTabelaPublicacoes').on('click',function(){
        if ($(this).text() == ' Ver Publicações Inativas') {
            mineracaoPublicacoesInativas();
            $(this).text(' Ver Publicações Ativas');
        }else{
            mineracaoPublicacoesAtivas();
            $(this).text(' Ver Publicações Inativas');
        }
    });

    // Preenchimento da tabela dos dados minerados das Publicações Inativas
    function preencherListagemClassificacoes(){
        $.ajax({
            type: 'GET',
            url: "../classificacaopublicacoes/{{$id_loja}}",
            success: function(data) {

                let conteudoHtml = '<div id="listarClassificacoes" class="col-12" style="margin-bottom: 10px;"><div class="row m-t-10"><div class="col-6"><strong>Título Publicações</strong></div><div class="col-3"><i class="fa fa-thumbs-o-up text-info"></i></div><div class="col-3 "><i class="fa fa-thumbs-o-down text-info"></i></div></div>';

                for (let i = 0; i < data.length; i++) {
                    conteudoHtml+='<div class="row m-t-5"><div class="col-6">'+data[i].titulo+'</div><div class="col-3">'+data[i].likes+'</div><div class="col-3 ">'+data[i].unlikes+'</div></div>';
                }
                $("#listarClassificacoes").replaceWith(conteudoHtml);
            }
        });
    }

    // Preenchimento da tabela dos dados minerados das Publicações Inativas
    function preencherListagemReservas(){
        $.ajax({
            type: 'GET',
            url: "../reservaspublicacoes/{{$id_loja}}",
            success: function(data) {

                let conteudoHtml = '<div id="listarReservas" class="col-12" style="margin-bottom: 10px;"><div class="row m-t-10"><div class="col-8"><strong>Título Publicações</strong></div><div class="col-4 "><strong>Qtde.</strong></div></div>';

                for (let i = 0; i < data.length; i++) {
                    conteudoHtml+='<div class="row m-t-5"><div class="col-8">'+data[i].titulo+'</div><div class="col-4 ">'+data[i].reservas+'</div></div>';
                }
                $("#listarReservas").replaceWith(conteudoHtml);
            }
        });
    }


   


    //Carregando grafico de sexos:
    google.charts.load('current', {'packages':['corechart']});
    
    function carregaSexos(){
        //Grafico de Sexos
        $.ajax({
            type: 'GET',
            url: "../carregasexos",
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


    function carregaGraficoIdade()
    {
        $.ajax({
            type: 'GET',
            url: "../carregagraficoidade",
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
