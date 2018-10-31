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
                        Informações da Loja
                    </h4>
                </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb float-right nav_breadcrumb_top_align">
                        <li class="breadcrumb-item">
                            <i class="fa fa-home" data-pack="default" data-tags=""></i>
                                Página Inicial
                        </li>
                        <li class="breadcrumb-item">
                            Lojas
                        </li>
                        <li class="breadcrumb-item active">Informações da Loja</li>
                    </ol>
                </div>
            </div>
        </div>
    </header>
<div class="outer">
    <div class="inner bg-container">
        <div class="card">

            <div class="card-body m-t-15">
                <?php
                //pegando qual será o caminho do metodo post(atualizar ou novo usuario)
                $post = '';
                $var = rand(0,100); //variavel para evitar cache de imagem e atualiar sem F5
                if(isset($loja->id))
                {
                    $post = "lojas/salvarloja/".$loja->id;
                }else{
                    $post = 'lojas/salvarloja'; 
                }
                
                ?>
                <form class="form-horizontal login_validator" id="formNovaLoja" action="{{ URL::to($post) }}" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
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
                                    <label class="col-form-label">Foto (logo) *</label>
                                </div>
                                <div class="col-lg-6 text-center text-lg-left">
                                    <div class="fileinput fileinput-new" data-provides="fileinput" style="width: 235px;">
                                        <div class="fileinput-new img-thumbnail" style="width: 235px; height: 170px; margin-bottom: 0px;">
                                            @if(isset($loja->foto))
                                                <img src="{{asset('assets/img/lojas/'.$loja->foto)}}" class="fileinput" style="width: 225px; height: 160px;" />
                                            @else
                                                <img src="{{asset('assets/img/lojas/foto_perfil.png')}}" class="fileinput" style="width: 225px; height: 160px;" />
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
                                <div class="col-lg-3 text-center text-lg-right">
                                    <label class="col-form-label">Mapa *</label>
                                </div>
                                <div class="col-lg-6 text-center text-lg-left">
                                    <div class="fileinput fileinput-new" data-provides="fileinput" style="width: 235px;">
                                        <div class="fileinput-new img-thumbnail" style="width: 235px; height: 170px; margin-bottom: 0px;">
                                            @if(isset($loja->mapa))
                                                <img src="{{asset('assets/img/mapas/'.$loja->mapa)}}" alt="not found" class="fileinput" style="width: 225px; height: 160px;" />
                                            @else
                                                <img src="{{asset('assets/img/mapas/foto_perfil.png')}}" class="fileinput" style="width: 225px; height: 160px;" />
                                            @endif
                                        </div>
                                        <div class="fileinput-preview fileinput-exists img-thumbnail" style="width: 235px; height: 170px;"></div>
                                        <div class="m-t-20 text-center">
                                            <span class="btn btn-info btn-file">
                                                <span class="fileinput-new">Selecionar Imagem</span>
                                                <span class="fileinput-exists">Alterar</span>
                                                <input type="file" accept="image/*" name="mapa">
                                            </span>
                                            <a href="#" class="btn btn-warning fileinput-exists" data-dismiss="fileinput">Remover</a>
                                        </div>
                                    </div>
                                </div>                            
                            </div>
                            <div class="form-group row m-t-25">
                                <div class="col-lg-3 text-lg-right">
                                    <label for="nome_loja" class="col-form-label">Nome da Loja *</label>
                                </div>
                                <div class="col-xl-6 col-lg-8">
                                    <div class="input-group">
                                    <span class="input-group-addon"> <i class="fa fa-user text-primary"></i>
                                    </span>
                                        <input type="text" name="nome_loja" id="nome_loja" placeholder="Nome da loja..." value="{{$loja->nome_loja or old('')}}" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row m-t-25">
                                <div class="col-lg-3 text-lg-right">
                                    <label for="site" class="col-form-label">Site *</label>
                                </div>
                                <div class="col-xl-6 col-lg-8">
                                    <div class="input-group">
                                    <span class="input-group-addon"> <i class="fa fa-user text-primary"></i>
                                    </span>
                                        <input type="text" name="site" id="site" placeholder="Site da loja..." value="{{$loja->site or old('')}}" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row m-t-25">
                                <div class="col-lg-3 text-lg-right">
                                    <label for="piso" class="col-form-label">Piso *</label>
                                </div>
                                <div class="col-xl-6 col-lg-8">
                                    <div class="input-group">
                                    <span class="input-group-addon"> <i class="fa fa-user text-primary"></i>
                                    </span>
                                        <input type="text" name="piso" id="piso" value="{{$loja->piso or old('')}}" class="form-control">
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
                                        <input type="text" id="email" name="email" placeholder="Email..." value="{{$loja->email or old('')}}" class="form-control">
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
                                        <input type="text" id="telefone" name="telefone" placeholder="Telefone..." value="{{$loja->telefone or old('')}}" class="form-control">
                                    </div>
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