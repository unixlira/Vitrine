<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="UTF-8">
    <title>
        Morumbi Shopping
    </title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{asset('assets/img/logo1.ico')}}"/>
    <!-- global styles-->
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/components.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/custom.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/chat.css')}}"/>
    <!-- <link type="text/css" rel="stylesheet" href="#" id="skin_change"/> -->    
    <!-- end of global styles-->
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/c3/css/c3.min.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/toastr/css/toastr.min.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/switchery/css/switchery.min.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/pages/new_dashboard.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/style.css')}}"/>
    <link href="{{asset('assets/css/pages/flot_charts.css')}}" rel="stylesheet" type="text/css">
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/select2/css/select2.min.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/datatables/css/scroller.bootstrap.min.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/datatables/css/colReorder.bootstrap.min.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/datatables/css/dataTables.bootstrap.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/responsive.dataTables.css')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/pages/dataTables.bootstrap.css')}}" />
    <!--End of plugin styles-->
    <!--Page level styles-->
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/pages/tables.css')}}"/>
    @yield('header_styles')
</head>

<body>
<div class="preloader" style=" position: fixed;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  z-index: 100000;
  backface-visibility: hidden;
  background: #ffffff;">
    <div class="preloader_img" style="width: 200px;
  height: 200px;
  position: absolute;
  left: 48%;
  top: 48%;
  background-position: center;
z-index: 999999">
        <img src="{{asset('assets/img/loader.gif')}}" style=" width: 40px;" alt="loading...">
    </div>
</div>
<div class="bg-dark" id="wrap">
    <div id="top">
        <!-- .navbar -->
        <nav class="navbar navbar-static-top">
            <div class="container-fluid m-0">
                <a class="navbar-brand" href="{{ URL::to('index1') }}">
                    <h4><img src="{{asset('assets/img/logo_vitrine.png')}}" class="admin_img" alt="Nagumo Play"></h4>
                </a>
                <div class="menu mr-sm-auto">
                    <span class="toggle-left" id="menu-toggle">
                        <i class="fa fa-bars"></i>
                    </span>
                </div>
                <div class="topnav dropdown-menu-right">
                    <div class="btn-group">
                    </div>
                    
                    <div class="btn-group">
                        <div class="user-settings no-bg">
                            <button type="button" class="btn btn-default no-bg micheal_btn" data-toggle="dropdown">
                                <img src="{{asset('assets/img/foto_perfil/'.Request::session()->get('foto'))}}" class="admin_img2 img-thumbnail rounded-circle avatar-img"
                                     alt="avatar"> Usuário conectado: {{Request::session()->get('nome')}}
                                <span class="fa fa-sort-down white_bg"></span>
                            </button>
                            <div class="dropdown-menu admire_admin">
                                <a class="dropdown-item" href="{{ URL::to('usuarios/perfilusuario/'.Request::session()->get('id_usuario')) }}"><i class="fa fa-cogs"></i>
                                    Informações</a>
                                <a class="dropdown-item" href="{{ URL::to('login/lockscreen') }}"><i class="fa fa-lock"></i>
                                    Bloquear sessão</a>
                                <a class="dropdown-item" href="{{ URL::to('login/logoff') }}"><i class="fa fa-sign-out"></i>
                                    Finalizar Sessão</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- /.container-fluid -->
        </nav>
        <!-- /.navbar -->
        <!-- /.head -->
    </div>
          
    <!-- /#top -->
    <div class="wrapper">
        <div id="left">
            <div class="menu_scroll">
                <div class="left_media">
                    <div class="media user-media">
                        <div class="user-media-toggleHover">
                            <span class="fa fa-user"></span>
                        </div>
                        <div class="user-wrapper">
                            <a class="user-link" href="{{ URL::to('usuarios/perfilusuario/'.Request::session()->get('id_usuario')) }}">
                                <img class="media-object img-thumbnail user-img rounded-circle admin_img3" alt="User Picture"
                                     src="{{asset('assets/img/foto_perfil/'.Request::session()->get('foto'))}}">
                                <p class="user-info menu_hide">Bem-vindo(a) {{mb_strimwidth(Request::session()->get('nome'), 0, 15, '...')}}</p>
                            </a>
                        </div>
                    </div>
                    <hr/>
                </div>
                    <?php
                        $url = explode('/', (Request::url())); //pegando a url pra verificar quando é acessado o menu detalhesparticipante
                        $link = '';
                        
                        if (count($url) > 5) { //verificando se existe a 4ª posicao
                            $link = $url[5];
                        }
                        /*
                        if (count($url) > 4) { //verificando se existe a 4ª posicao
                            $link = $url[4];
                        }
                        */
                        
                    ?>
                <ul id="menu">
                        <li {!! (Request::is('index1') || Request::is('/') || Request::is('indexloja') || Request::is('acoesrecentes') ||(is_numeric ($link)) ? 'class="active"':"") !!}>
                        <a href="{{ URL::to('index1') }} ">
                            <i class="fa fa-home"></i>
                            <span class="link-title menu_hide">&nbsp;&nbsp;Início</span>
                        </a>
                        </li>

                    @if(Request::session()->get('permissao') == 0)
                        <li class="dropdown_menu {!! (Request::is('lojas/listarlojas')|| Request::is('lojas/novaloja')|| Request::is('lojas/lojasremovidas')||($link == 'verloja') ? 'active' : '') !!}">
                            <a href="javascript:;">
                                <i class="fa fa-building"></i>
                                <span class="link-title menu_hide">&nbsp; Lojas</span>
                                <span class="fa arrow menu_hide"></span>
                            </a>
                            <ul class="collapse">
                                <li {!! (Request::is('lojas/novaloja') ? 'class="active"' : '') !!}>
                                    <a href="{{ URL::to('lojas/novaloja') }}">
                                        <i class="fa fa-angle-right"></i>
                                        <span class="link-title">&nbsp;Adicionar Loja</span>
                                    </a>
                                </li>
                                <li {!! (Request::is('lojas/listarlojas')||($link == 'verloja') ? 'class="active"' : '') !!}>
                                    <a href="{{ URL::to('lojas/listarlojas') }}">
                                        <i class="fa fa-angle-right"></i>
                                        &nbsp; Lista de Lojas
                                    </a>
                                </li>
                                <li {!! (Request::is('lojas/lojasremovidas') ? 'class="active"' : '') !!}>
                                    <a href="{{ URL::to('lojas/lojasremovidas') }}">
                                        <i class="fa fa-angle-right"></i>
                                        &nbsp; Lojas Removidas
                                    </a>
                                </li>
                            </ul>
                        </li>                    
                    @endif



                    <li class="dropdown_menu {!! (Request::is('usuarios/listarusuarios')|| Request::is('usuarios/novousuario')|| Request::is('usuarios/usuariosremovidos')|| ($link == 'perfilusuario')||($link == 'editarusuario') ? 'active' : '') !!}">
                        <a href="javascript:;">
                            <i class="fa fa-users"></i>
                            <span class="link-title menu_hide">&nbsp; Usuários</span>
                            <span class="fa arrow menu_hide"></span>
                        </a>
                        <ul class="collapse">
                            @if(Request::session()->get('permissao') != 2)
                                <li {!! (Request::is('usuarios/novousuario') ? 'class="active"' : '') !!}>
                                <a href="{{ URL::to('usuarios/novousuario') }}">
                                    <i class="fa fa-angle-right"></i>
                                    <span class="link-title">&nbsp;Adicionar Usuário</span>
                                </a>
                                </li>
                            @endif
                            <li {!! (Request::is('usuarios/listarusuarios') ? 'class="active"' : '') !!}>
                                <a href="{{ URL::to('usuarios/listarusuarios') }}">
                                    <i class="fa fa-angle-right"></i>
                                    &nbsp; Lista de Usuários
                                </a>
                            </li>
                            <li {!! (($link == 'perfilusuario')|| ($link == 'editarusuario') ? 'class="active"' : '') !!}>
                            <a href="{{ URL::to('usuarios/perfilusuario/'.Request::session()->get('id_usuario')) }}">
                                <i class="fa fa-angle-right"></i>
                                &nbsp; Perfil do Usuário
                            </a>
                            </li>
                            @if(Request::session()->get('permissao') != 2)
                                <li {!! (Request::is('usuarios/usuariosremovidos') ? 'class="active"' : '') !!}>
                                <a href="{{ URL::to('usuarios/usuariosremovidos') }}">
                                    <i class="fa fa-angle-right"></i>
                                    &nbsp; Usuários Removidos
                                </a>
                                </li>
                            @endif
                        </ul>
                    </li>
                    <li {!! (($link == 'clientescadastrados') || ($link == 'detalhescliente') || ($link == 'clientesbloqueados')  ? 'class="active"':"") !!}>
                        <a href="{{URL::to('clientes/clientescadastrados')}} ">
                            <i class="fa  fa-user"></i>
                            <span class="link-title menu_hide">&nbsp; Clientes Cadastrados</span>
                        </a>
                    </li>

                    <li {!! (($link == 'publicacoesativas') || ($link == 'publicacoesinativas') || ($link == 'novapublicacao') || ($link == 'ofertaparticipantes') || ($link == 'clientesdapublicacao') || ($link == 'ordenacaoof')||($link == 'publicacoesfuturas') || ($link == 'publicacoes') ? 'class="dropdown_menu active"':"dropdown_menu") !!}>
                        <a href="javascript:;">
                            <i class="fa fa-plus-square"></i>
                            <span class="link-title menu_hide">&nbsp; Publicações</span>
                            <span class="fa arrow menu_hide"></span>
                        </a>
                        <ul class="collapse">
                            @if(Request::session()->get('permissao') != 2)
                                <li {!! ($link == 'novapublicacao' ? 'class="active"':"") !!}>
                                    <a href="{{ URL::to('publicacoes/novapublicacao') }} ">
                                        <i class="fa fa-angle-right"></i>
                                        &nbsp; Nova Publicação
                                    </a>
                                </li>
                            @endif
                            <li {!! (($link == 'publicacoesinativas') ||($link == 'publicacoesativas') ||($link == 'publicacoesfuturas') || ($link == 'ofertaparticipantes') || ($link == 'clientesdapublicacao') || ($link == 'publicacoes') ? 'class="active"':"") !!}>
                                <a href="{{ URL::to('publicacoes/publicacoesativas') }} ">
                                    <i class="fa fa-angle-right"></i>
                                    &nbsp; Listar Publicações
                                </a>
                            </li>
                            @if(Request::session()->get('permissao') != 2)
                                <li {!! (($link == 'ordenacaoof') ? 'class="active"':"") !!}>
                                    <a href="{{ URL::to('publicacoes/ordenacaoof') }} ">
                                        <i class="fa fa-angle-right"></i>
                                        &nbsp; Ordenar Publicações
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </li>


                    @if(Request::session()->get('permissao') == 0)
                        <li {!! (($link == 'novodestaque') || ($link == 'listardestaques') || ($link == 'destaques') || ($link == 'novaimgdestaque')||($link == 'detalhesimagemdestaque') || ($link == 'listarimagensdestaque') || ($link == 'editarimagensdestaque')|| ($link == 'verimgdestaque')|| ($link == 'listarimagensdestaque') ? 'class="dropdown_menu active"':"dropdown_menu") !!}>
                            <a href="javascript:;">
                                <i class="fa fa-star-o"></i>
                                <span class="link-title menu_hide">&nbsp; Destaques</span>
                                <span class="fa arrow menu_hide"></span>
                            </a>
                            <ul class="collapse">
                                <li {!! (($link == 'novodestaque') || ($link == 'destaques') ? 'class="active"':"") !!}>
                                    <a href="{{ URL::to('destaques/novodestaque') }} ">
                                        <i class="fa fa-angle-right"></i>
                                        &nbsp; Novo Destaque
                                    </a>
                                </li>
                                <li {!! (($link == 'listardestaques') || ($link == 'novaimgdestaque')|| ($link == 'verimgdestaque')|| ($link == 'listarimagensdestaque') ? 'class="active"':"") !!}>
                                    <a href="{{ URL::to('destaques/listardestaques') }} ">
                                        <i class="fa fa-angle-right"></i>
                                        &nbsp; Listar Destaques
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endif
                    @if(Request::session()->get('permissao') != 2)
                        <li {!! (($link == 'notificacoesapp') ? 'class="active"':"") !!}>
                            <a href="{{ URL::to('notificacoesapp/notificacoesapp') }} ">
                                <i class="fa fa-bell"></i>
                                <span class="link-title menu_hide">Push Notification</span>
                            </a>
                        </li>
                    @endif

                    {{-- Inserido por José- 24/10 --}}
                    @if(Request::session()->get('permissao') == 0)
                        <li {!! (($link == 'planos') || ($link == 'financeiro') || ($link == 'pagamentos')  ? 'class="dropdown_menu active"':"dropdown_menu") !!}>
                            <a href="javascript:;">
                                <i class="fa fa-usd"></i>
                                <span class="link-title menu_hide">&nbsp; Pagamentos</span>
                                <span class="fa arrow menu_hide"></span>
                            </a>
                            <ul class="collapse">
                                <li {!! (($link == 'planos') || ($link == 'pagamentos') ? 'class="active"':"") !!}>
                                    <a href="{{ URL::to('pagamentos/planos') }} ">
                                        <i class="fa fa-angle-right"></i>
                                        &nbsp; Planos
                                    </a>
                                </li>
                                <li {!! (($link == 'planos') || ($link == 'financeiro') || ($link == 'pagamentos') ? 'class="active"':"") !!}>
                                    <a href="{{ URL::to('/pagamentos/financeiro/')}}">
                                        <i class="fa fa-angle-right"></i>
                                        &nbsp; Financeiro
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
                <!-- /#menu -->
            </div>
            <!-- /.container-fluid -->
            <footer class="footer navbar-fixed-bottom">
                <!--
                    <div class="chat_box" style="position: absolute;">
                        <div class="chat_head">Chat</div>
                        <div class="chat_body card" id="contatos" style="overflow: auto; display: none;"> 
                        </div>
                    </div>

                    <div class="msg_box" style="right:260px; position: absolute;">
                        <div class="msg_head"><span id="user_name">Teste</span>
                            <div class="close">x</div>
                        </div>
                        <div class="msg_wrap card">
                            <div class="msg_body" id="mensagens">
                            </div>
                            <div class="msg_footer"><textarea class="msg_input" rows="4"></textarea></div>
                        </div>
                    </div>
                -->
                <div class="container-fluid m-0">
                    <div class="textoFooter col-12">Desenvolvido por Magic TV &reg; 2018. Todos os Direitos Reservados.</div>    
                </div>
            </footer>
        </div>
        <!-- /#left -->
        <div id="content" class="bg-container">
            <!-- Content -->
        @yield('content')
        <!-- Content end -->
        </div>

</div>

<!-- /#wrap -->
<!-- global scripts-->
<script type="text/javascript" src="{{asset('assets/js/components.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/custom.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/vendors/select2/js/select2.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/vendors/datatables/js/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/pluginjs/dataTables.tableTools.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/vendors/datatables/js/dataTables.colReorder.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/vendors/datatables/js/dataTables.bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/vendors/datatables/js/dataTables.buttons.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/vendors/datatables/js/dataTables.responsive.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/vendors/datatables/js/dataTables.rowReorder.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/vendors/datatables/js/buttons.colVis.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/vendors/datatables/js/buttons.html5.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/vendors/datatables/js/buttons.bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/vendors/datatables/js/buttons.print.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/vendors/datatables/js/dataTables.scroller.min.js')}}"></script>



<!--End of plugin scripts-->
<!--Page level scripts-->
<script type="text/javascript" src="{{asset('assets/js/pages/users.js')}}"></script>
<!-- end page level scripts -->
<script type="text/javascript">
    /*
    $(document).ready(function(){
        $('.msg_box').hide();
        $('#contatos').html('<div id="carregando" style=\'background: url("{{asset("assets/img/loader.gif")}}") no-repeat center; height: 100px; \'></div>');
        setInterval('verificaMensagens()', 2000); //verifica se tem novas mensagens na conversa atual a cada 2 segundos
        setInterval('carregaContatos()', 2000); //atualiza a listagem de contatos a cada 2 segundos
    });

    function verificaMensagens(){
        if ($('.msg_box').css('display') != 'none') { //se o chat ta aberto, verifica:
            carregaMensagens('{{Request::session()->get("id_usuario")}}',$('.id_destinatario')[0].id);
            visualizarMensagem('{{Request::session()->get("id_usuario")}}',$('.id_destinatario')[0].id);
        }
    }

    $('.chat_head').click(function(){
        $('.chat_body').slideToggle('slow');
    });
    $('.msg_head').click(function(){
        $('.msg_wrap').slideToggle('slow');
    });
    
    $('.close').click(function(){
        $('.msg_box').hide();
    });
    
    $(document).on('click', '.user', function(){ //Pegando elementos criados dinamicamente direto da DOM
        //console.info(this.id);
        $('#mensagens').html('<div id="carregando" style=\'background: url("{{asset("assets/img/loader.gif")}}") no-repeat center; height: 100px; \'></div>');
        $('#user_name').html($(this).text()+'<span class="id_destinatario" id="'+this.id+'"</span>');
        $('.msg_wrap').show();
        $('.msg_box').show();
        carregaMensagens('{{Request::session()->get("id_usuario")}}',this.id);
    });
    
    $('textarea').keypress(
        function(e){
            if (e.keyCode == 13) {
                e.preventDefault();
                var msg = $(this).val();
                $(this).val('');
                if(msg!=''){
                    $('<div class="msg_b">'+msg+'</div>').insertBefore('.msg_push');
                    enviaMensagem('{{Request::session()->get("id_usuario")}}', $('.id_destinatario')[0].id, msg);
                }
            }
        }
    );

    function enviaMensagem(id_usuario, id_destinatario, mensagem){
        $.post("/nagumoplay/site/chat/enviamensagem", {id_usuario:id_usuario, id_destinatario:id_destinatario, mensagem:mensagem, "_token": "{{ csrf_token() }}"}, function(result){
        //$.post("/chat/enviamensagem", {id_usuario:id_usuario, id_destinatario:id_destinatario, mensagem:mensagem, "_token": "{{ csrf_token() }}"}, function(result){
            $('.msg_body').scrollTop($('.msg_body')[0].scrollHeight); //rola a conversa para baixo
        });
    }
    
    function carregaContatos(){
        $.ajax({
            type: 'GET',
            url: "/nagumoplay/site/chat/carregacontatos",
            //url: "/chat/carregacontatos",
            success: function(data) {
                let contatos = '';
                //montando o layout
                let classe = 'mensagemPendente';
                let remetente = new Array();
                for (var i = 0; i <= data.length - 1; i++) {
                    if (data[i].id_usuario != null) {
                        remetente.push(data[i].id_usuario);
                    }
                    if (data[i].id != '{{Request::session()->get("id_usuario")}}') {
                        if (data[i].status_chat == 1) {
                            if (jQuery.inArray( data[i].id, remetente ) != -1) { //existe o ID no array
                                contatos += '<div class="'+classe+' user" id="'+data[i].id+'"> '+data[i].nome+'</div>';
                            }else{
                                contatos += '<div class="user" id="'+data[i].id+'"> '+data[i].nome+'</div>';
                            }
                        }else{
                            if (jQuery.inArray( data[i].id, remetente ) != -1) { //existe o ID no array
                                contatos += '<div class="'+classe+' user offline" id="'+data[i].id+'"> '+data[i].nome+'</div>';
                            }else{
                                contatos += '<div class="user offline" id="'+data[i].id+'"> '+data[i].nome+'</div>';
                            }
                        }
                    }
                }
                $('#contatos').html(contatos);
            }
        });
    }

    function carregaMensagens(id, destinatario){
        $.ajax({
            type: 'GET',
            url: "/nagumoplay/site/chat/carregamensagens/"+id+"/"+destinatario+"",
            //url: "/chat/carregamensagens/"+id+"/"+destinatario+"",
            success: function(data) {
                //montando o layout
                let mensagens = '';
                for (var i = 0; i <= data.length - 1; i++) {
                    //identificando de quem sao as mensagens
                    if (data[i].id_usuario != '{{Request::session()->get("id_usuario")}}') {
                        mensagens += '<div class="msg_a">'+data[i].mensagem+'</div>';
                    }else{
                        mensagens += '<div class="msg_b">'+data[i].mensagem+'</div>';
                    }
                }
                mensagens += '<div class="msg_push"></div>';
                $('#mensagens').html(mensagens);
                $('.msg_body').scrollTop($('.msg_body')[0].scrollHeight);
            }
        });
    }

    function visualizarMensagem(id, destinatario){
        $.ajax({
            type: 'GET',
            url: "/nagumoplay/site/chat/visualizarmensagem/"+id+"/"+destinatario+"",
            //url: "/chat/visualizarmensagem/"+id+"/"+destinatario+"",
            success: function(data) {
                //nadinha
            }
        });
    }
    */
//PAGAMENTOS CHECKBOX
    $(document).ready(function(){
        $('#checknewemail').click(function(){
            $('#inputEmail').toggle();
        });
    });

    function clickCartao(){
        var c = document.getElementById("myCartao");
        if (c.style.display === "none") {
            c.style.display = "block";
        } else {
            c.style.display = "none";
        }
    }

    function clickBoleto(){
        var b = document.getElementById("myBoleto");
        if (b.style.display === "none") {
            b.style.display = "block";
        } else {
            b.style.display = "none";
        }
    }
    
    function showCard() {
        var checkBox = document.getElementById("myCard");
        var text = document.getElementById("text");
        if (checkBox.checked == true){
            text.style.display = "block";
        } else {
            text.style.display = "none";
        }
    }

    function showBol() {
        var checkBox = document.getElementById("myBol");
        var text = document.getElementById("textbol");
        if (checkBox.checked == true){
            text.style.display = "block";
        } else {
            text.style.display = "none";
        }
    }  

    $(document).ready(function(){
        $('#myCard').click(function(){
            $('#clear').toggle();
        });
    });
    
    $(document).ready(function(){
        $('#myBol').click(function(){
            $('#clear').toggle();
        });
    });
    
    $(document).ready(function(){
        $('#checknewemail').click(function(){
            $('#oldemail').toggle();
        });
    });

    $(document).ready(function(){
        $('#checkemailcad').click(function(){
            $('#newemail').toggle();
        });
    });

    $(document).ready(function(){
        $('#ativarcupom').click(function(){
            $('#cupom').toggle();
        });
    });
//FINANCEIRO 
      

//Modal 
        $(function(){
            
            $('#modalRenovacaoAtivar').on('show.bs.modal', function(){
                var myModal = $(this);
                clearTimeout(myModal.data('hideInterval'));
                myModal.data('hideInterval', setTimeout(function(){
                    myModal.modal('hide');
                }, 3000));
            });
        });

        $(function(){
            $('#modalRenovacaoCancel').on('show.bs.modal', function(){
                var myModal = $(this);
                clearTimeout(myModal.data('hideInterval'));
                myModal.data('hideInterval', setTimeout(function(){
                    myModal.modal('hide');
                }, 3000));
            });
        }); 
   

</script>
<!-- end of global scripts-->
<!-- page level js -->
@yield('footer_scripts')
<!-- end page level js -->
</body>
</html>