@extends(('layouts/default'))
{{-- Page title --}}
@section('title')
    Form Editors
    @parent
@stop
{{-- page level styles --}}
@section('header_styles')
    <!-- global styles-->
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/jasny-bootstrap/css/jasny-bootstrap.min.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/bootstrapvalidator/css/bootstrapValidator.min.css')}}"/>
@stop
@section('content')
    <header class="head">
        <?php
            if(isset($imgdestaque->id))
            {
                $nome_pagina = 'Atualizar Imagem do Destaque';
                //Se é atualizar
                $post = "destaques/atualizarimgdestaque/".$imgdestaque->id;
            }else{
                //Se é novo registro
                $nome_pagina = 'Nova Imagem do Destaque';
                $post = 'destaques/salvarimgdestaque/'.$id_destaque; 
            }
        ?>
        <div class="main-bar">
            <div class="row no-gutters">
                <div class="col-lg-6 col-md-4 col-sm-4">
                    <h4 class="nav_top_align">
                        <i class="fa fa-pencil" aria-hidden="true"></i>
                        {{$nome_pagina}}: {{$titulo_destaque}}
                    </h4>
                </div>
                <div class="col-lg-6 col-md-8 col-sm-8">
                    <ol class="breadcrumb float-right nav_breadcrumb_top_align">
                        <li class="breadcrumb-item">
                            <i class="fa fa-home" aria-hidden="true"></i>
                            Página Inicial                            
                        </li>
                        <li class="breadcrumb-item">
                            Destaques
                        </li>
                        <li class="breadcrumb-item">
                            Imagens
                        </li>
                        <li class="breadcrumb-item active">{{$nome_pagina}}</li>
                    </ol>
                </div>
            </div>
        </div>
    </header>
<div class="outer">
    <div class="inner bg-container">
        <div class="card">
            <div class="card-body m-t-15">
                <form class="form-horizontal login_validator" id="formNovoUsuario" action="{{ URL::to($post) }}" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    @if(isset($imgdestaque->id))
                        <input type="hidden" name="id_destaque" value="{{$imgdestaque->id_destaque}}">
                    @endif
                    <div class="row">
                        <div class="col-12">                    
                            <div class="form-group row m-t-25">
                               <div class="col-lg-3 text-center text-lg-right">
                                    <label class="col-form-label">Imagem *</label>
                                </div>
                                <div class="col-lg-6 text-center text-lg-left">
                                    <div class="fileinput fileinput-new" data-provides="fileinput" style="width: 235px;">
                                        <div class="fileinput-new img-thumbnail" style="width: 235px; height: 170px; margin-bottom: 0px;">
                                            @if(isset($imgdestaque->imagem))
                                                <img src="{{asset('assets/img/imgdestaques/'.$imgdestaque->imagem)}}" class="fileinput" style="width: 225px; height: 160px;" />
                                            @else
                                                <img src="{{asset('assets/img/imgdestaques/foto_perfil.png')}}" class="fileinput" style="width: 225px; height: 160px;" />
                                            @endif
                                        </div>
                                        <div class="fileinput-preview fileinput-exists img-thumbnail" style="width: 235px; height: 170px;"></div>
                                        <div class="m-t-20 text-center">
                                            <span class="btn btn-info btn-file">
                                                <span class="fileinput-new">Selecionar Imagem</span>
                                                <span class="fileinput-exists">Alterar</span>
                                                <input type="file" accept="image/*" name="imagem">
                                            </span>
                                            <a href="#" class="btn btn-warning fileinput-exists" data-dismiss="fileinput">Remover</a>
                                        </div>
                                    </div>
                                </div>                            
                            </div>
                        
                            <div class="form-group row m-t-25">
                                <div class="col-lg-3 text-lg-right">
                                    <label for="nome" class="col-form-label">Texto *</label>
                                </div>
                                <div class="col-xl-6 col-lg-8">
                                    <div class="input-group">
                                        <textarea class="form-control textarea" rows="4" name="texto" placeholder="Digite o texto aqui...">{{$imgdestaque->texto or old('')}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-9 ml-auto">
                                    <span class="btn btn-primary" id="voltar">Voltar</span>
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
</div>
    <!-- /.outer -->
@stop
@section('footer_scripts')
    <!--Plugin scripts-->    
    <script type="text/javascript" src="{{asset('assets/js/pluginjs/jasny-bootstrap.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/holderjs/js/holder.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/bootstrapvalidator/js/bootstrapValidator.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/pages/validation.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
           $('#voltar').click(function() {
               history.back();
           });
        })
    </script>
@stop