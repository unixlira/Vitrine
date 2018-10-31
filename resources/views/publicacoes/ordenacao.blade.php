@extends(('layouts/default')){{-- Page title --}}
@section('title')
File Upload
@parent
@stop
{{-- page level styles --}}
@section('header_styles')
<!--plugin style-->
<link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/select2/css/select2.min.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/datatables/css/scroller.bootstrap.min.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/datatables/css/colReorder.bootstrap.min.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/datatables/css/dataTables.bootstrap.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/responsive.dataTables.css')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/pages/dataTables.bootstrap.css')}}" />
<!-- end of plugin styles -->
<!--Page level styles-->
<link type="text/css" rel="stylesheet" href="{{asset('assets/css/pages/tables.css')}}" />
<!--End of page level styles-->
@stop


{{-- Page content --}}
@section('content')
<!-- Content Header (Page header) -->
<header class="head">
    <div class="main-bar">
        <div class="row">
            <div class="col-lg-6">
                <h4 class="nav_top_align">
                    <i class="fa fa-plus-square"></i>
                    Ordenar Publicações
                </h4>
            </div>
            <div class="col-lg-6">
                <div class="float-right">
                    <ol class="breadcrumb nav_breadcrumb_top_align">
                        <li class="breadcrumb-item">
                            <i class="fa fa-home" data-pack="default" data-tags=""></i>
                            Página Inicial
                        </li>
                        <li class="breadcrumb-item">
                            Publicações
                        </li>
                        <li class="breadcrumb-item active">Ordenar Publicações</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="outer">
    <div class="inner bg-container">
        <div class="row">
            <div class="col-12 data_tables">
                <div class="card">
                    <div class="card-body m-t-15">
                        <div class="table-toolbar">
                            <h3>Listagem</h3><h5>Clique e arraste a linha para definir a posição</h5>
                        <div id="resultado" align="center" style="display: none;">Publicações atualizadas com sucesso.</div>
                        </div>
                        <table class="table table-striped table-bordered table-hover dataTable no-footer textoEsquerda" id="ordenacao" role="grid">
                            <thead>
                                <tr role="row">
                                    <th class="sorting_asc wid-10" tabindex="0" rowspan="1" colspan="1">ID</th>
                                    <th class="sorting wid-20" tabindex="0" rowspan="1" colspan="1">Título</th>
                                    <th class="sorting_asc wid-10" tabindex="0" rowspan="1" colspan="1">Imagem</th>
                                    <th class="sorting_asc wid-10" tabindex="0" rowspan="1" colspan="1">Data de Registro</th>
                                    <th class="sorting wid-20" tabindex="0" rowspan="1" colspan="1">Início</th>
                                    <th class="sorting wid-20" tabindex="0" rowspan="1" colspan="1">Fim</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $var = rand(0,100); $c=1;?>
                                @foreach($dados as $o)
                                <tr id="{{$o->id}}" role="row" class="even">
                                    <td>{{$o->id}}</td>
                                    <td>{{$o->titulo}}</td>
                                    <td align="center"><img src="{{asset('assets/img/publicacoes/'.$o->imagem1.'?var='.$var)}}" alt="not found" class="fileinput fileinput-new" style=" width: 40px !important; height: 35px !important; position: relative;"/></td>
                                    <td>{{ date( 'd/m/Y  H:i:s' , strtotime($o->created_at))}}</td>
                                    <td>{{ date( 'd/m/Y' , strtotime($o->dataInicial))}}</td>
                                    <td>{{ date( 'd/m/Y' , strtotime($o->dataFinal))}}</td>
                                </tr>
                                <?php $c++?>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <!-- /.inner -->
</div>
<!-- /.outer -->
<!-- /.content -->
@stop

{{-- page level scripts --}}
@section('footer_scripts')
<!--plugin script-->

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
<script type="text/javascript" src="{{asset('assets/vendors/datatables/js/dataTables.responsive.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/pages/users.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/jquery-sortable.js')}}"></script>
<!-- end of global scripts-->
<script type="text/javascript">
    //cursor de maozinha
    $("#ordenacao").mouseover(function() {
        $(this).css("cursor","move ");
    });

    // Sortable rows
    $('#ordenacao').sortable({
      containerSelector: 'table',
      itemPath: '> tbody',
      itemSelector: 'tr',
      placeholder: '<tr class="placeholder"/>',

      onDrop: function  (event, ui) {
        let sequencia = [];
        for (let i = 0; i <= ui.target[0].children.length - 1; i++) {
            sequencia.push(ui.target[0].children[i].id);
        }
        
        $.post("salvarsequenciapublicacoes", {sequencia:sequencia, "_token": "{{ csrf_token() }}"}, function(result){
            console.info(result);
        });
        
        $( "#resultado" ).fadeIn( 1000 );
        $( "#resultado" ).fadeOut( 1000 );
      }
    });
</script>
@stop