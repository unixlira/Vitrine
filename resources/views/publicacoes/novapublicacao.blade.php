@extends(('layouts/default'))
{{-- Page title --}}
@section('title')
    Form Editors
    @parent
@stop
{{-- page level styles --}}
@section('header_styles')
    <!-- global styles-->
    <link type="text/css" rel="stylesheet" media="screen" href="{{asset('assets/vendors/bootstrap3-wysihtml5-bower/css/bootstrap3-wysihtml5.min.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/summernote/css/summernote.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/jasny-bootstrap/css/jasny-bootstrap.min.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/bootstrapvalidator/css/bootstrapValidator.min.css')}}"/>
    <link href="{{asset('assets/css/bootstrap-datetimepicker.min.css')}}" rel="stylesheet" media="screen">
    <!-- end of global styles-->
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/pages/form_elements.css')}}"/>

    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/fileinput/css/fileinput.min.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/blueimp-gallery-with-desc/css/blueimp-gallery.min.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/blueimp_file_upload/css/jquery.fileupload.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/blueimp_file_upload/css/jquery.fileupload-ui.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/blueimp-gallery-with-desc/css/blueimp-gallery.min.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/dropify/css/dropify.css')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/dropzone/css/dropzone.min.css')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/pages/file_upload.css')}}">


    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/fancybox/css/jquery.fancybox.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/fancybox/css/jquery.fancybox-buttons.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/fancybox/css/jquery.fancybox-thumbs.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/imagehover/css/imagehover.min.css')}}" />
    <!--End of plugin-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/pages/gallery.css')}}" />


@stop
@section('content')
    <header class="head">
        <?php
            //pegando qual será o caminho do metodo post(atualizar ou novo usuario)
            $post = '';
            $dataInicial = '';
            $dataFinal = '';
            $var = rand(0,100); //variavel para evitar cache de imagem e atualiar sem F5
            if(isset($publicacao->id))
            {
                $post = "publicacoes/salvarpublicacao/".$publicacao->id;
                $dataInicial = implode("/",array_reverse(explode("-",explode(' ', $publicacao->dataInicial)[0])));
                $dataFinal = implode("/",array_reverse(explode("-",explode(' ', $publicacao->dataFinal)[0])));
            }else{
                $post = 'publicacoes/salvarpublicacao'; 
            }
        ?>
        <div class="main-bar">
            <div class="row no-gutters">
                <div class="col-lg-6 col-md-4 col-sm-4">
                    <h4 class="nav_top_align">
                        <i class="fa fa-pencil" aria-hidden="true"></i>
                        Nova Publicação
                    </h4>
                </div>
                <div class="col-lg-6 col-md-8 col-sm-8">
                    <ol class="breadcrumb float-right nav_breadcrumb_top_align">
                        <li class="breadcrumb-item">
                            <i class="fa fa-home" aria-hidden="true"></i>
                            Página Inicial                            
                        </li>
                        <li class="breadcrumb-item">
                            Publicações
                        </li>
                        <li class="breadcrumb-item active">Nova Publicação</li>
                    </ol>
                </div>
            </div>
        </div>
    </header>
<div class="outer">
    <div class="inner bg-container">
        <form action="{{ URL::to($post) }}" method="post" id="formNovaPublicacao" class="row summer_note_display summer_note_btn" enctype="multipart/form-data">
                <div class="col-lg-4 text-center">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="col-lg-12">
                        <div class="fileinput fileinput-new " data-provides="fileinput" style="width: 235px;">
                            
                            <div class="fileinput-new img-thumbnail" style="width: 235px; height: 185px; margin-bottom: 0px;">
                                <div class="card" style="padding: 3px 0px 0px 0px; border-bottom-width: medium;"><h4>{{(isset($nome_loja[0]->nome_loja) ? $nome_loja[0]->nome_loja : Request::session()->get('nome_loja'))}}</h4></div>
                                <div class="row col-xs-offset-2 m-t-5">
                                    <div class="col-8">
                                        @if(isset($publicacao->imagem1))
                                            <a class="fancybox-buttons" data-fancybox-group="button" href="{{asset('assets/img/publicacoes/'.$publicacao->imagem1)}}">
                                                <img src="{{asset('assets/img/publicacoes/'.$publicacao->imagem1.'?var='.$var)}}" class="fileinput" style="width: 150px; height: 140px;" id="img1" />
                                            </a>
                                        @else
                                            <img src="{{asset('assets/img/publicacoes/foto_perfil.png')}}" class="fileinput " style="width: 150px; height: 140px;"  id="img1"/>
                                        @endif
                                    </div>
                                    <div class="col-4" style="margin-left: -33px;">
                                        <div class="col-6">
                                            @if(isset($publicacao->imagem2))
                                                <a class="fancybox-buttons" data-fancybox-group="button" href="{{asset('assets/img/publicacoes/'.$publicacao->imagem2)}}">
                                                    <img src="{{asset('assets/img/publicacoes/'.$publicacao->imagem2.'?var='.$var)}}" class="fileinput " style="width: 73px; height: 66px;"  id="img2"/>
                                                </a>
                                            @else
                                                <img src="{{asset('assets/img/publicacoes/foto_perfil.png')}}" class="fileinput " style="width: 73px; height: 66px;"  id="img2"/>
                                            @endif  
                                        </div>
                                        <div class="col-6">
                                            @if(isset($publicacao->imagem3))
                                                <a class="fancybox-buttons" data-fancybox-group="button" href="{{asset('assets/img/publicacoes/'.$publicacao->imagem3)}}">
                                                    <img src="{{asset('assets/img/publicacoes/'.$publicacao->imagem3.'?var='.$var)}}" class="fileinput " style="width: 73px; height: 65px;"  id="img3" />
                                                </a>
                                            @else
                                                <img src="{{asset('assets/img/publicacoes/foto_perfil.png')}}" class="fileinput " style="width: 73px; height: 65px;"  id="img3"/>
                                            @endif
                                        </div>
                                    </div>
                                </div>



                            </div>
                            <div class="card">
                                <div style="background-color: #333333; margin-left: 4px; margin-right: 4px; margin-bottom: 4px;">
                                    <div style="margin-left: 5px; margin-right: 5px; margin-bottom: 10px;">
                                        <div id="mostraTitulo" class="m-t-5 text-left" style="color: #00d976; font-size: 1.20rem;">Título da publicação...</div>
                                        <div class="text-left m-t-5" style="color: #00d976; font-size: 0.9rem;">Descrição</div>
                                        <div id="mostraDescricao" class="text-left m-t-5" style="color: #fff">Conteúdo da publicação...</div>
                                        <div id="mostraReferencias" class="text-left m-t-5" style="color: #9b9593">Referências: ...</div>
                                        <div class="row m-t-15">
                                            <div class="col-4" style="margin-left: 7px; font-size: 0.9rem;">
                                                <div class="text-left" style="color: #00d976; margin-left: -7px;">Valor (R$)</div>
                                                <div id="mostraValor" class="text-left" style="color: #fff; margin-left: -7px;">15.000,00</div>
                                            </div>
                                            <div class="col-8" style="margin-left: -7px;">
                                                <span class="btn btn-sm btn-outline-secondary">Reservar</span>
                                                <span class="btn btn-sm btn-outline-success">Comprar</span>
                                            </div>
                                            <div id="cupom" style="display: none;">
                                                <div class="col-12 text-left m-t-15 p-b-5 " style="color: #00d976; font-size: 0.9rem;">
                                                    Cupom de Desconto
                                                </div>
                                                <div class="col text-left " style="width: 100%; height: 110px; background-color: #00bf86; margin-left: 17px; margin-bottom: 1px; font-size: 10px; color: white; margin-top: 10px;">
                                                    <label class="m-t-5" >Percentual:</label>
                                                    <label class="" >10%</label><br>
                                                    <label class="" >Preço com desconto (R$):</label>
                                                    <label class="" >14.125,00</label><br>
                                                    <label class="" >Expira em:</label>
                                                    <label class="" >12/12/2018</label><br>
                                                    <button type="button" id="botaobranco" style="
                                                        border: 1px solid black;
                                                        border-radius: 3px;                                                    
                                                        padding: 2px 8px;
                                                        font-size: 16px;
                                                        width:100%;
                                                        cursor: pointer;
                                                        border-color: #ffffff;                                                    
                                                        background-color: #00bf86;
                                                        color: white;
                                                        " onMouseOver="
                                                        this.style.color='#00bf86';
                                                        this.style.backgroundColor='white'"
                                                        onMouseOut="
                                                        this.style.color='#ffffff';
                                                        this.style.backgroundColor='#00bf86'" >
                                                        ATIVAR
                                                    </button>
                                                </div>                    
                                            </div>                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    
                    <div class="card file_input">
                        <div class="card-body">
                            <div class="row">
                                <div class="col m-t-15">
                                    <label for="imagem" class="col-form-label">Selecione a Imagem (Máximo 3):</label>
                                    <input type="hidden" id="csrf_token" name="_token" value="{{ csrf_token() }}">
                                    <input id="upload_imagem" name="imagem[]" type="file" accept="image/*" multiple class="file-loading">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card m-t-15">
                        <div class='card-header form-group bg-white' style="text-align: left !important;">
                            <label for="titulo" class="col-form-label">Título: </label>
                            <input class="form-control m-t-05" type="text" id='titulo' name="titulo" value="{{$publicacao->titulo or old('')}}" placeholder="Digite o título aqui..." maxlength="24">
                        </div>
                    </div>

                    <div class='card m-t-15'>
                        <div class='card-header form-group bg-white' style="text-align: left !important;">
                            <label for="descricao" class="col-form-label">Descrição: </label>
                            <!-- tools box -->
                        </div>
                        <div class='card-body form-group pad m-t-15'>
                            <textarea class="form-control textarea" rows="5" name="descricao" placeholder="Digite a descrição aqui...">{{$publicacao->descricao or old('')}}</textarea>
                            <!--
                            <textarea class="textarea form_editors_textarea_wysihtml" name="texto" placeholder="Digite seu texto aqui...">{{$publicacao->texto or old('')}}</textarea>
                            -->
                        </div>
                    </div>

                    <div class="card m-t-15">
                        <div class="row" style="margin-left: 0px !important;">
                            <div class="col-6">
                                <div class='card-header form-group bg-white' style="text-align: left !important;">
                                    <label for="referencias" class="col-form-label">Referência(s) (separar por espaço): </label>
                                    <input class="form-control m-t-05" type="text" id='referencias' name="referencias" value="{{$publicacao->referencias or '0'}}" placeholder="0">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class='card-header form-group bg-white' style="text-align: left !important;">
                                    <label for="preco" class="col-form-label">Preço (R$): </label>
                                    <input class="form-control m-t-05" type="text" id='preco' name="preco" value="{{$publicacao->preco or ''}}" placeholder="0">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card m-t-15">
                        <div class="row" style="margin-left: 0px !important;">
                            <div class="col-6">
                                <div class='card-header form-group bg-white' style="text-align: left !important;">
                                    <label for="ean" class="col-form-label">Disponibilidade: </label>
                                    <select class="form-control m-t-05" name="disponibilidade">
                                        <option value="0">Compra e Reserva</option>
                                        <option value="1">Compra</option>
                                        <option value="2">Reserva</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class='card-header form-group bg-white' style="text-align: left !important;">
                                    <label for="link" class="col-form-label">Link do Produto Para o E-Commerce: </label>
                                    <input class="form-control m-t-05" type="text" id='link' name="link" value="{{$publicacao->link or ''}}" placeholder="http://endereco.com.br">
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="card m-t-15">
                        <div class='card-header form-group bg-white' style="text-align: left !important;">
                            <label for="categoria" class="col-form-label">Selecionar Categoria: </label>
                            <select class="form-control m-t-05" name="id_categoria">
                                <optgroup label="Categorias...">
                                    @foreach($categorias as $c)
                                        <option value="{{$c->id}}" 
                                            @if(isset($publicacao->id_categoria))
                                                @if($publicacao->id_categoria == $c->id)
                                                    selected="selected"
                                                @endif
                                            @endif
                                        >{{$c->categoria}}</option>
                                    @endforeach
                                </optgroup>
                            </select>
                        </div>
                    </div>

                    <div class="card m-t-15">
                        <div class="form-group">
                            <div class='card-header form-group bg-white' style="text-align: left !important;">
                                <label for="desconto" class="col-form-label">Cupom de Desconto (Opcional): </label>
                            </div>
                            <div class="col m-t-15 p-b-10">
                                <label class="checkbox"><input type="checkbox" value="" id="ativarcupom">&nbsp Ativar Cupom &nbsp</label>  
                            </div>
                            
                            <div class="col m-t-40">
                                <div class="col-md-8 pull-right">
                                    <div class="form-group row desconto">
                                        <label for="percentual" class="col-sm-4 col-form-label">Percentual</label>
                                    <div class="col-sm-8">
                                      <input type="text" class="form-control" id="percentual" value="10%">
                                </div>

                                </div>

                                <div class="form-group row">
                                    <label for="expira" class="col-sm-4 col-form-label">Expira em</label>
                                    <div class="col-sm-8">
                                      <input type="text" class="form-control" id="expira" value="12/10/2018">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="cod_barra" class="col-sm-4 col-form-label">Código de barras do Produto</label>
                                    <div class="col-sm-8">
                                      <input type="text" class="form-control" id="cod_barra" value="987654321">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="prec_desc" class="col-sm-4 col-form-label">Preço com desconto (R$)</label>
                                    <div class="col-sm-8">
                                      <input type="text" class="form-control" id="prec_desc" value="14.125,00">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="cod_prod2" class="col-sm-4 col-form-label">Código Produto Lista de Preços 2</label>
                                    <div class="col-sm-8">
                                      <input type="text" class="form-control" id="cod_prod2" value="987654321">
                                    </div>
                                </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class='card m-t-15'>
                        <div class='card-body form-group pad m-t-15'>
                            <div class="row">
                                <div class="input-group col-sm-6 col-6 date form_date">
                                    <label for="dataInicial" class="col-form-label margemDir">Data Inicial: </label>
                                    <input type="text" name="dataInicial" id="dataInicial" class="date_mask form-control" OnKeyUp="mascaraData();" maxlength="10" value="{{$dataInicial}}">
                                    <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                </div>
                                <div class="input-group col-sm-6 col-6 date form_date">
                                    <label for="dataFinal" class="col-form-label margemDir">Data Final: </label><input type="text" name="dataFinal" id="dataFinal" class="date_mask form-control" OnKeyUp="mascaraData1();" maxlength="10" value="{{$dataFinal}}">
                                    <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                </div>
                            </div>
                            <div class="row m-t-15">
                                <div class="col-sm-12 col-12">
                                    <div class="pull-right">
                                        @if(Request::session()->get('permissao') != 2)
                                            <span class="btn btn-primary margemDir" id="click">Visualizar</span>
                                            @if(isset($publicacao->id))
                                                <input class="btn btn-success margemDir" type="submit" value="Atualizar" id="botao" />
                                            @else
                                                <input class="btn btn-success margemDir" type="submit" value="Publicar" id="botao"/>
                                            @endif
                                            <input class="btn btn-warning" type="reset" id="clear" value="Limpar">
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="m-t-15" id="erro" align="center"></div>
                        </div>
                    </div>
                </div>
        </form>
        <!-- row - form editors ends-->
    </div>
    <!-- /.inner -->
</div>
    <!-- /.outer -->
@stop
@section('footer_scripts')
    <!--Plugin scripts-->
    <script type="text/javascript" src="{{asset('assets/vendors/tinymce/js/tinymce.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/bootstrap3-wysihtml5-bower/js/bootstrap3-wysihtml5.all.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/pluginjs/bootstrap3_wysihtml5.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/summernote/js/summernote.min.js')}}"></script>
    <!--End of plugin scripts-->
    <!--Page level scripts-->
    <script type="text/javascript" src="{{asset('assets/js/pages/form_editors.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/bootstrap-wysihtml5.pt-BR.js')}}"></script>

    <script type="text/javascript" src="{{asset('assets/js/pluginjs/jasny-bootstrap.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/holderjs/js/holder.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/bootstrapvalidator/js/bootstrapValidator.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/pages/validation.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/bootstrap-datetimepicker.min.js')}}" charset="UTF-8"></script>
    <script type="text/javascript" src="{{asset('assets/js/bootstrap-datetimepicker.pt-BR.js')}}" charset="UTF-8"></script>


    <script type="text/javascript" src="{{asset('assets/vendors/holderjs/js/holder.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/fancybox/js/jquery.fancybox.pack.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/fancybox/js/jquery.fancybox-buttons.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/fancybox/js/jquery.fancybox-thumbs.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/fancybox/js/jquery.fancybox-media.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/pages/gallery.js')}}"></script>


    <script type="text/javascript" src="{{asset('assets/vendors/fileinput/js/fileinput.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/fileinput/js/theme.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/blueimp_file_upload/js/jquery.ui.widget.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/blueimp-tmpl/js/tmpl.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/blueimploadimage/js/load-image.all.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/blueimp-canvas-to-blob/js/canvas-to-blob.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/blueimp-gallery-with-desc/js/jquery.blueimp-gallery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/blueimp_file_upload/js/jquery.iframe-transport.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/blueimp_file_upload/js/jquery.fileupload.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/blueimp_file_upload/js/jquery.fileupload-process.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/blueimp_file_upload/js/jquery.fileupload-image.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/blueimp_file_upload/js/jquery.fileupload-validate.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/blueimp_file_upload/js/jquery.fileupload-ui.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/dropify/js/dropify.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/dropzone/js/dropzone.min.js')}}"></script>
    <!-- end of global scripts-->
    <script type="text/javascript" src="{{asset('assets/js/pages/file_upload.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/jquery.mask.min.js')}}"></script>

    <script id="template-upload" type="text/x-tmpl">
        {% for (var i=0, file; file=o.files[i]; i++) { %}
        <tr class="template-upload fade">
            <td>
                <span class="preview"></span>
            </td>
            <td>
                <p class="name">{%=file.name%}</p>
                <strong class="error text-danger"></strong>
            </td>
            <td>
                <p class="size">Processing...</p>
                <div class="progress active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                    <div class="progress-bar bg-success" style="width:0%;"></div>
                </div>
            </td>
            <td>
                {% if (!i && !o.options.autoUpload) { %}
                <button class="btn btn-primary start m-t-10" disabled>
                    <i class="fa fa-arrow-up"></i>
                    <span>Start</span>
                </button>
                {% } %} {% if (!i) { %}
                <button class="btn btn-warning cancel m-t-10">
                    <i class="fa fa-close"></i>
                    <span>Cancel</span>
                </button>
                {% } %}
            </td>
        </tr>
        {% } %}



</script>
<!-- The template to display files available for download -->
<script id="template-download" type="text/x-tmpl">
        {% for (var i=0, file; file=o.files[i]; i++) { %}
        <tr class="template-download fade">
            <td>
                <span class="preview">
                {% if (file.thumbnailUrl) { %}
                    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery><img src="{%=file.thumbnailUrl%}"></a>
                {% } %}
            </span>
            </td>
            <td>
                <p class="name">
                    {% if (file.url) { %}
                    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" {%=file.thumbnailUrl? 'data-gallery': ''%}>{%=file.name%}</a> {% } else { %}
                    <span>{%=file.name%}</span> {% } %}
                </p>
                {% if (file.error) { %}
                <div><span class="label label-danger">Error</span> {%=file.error%}</div>
                {% } %}
            </td>
            <td>
                <span class="size">{%=o.formatFileSize(file.size)%}</span>
            </td>
            <td>
                {% if (file.deleteUrl) { %}
                <button class="btn btn-danger delete m-t-10" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}" {% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}' {% } %}>
                    <i class="fa fa-trash"></i>
                    <span>Delete</span>
                </button>
                <input type="checkbox" name="delete" value="1" class="toggle"> {% } else { %}
                <button class="btn btn-warning cancel m-t-10">
                    <i class="fa fa-close"></i>
                    <span>Cancel</span>
                </button>
                {% } %}
            </td>
        </tr>
        {% } %}

</script>
<!-- end of global scripts-->




    <script type="text/javascript">
        $(document).ready(function(){
            //atribuindo os campos ao iniciar a tela
            if ($('#titulo').val() != '') {
                $('#mostraTitulo').html($('#titulo').val());
            }
            if ($('.textarea').val() != '') {
                $('#mostraDescricao').html($('.textarea').val());
            }
            if ($('#referencias').val() != 0) {
                $('#mostraReferencias').html('Referências: '+$('#referencias').val());
            }
            if (($('#preco').val() != 0) || ($('#preco').val() != '')) {
                $('#mostraValor').html($('#preco').val());
            }
            
        });

        //mascara do valor do produto
        $('#preco').mask('#.##0,00', {reverse: true});

        //atribuindo aos campos de visualização os dados digitados
        $('#click').on('click',function(){
            //limpando os src de visualizacao
            $('#img1').attr('src' ,"{{asset('assets/img/publicacoes/foto_perfil.png')}}");
            $('#img2').attr('src' ,"{{asset('assets/img/publicacoes/foto_perfil.png')}}");
            $('#img3').attr('src' ,"{{asset('assets/img/publicacoes/foto_perfil.png')}}");

            let contador = 1;
            let div = 1;
            $.each( $( ".kv-preview-data" ), function() {
                if ((contador % 2) == 0) {
                    $('#img'+div).attr('src' ,$(this).attr('src'));
                    div++;
                }
                contador++;
            });

            if ($('#titulo').val() != '') {
                $('#mostraTitulo').html($('#titulo').val());
            }
            if ($('.textarea').val() != '') {
                $('#mostraDescricao').html($('.textarea').val());
            }
            if ($('#referencias').val() != 0) {
                $('#mostraReferencias').html('Referências: '+$('#referencias').val());
            }
            if (($('#preco').val() != 0) || ($('#preco').val() != '')) {
                $('#mostraValor').html($('#preco').val());
            }

        });

        //limpando
        $('#clear').on('click',function(){
            $('#img1').attr('src' ,"{{asset('assets/img/publicacoes/foto_perfil.png')}}");
            $('#img2').attr('src' ,"{{asset('assets/img/publicacoes/foto_perfil.png')}}");
            $('#img3').attr('src' ,"{{asset('assets/img/publicacoes/foto_perfil.png')}}");
            $('#mostraTitulo').html('Título da publicação...');
            $('#mostraDescricao').html('Conteúdo da publicação...');
            $('#mostraReferencias').html('Referências: ...');
            $('#mostraValor').html('15.000,00');
        });

        
        $('.form_date').datetimepicker({
            language:  'pt-BR',
            weekStart: 1,
            todayBtn:  1,
            autoclose: 1,
            todayHighlight: 1,
            startView: 2,
            minView: 2,
            forceParse: 0,
            format: 'dd/mm/yyyy'
        });

        function mascaraData(){
            var data = $('#dataInicial').val();
            if (data.length == 2){
                data = data + '/';
                $('#dataInicial').val(data);
                return true;
            }
            if (data.length == 5){
                data = data + '/';
                $('#dataInicial').val(data);
                return true;
            }
         }

        function mascaraData1(){
            var data = $('#dataFinal').val();
            if (data.length == 2){
                data = data + '/';
                $('#dataFinal').val(data);
                return true;
            }
            if (data.length == 5){
                data = data + '/';
                $('#dataFinal').val(data);
                return true;
            }
        }

        //verificando se a data inicial é válida
        $("#dataInicial").on('change',function() {
            var RegExPattern = /^((((0?[1-9]|[12]\d|3[01])[\.\-\/](0?[13578]|1[02])[\.\-\/]((1[6-9]|[2-9]\d)?\d{2}))|((0?[1-9]|[12]\d|30)[\.\-\/](0?[13456789]|1[012])[\.\-\/]((1[6-9]|[2-9]\d)?\d{2}))|((0?[1-9]|1\d|2[0-8])[\.\-\/]0?2[\.\-\/]((1[6-9]|[2-9]\d)?\d{2}))|(29[\.\-\/]0?2[\.\-\/]((1[6-9]|[2-9]\d)?(0[48]|[2468][048]|[13579][26])|((16|[2468][048]|[3579][26])00)|00)))|(((0[1-9]|[12]\d|3[01])(0[13578]|1[02])((1[6-9]|[2-9]\d)?\d{2}))|((0[1-9]|[12]\d|30)(0[13456789]|1[012])((1[6-9]|[2-9]\d)?\d{2}))|((0[1-9]|1\d|2[0-8])02((1[6-9]|[2-9]\d)?\d{2}))|(2902((1[6-9]|[2-9]\d)?(0[48]|[2468][048]|[13579][26])|((16|[2468][048]|[3579][26])00)|00))))$/;
            var EnteredDate = $(this).val(); 
            var date = EnteredDate.substring(0, 2);
            var month = EnteredDate.substring(3, 5);
            var year = EnteredDate.substring(6, 10);
            var myDate = new Date(year, month - 1, date);
            var today = new Date();
            var dataVenc = new Date(today.getTime() - (1 * 24 * 60 * 60 * 1000));//Subtraindo 1 dia
            if (!((this.value.match(RegExPattern)))) {
                $('#erro').html( "Data inicial inválida." ).css( "color", "red" );
                $('#botao').attr('disabled', 'disabled');
                $(this).css('background-color', '#FF6347');
            }else if (myDate < dataVenc) {
                $('#erro').html( "A data inicial não pode ser menor que hoje." ).css( "color", "red" );
                $('#botao').attr('disabled', 'disabled');
                $(this).css('background-color', '#FF6347');
            }else{
                $('#botao').removeAttr('disabled');
                $(this).css('background-color', '#FFF');
                $('#erro').html( '' ).css( "color", "red" );
            }
        });
        //verificando se a data final é válida
        $("#dataFinal").on('change',function() {
            var RegExPattern = /^((((0?[1-9]|[12]\d|3[01])[\.\-\/](0?[13578]|1[02])[\.\-\/]((1[6-9]|[2-9]\d)?\d{2}))|((0?[1-9]|[12]\d|30)[\.\-\/](0?[13456789]|1[012])[\.\-\/]((1[6-9]|[2-9]\d)?\d{2}))|((0?[1-9]|1\d|2[0-8])[\.\-\/]0?2[\.\-\/]((1[6-9]|[2-9]\d)?\d{2}))|(29[\.\-\/]0?2[\.\-\/]((1[6-9]|[2-9]\d)?(0[48]|[2468][048]|[13579][26])|((16|[2468][048]|[3579][26])00)|00)))|(((0[1-9]|[12]\d|3[01])(0[13578]|1[02])((1[6-9]|[2-9]\d)?\d{2}))|((0[1-9]|[12]\d|30)(0[13456789]|1[012])((1[6-9]|[2-9]\d)?\d{2}))|((0[1-9]|1\d|2[0-8])02((1[6-9]|[2-9]\d)?\d{2}))|(2902((1[6-9]|[2-9]\d)?(0[48]|[2468][048]|[13579][26])|((16|[2468][048]|[3579][26])00)|00))))$/;
            var EnteredDate = $(this).val(); 
            var date = EnteredDate.substring(0, 2);
            var month = EnteredDate.substring(3, 5);
            var year = EnteredDate.substring(6, 10);
            var myDate = new Date(year, month - 1, date);
            var today = new Date();
            var dataVenc = new Date(today.getTime() - (1 * 24 * 60 * 60 * 1000)); //Subtraindo 1 dia
            if (!((this.value.match(RegExPattern)))) {
                $('#erro').html( "Data final inválida." ).css( "color", "red" );
                $('#botao').attr('disabled', 'disabled');
                $(this).css('background-color', '#FF6347');
            }else if (myDate < dataVenc) {
                $('#erro').html( "A data final não pode ser menor que hoje." ).css( "color", "red" );
                $('#botao').attr('disabled', 'disabled');
                $(this).css('background-color', '#FF6347');
            }else{
                $('#botao').removeAttr('disabled');
                $(this).css('background-color', '#FFF');
                $('#erro').html( '' ).css( "color", "red" );
            }
        });

    </script>
@stop