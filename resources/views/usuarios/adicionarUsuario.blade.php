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
                        {{$titulo}}
                    </h4>
                </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb float-right nav_breadcrumb_top_align">
                        <li class="breadcrumb-item">
                            <i class="fa fa-home" data-pack="default" data-tags=""></i>
                                Página Inicial
                        </li>
                        <li class="breadcrumb-item">
                            Usuários
                        </li>
                        <li class="breadcrumb-item active">{{$titulo}}</li>
                    </ol>
                </div>
            </div>
        </div>
    </header>
<div class="outer">
    <div class="inner bg-container">
        <div class="card">

            <div class="card-body m-t-15">
                <div>
                    <h4>{{$cabecalho}}</h4>
                </div>
                <?php
                //pegando qual será o caminho do metodo post(atualizar ou novo usuario)
                $post = '';
                if(isset($id_user))
                {
                    $post = $acao."/".$id_user;
                }else{
                    $post = $acao; 
                }
                
                ?>
                <form class="form-horizontal login_validator" id="formNovoUsuario" action="{{ URL::to($post) }}" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    @if(isset($id_user))
                    {{ method_field('PUT') }} <!-- se for editar, este campo é obrigatorio pro update-->
                    @endif
                    <div class="row">
                        <div class="col-12">                            
                            <div class="form-group row m-t-25">
                                @if(isset($mensagem)) <!-- funcao 'old' verifica se existe parametro passado da requisição anterior para a atual -->
                                    <div class="alert alert-danger alert-dismissable col-lg-6  col-md-8  col-sm-12 mx-auto">
                                       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                       <strong>Atenção: </strong>{{$mensagem}}
                                    </div>  
                                @endif
                                
                                <div class="col-lg-3 text-center text-lg-right">
                                    <label class="col-form-label">Foto do Perfil</label>
                                </div>
                                <div class="col-lg-6 text-center text-lg-left">
                                    <div class="fileinput fileinput-new" data-provides="fileinput" style="width: 235px;">
                                        <div class="fileinput-new img-thumbnail" style="width: 235px; height: 170px; margin-bottom: 0px;">
                                            @if(isset($usuario->foto))
                                                <img src="{{asset('assets/img/foto_perfil/'.$usuario->foto)}}" alt="not found" class="fileinput" style="width: 225px; height: 160px;" />
                                            @else
                                                <img src="{{asset('assets/img/foto_perfil/foto_perfil.png')}}" class="fileinput" style="width: 225px; height: 160px;" />
                                            @endif
                                        </div>
                                        <div class="fileinput-preview fileinput-exists img-thumbnail" style="width: 235px; height: 170px;"></div>
                                        <div class="m-t-20 text-center">
                                            <span class="btn btn-info btn-file">
                                                <span class="fileinput-new">Selecionar Imagem</span>
                                                <span class="fileinput-exists">Alterar</span>
                                                <input type="file" accept="image/*" name="foto">
                                            </span>
                                            <a href="#" class="btn btn-warning fileinput-exists"
                                               data-dismiss="fileinput">Remover</a>
                                        </div>
                                    </div>
                                </div>                            
                            </div>
                        
                            <div class="form-group row m-t-25">
                                <div class="col-lg-3 text-lg-right">
                                    <label for="nome" class="col-form-label">Nome do usuário *</label>
                                </div>
                                <div class="col-xl-6 col-lg-8">
                                    <div class="input-group">
                                    <span class="input-group-addon"> <i class="fa fa-user text-primary"></i>
                                    </span>
                                        <input type="text" name="nome" id="nome" placeholder="Nome..." value="{{$usuario->nome or old('')}}" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row m-t-25">
                                <div class="col-lg-3 text-lg-right">
                                    <label for="nome" class="col-form-label">Loja *</label>
                                </div>
                                <div class="col-xl-6 col-lg-8">
                                    <div class="input-group">
                                    <span class="input-group-addon"> <i class="fa fa-user text-primary"></i>
                                    </span>
                                        <select class="form-control chzn-select" name="id_loja" id="id_loja" style="z-index: 99;" 
                                        @if(Request::session()->get('permissao') != 0)
                                            disabled="disabled"
                                        @endif >
                                            @foreach($lojas as $l)
                                            <?php $selecionado = ''; ?>
                                                @if(Request::session()->get('permissao') == 0)
                                                    @if(isset($usuario->id) && ($l->id == $usuario->id_loja))
                                                        <?php $selecionado = 'selected'?>                                        
                                                    @endif
                                                @else
                                                    @if($l->id == Request::session()->get('id_loja'))
                                                        <?php $selecionado = 'selected'?>                                        
                                                    @endif
                                                @endif



                                                <option value="{{$l->id}}" id="{{$l->id}}" {{$selecionado}}>{{$l->nome_loja}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-3 text-lg-right">
                                    <label for="email" class="col-form-label">E-mail *</label>
                                </div>
                                <div class="col-xl-6 col-lg-8">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-envelope text-primary"></i></span>
                                        <input type="text" id="email" name="email" placeholder="Email..." value="{{$usuario->email or old('')}}" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-3 text-lg-right">
                                    <label for="senha" class="col-form-label">Senha *</label>
                                </div>
                                <div class="col-xl-6 col-lg-8">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-lock text-primary"></i></span>
                                        <input type="password" name="senha" id="senha" placeholder="Senha..."value="{{$usuario->senha or old('')}}" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-3 text-lg-right">
                                    <label for="confirmarSenha" class="col-form-label">Confirmar Senha *</label>
                                </div>
                                <div class="col-xl-6 col-lg-8">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-lock text-primary"></i></span>
                                        <input type="password" name="confirmarSenha" placeholder="Confirmar Senha..." id="confirmarSenha" value="{{$usuario->senha or old('')}}" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-3 text-lg-right">
                                    <label for="telefone" class="col-form-label">Telefone *</label>
                                </div>
                                <div class="col-xl-6 col-lg-8">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-phone text-primary"></i></span>
                                        <input type="text" id="telefone" name="telefone" placeholder="Telefone..." value="{{$usuario->telefone or old('')}}" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-3 text-lg-right">
                                    <label for="endereco" class="col-form-label">Endereço *</label>
                                </div>
                                <div class="col-xl-6 col-lg-8">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-plus text-primary"></i></span>
                                        <input type="text" id="endereco" name="endereco" value="{{$usuario->endereco or old('')}}"" placeholder="Endereço..." class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-3 text-lg-right">
                                    <label for="cidade" class="col-form-label">Cidade *</label>
                                </div>
                                <div class="col-xl-6 col-lg-8">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-plus text-primary"></i></span>
                                        <input type="text" name="cidade" id="cidade" placeholder="Cidade..." value="{{$usuario->cidade or old('')}}" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-3 text-lg-right">
                                    <label for="cidade" class="col-form-label">Nível de Permissão *</label>
                                </div>
                                <div class="col-xl-6 col-lg-8">
                                    @if(Request::session()->get('permissao') == 0)
                                        <select class="form-control" name="permissao">
                                            <option value="0" 
                                                {{((isset($usuario->permissao) && $usuario->permissao == 0) ? 'selected="selected"' : '')}}
                                                >Administrador</option>
                                            <option value="1" 
                                                {{((isset($usuario->permissao) && $usuario->permissao == 1) ? 'selected="selected"' : '')}}
                                                >Loja</option>
                                            <option value="2" 
                                                {{((isset($usuario->permissao) && $usuario->permissao == 2) ? 'selected="selected"' : '')}}
                                                >Lojista</option>
                                        </select>
                                    @else
                                        @if(Request::session()->get('permissao') == 2)
                                        <select class="form-control" name="permissao" disabled="disabled">
                                            <option value="1" 
                                                {{((isset($usuario->permissao) && $usuario->permissao == 1) ? 'selected="selected"' : '')}}
                                                >Loja</option>
                                            <option value="2" 
                                                {{((isset($usuario->permissao) && $usuario->permissao == 2) ? 'selected="selected"' : '')}}
                                                >Lojista</option>
                                        </select>
                                        @else
                                        <select class="form-control" name="permissao">
                                            <option value="1" 
                                                {{((isset($usuario->permissao) && $usuario->permissao == 1) ? 'selected="selected"' : '')}}
                                                >Loja</option>
                                            <option value="2" 
                                                {{((isset($usuario->permissao) && $usuario->permissao == 2) ? 'selected="selected"' : '')}}
                                                >Lojista</option>
                                        </select>
                                        @endif
                                    @endif
                                    
                                </div>
                            </div>


                            <div class="form-group row">
                                <div class="col-lg-3 text-lg-right">
                                    <label for="cidade" class="col-form-label">Ativo *</label>
                                </div>
                                <div class="col-xl-6 col-lg-8">
                                    <select class="form-control" name="ativo">
                                        <option value="1" 
                                            {{((isset($usuario->ativo) && $usuario->ativo == 1) ? 'selected="selected"' : '')}}
                                            >Sim</option>
                                        <option value="0" 
                                            {{((isset($usuario->ativo) && $usuario->ativo == 0) ? 'selected="selected"' : '')}}
                                            >Não</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-9 ml-auto">
                                    <input class="btn btn-success" type="submit" value="Salvar Informações" />
                                    <input class="btn btn-warning" type="reset" id="clear" value="Limpar">
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
    <script type="text/javascript" src="{{asset('assets/js/pages/validation.js')}}"></script>
    <!-- end of plugin scripts-->
@stop