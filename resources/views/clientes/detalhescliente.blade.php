@extends(('layouts/default'))
{{-- Page title --}}
@section('title')
    Add User
    @parent
@stop
{{-- page level styles --}}
@section('header_styles')
    <!-- plugin styles-->
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/jasny-bootstrap/css/jasny-bootstrap.min.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/bootstrapvalidator/css/bootstrapValidator.min.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/bootstrap-switch/css/bootstrap-switch.min.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/switchery/css/switchery.min.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/radio_css/css/radiobox.min.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/checkbox_css/css/checkbox.min.css')}}" />
    <!--End of Plugin styles-->
    <!--Page level styles-->
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/pages/radio_checkbox.css')}}" />
    <!--end of page level css-->
@stop

{{-- Page content --}}
@section('content')
    <header class="head">
        <div class="main-bar">
            <div class="row no-gutters">
                <div class="col-lg-6">
                    <h4 class="nav_top_align skin_txt">
                        <i class="fa fa-user"></i>
                        Detalhes do Cliente
                    </h4>
                </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb float-right nav_breadcrumb_top_align">
                        <li class="breadcrumb-item">
                            <i class="fa fa-home" data-pack="default" data-tags=""></i>
                            Página Inicial
                        </li>
                        <li class="breadcrumb-item">
                            Clientes Cadastrados
                        </li>
                        <li class="breadcrumb-item active">Informações</li>
                    </ol>
                </div>
            </div>
        </div>
    </header>
<div class="outer">
    <div class="inner bg-container">
        <div class="card">
            <div class="card-body m-t-15">
                @if(Session::has('reset_senha')) <!-- funcao 'old' verifica se existe parametro passado da requisição anterior para a atual -->
                    <div class="card m-t-15 col-lg-3  col-md-8  col-sm-12 alert alert-success alert-dismissable mx-auto">
                        <div class="row">
                            <span class="col-lg-10">Atenção: {{Session::get('reset_senha')}}</span>                                            
                            <button type="button" class="close col-lg-1" data-dismiss="alert" aria-hidden="true">×</button>
                        </div>
                    </div>  
                @endif
                <div>
                    <h4>Informações do Cliente</h4>
                </div>
                @if($cliente->habilitado == 1)
                <form class="form-horizontal login_validator" id="formNovoUsuario" action="{{ URL::to('clientes/bloquearcliente/'.$id_cliente)}}" method="post">
                @else
                <form class="form-horizontal login_validator" id="formNovoUsuario" action="{{ URL::to('clientes/habilitarcliente/'.$id_cliente)}}" method="post">
                @endif
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="_method" value="PUT">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group row m-t-25">
                                <div class="col-lg-3 text-lg-right">
                                    <label class="col-form-label">Foto do Perfil</label>
                                </div>
                                <div class="col-lg-6 text-center text-lg-left">
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-new img-thumbnail text-center">
                                            @if($cliente->foto_perfil != '')
                                                <img src="{{asset('assets/img/clientes/'.$cliente->foto_perfil)}}" alt="not found" class="fileinput fileinput-new" />
                                            @else
                                                <img src="{{asset('assets/img/clientes/foto_perfil.png')}}" class="fileinput fileinput-new" />
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-3 text-lg-right">
                                    <label for="u-name" class="col-form-label">Número *</label>
                                </div>
                                <div class="col-xl-6 col-lg-8">
                                    <div class="input-group">
                                    <span class="input-group-addon"> <i class="fa fa-list text-primary"></i>
                                    </span>
                                        <input type="text" name="id" id="u-name" value="{{$cliente->id}}" class="form-control" disabled="disabled">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-3 text-lg-right">
                                    <label for="u-name" class="col-form-label">Nome / Razão Social *</label>
                                </div>
                                <div class="col-xl-6 col-lg-8">
                                    <div class="input-group">
                                    <span class="input-group-addon"> <i class="fa fa-user text-primary"></i>
                                    </span>
                                        <input type="text" name="nome" id="u-name" value="{{($cliente->nome_razao_social != '' ? $cliente->nome_razao_social : 'Não preenchido')}}" class="form-control" disabled="disabled">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-3 text-lg-right">
                                    <label for="cpf_cnpj" class="col-form-label">CPF / CNPJ *</label>
                                </div>
                                <div class="col-xl-6 col-lg-8">
                                    <div class="input-group">
                                    <span class="input-group-addon"> <i class="fa fa-info text-primary"></i>
                                    </span>
                                        <input type="text" name="cpf_cnpj" id="cpf_cnpj" value="{{($cliente->cpf_cnpj != '' ? $cliente->cpf_cnpj : 'Não preenchido')}}" class="form-control" disabled="disabled">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-3 text-lg-right">
                                    <label for="email" class="col-form-label">E-mail *</label>
                                </div>
                                <div class="col-xl-6 col-lg-8">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-keyboard-o text-primary"></i></span>
                                        <input type="text" placeholder=" " id="email" name="email" value="{{($cliente->email != '' ? $cliente->email : 'Não preenchido')}}" class="form-control" disabled="disabled">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-3 text-lg-right">
                                    <label for="phone" class="col-form-label">Telefone *</label>
                                </div>
                                <div class="col-xl-6 col-lg-8">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-phone text-primary"></i></span>
                                        <input type="text" placeholder=" " id="telefone" name="cell" value="{{($cliente->telefone != '' ? $cliente->telefone : 'Não preenchido')}}" class="form-control" disabled="disabled">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-3 text-lg-right">
                                    <label for="city" class="col-form-label">Device ID *</label>
                                </div>
                                <div class="col-xl-6 col-lg-8">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-mobile text-primary"></i></span>
                                        <input type="text" placeholder=" " name="deviceID" id="city" value="{{($cliente->device_id != '' ? $cliente->device_id : 'Não preenchido')}}" class="form-control" disabled="disabled">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-3 text-lg-right">
                                    <label for="city" class="col-form-label">Mac Address *</label>
                                </div>
                                <div class="col-xl-6 col-lg-8">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-mobile text-primary"></i></span>
                                        <input type="text" placeholder=" " name="deviceID" id="city" value="{{($cliente->mac_address != '' ? $cliente->mac_address : 'Não preenchido')}}" class="form-control" disabled="disabled">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-3 text-lg-right">
                                    <label for="city" class="col-form-label">Sexo *</label>
                                </div>
                                <div class="col-xl-6 col-lg-8">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-info text-primary"></i></span>
                                        <input type="text" placeholder=" " name="sexo" id="city" value="{{($cliente->sexo == 0 ? 'Masculino' : 'Feminino')}}"
                                               class="form-control" disabled="disabled">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-3 text-lg-right">
                                    <label for="dataNasc" class="col-form-label">Data de Nasc. *</label>
                                </div>
                                <div class="col-xl-6 col-lg-8">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-calendar text-primary"></i></span>
                                        <input type="text" placeholder=" " name="dataNasc" id="dataNasc" value="{{($cliente->dataNasc != null ? date( 'd/m/Y' , strtotime($cliente->dataNasc)) : 'Não preenchido')}}"
                                               class="form-control" disabled="disabled">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-3 text-lg-right">
                                    <label for="city" class="col-form-label">Data de Cadastro *</label>
                                </div>
                                <div class="col-xl-6 col-lg-8">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-calendar text-primary"></i></span>
                                        <input type="text" placeholder=" " name="dataCadastro" id="city" value="{{ date( 'd/m/Y  H:i:s' , strtotime($cliente->created_at))}}"
                                               class="form-control" disabled="disabled">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>                
                    <div class="form-group row">
                        <div class="col-lg-3 text-lg-right">
                            <label for="city" class="col-form-label"></label>
                        </div>
                        <div class="col-xl-6 col-lg-8">
                            <div class="input-group">
                                <div class='form-group bg-white' style="text-align: left !important;">
                                    @if(Request::session()->get('permissao',1) == 1)
                                        @if($cliente->habilitado == 1)
                                            <input class="btn btn-success" type="submit" value="Bloquear Cliente" />
                                        @else
                                            <input class="btn btn-success" type="submit" value="Habilitar Cliente" />
                                        @endif
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- /.inner -->
</div>
@stop

{{-- page level scripts --}}
@section('footer_scripts')
    <!-- plugin scripts-->
    <script type="text/javascript" src="{{asset('assets/js/pluginjs/jasny-bootstrap.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/holderjs/js/holder.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/bootstrapvalidator/js/bootstrapValidator.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/vendors/bootstrap-switch/js/bootstrap-switch.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/vendors/switchery/js/switchery.min.js')}}"></script>
<!--End of plugin scripts-->
<!--Page level scripts-->
<script type="text/javascript" src="{{asset('assets/js/pages/radio_checkbox.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/pages/validation.js')}}"></script>
    <!-- end of plugin scripts-->
    <script type="text/javascript">
        $(function(){
            if ($('#desconto').val() != 0) {
                $('#checkDesconto').attr('checked', true);
                    $('#desconto').removeAttr('disabled');
            }
            $('#checkDesconto').change(function(){
                if($(this).is(':checked')){
                    $('#desconto').removeAttr('disabled');
                }else{
                    $('#desconto').attr('disabled', 'disabled');
                    $('#desconto').val(0);
                }
            });
            //formatando o valor ao digitar
            $('#desconto').keyup(function(){
                $('#desconto').val($('#desconto').val().replace(/\D+/g, '')); //removendo tudo que não é numero
            });
            $("#resetarSenha").on("click", function(e) {
                if($(this).hasClass("disabled")) {
                    e.preventDefault();
                    return;
                }           
                $(this).toggleClass("disabled");
            });
            //Espandir/Retrair botoes Doce Novembro
            $("#acaoclientes").on("click", function(e) {
                if($('#botoesclientes').css('display') == 'none'){
                    $('#botoesclientes').css('display','block');
                    $('#iconeclientes').removeClass('fa-plus-square').addClass('fa-minus-square');
                }else{
                    $('#botoesclientes').css('display','none');
                    $('#iconeclientes').removeClass('fa-minus-square').addClass('fa-plus-square');
                }
            });
        });
    </script>
@stop