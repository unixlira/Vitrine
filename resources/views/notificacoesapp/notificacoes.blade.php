@extends(('layouts/default'))
{{-- Page title --}}
@section('title')
    Form Editors
    @parent
@stop
{{-- page level styles --}}
@section('header_styles')
    <!-- global styles-->
    <!-- end of global styles-->
<link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/select2/css/select2.min.css')}}" />
<link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/datatables/css/scroller.bootstrap.min.css')}}" />
<link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/datatables/css/colReorder.bootstrap.min.css')}}" />
<link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/datatables/css/dataTables.bootstrap.min.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/responsive.dataTables.css')}}">
<!-- end of plugin styles -->
<!--Page level styles-->
<link type="text/css" rel="stylesheet" href="{{asset('assets/css/pages/tables.css')}}" />
@stop
@section('content')
    <header class="head">
        <div class="main-bar">
            <div class="row no-gutters">
                <div class="col-lg-6 col-md-4 col-sm-4">
                    <h4 class="nav_top_align">
                        <i class="fa fa-bell-o" aria-hidden="true"></i>
                        Push Notification
                    </h4>
                </div>
                <div class="col-lg-6 col-md-8 col-sm-8">
                    <ol class="breadcrumb float-right nav_breadcrumb_top_align">
                        <li class="breadcrumb-item">
                                <i class="fa fa-home" aria-hidden="true"></i>
                                Página Inicial                            
                        </li>
                        <li class="breadcrumb-item">
                            Aplicativo
                        </li>
                        <li class="breadcrumb-item active">Push Notification</li>
                    </ol>
                </div>
            </div>
        </div>
    </header>
<div class="outer">
    <div class="inner bg-container">
        <!--
        <div class="row summer_note_display summer_note_btn">
            <div class="col-12">
                <div class='card'>
                    <div class='card-header bg-white text-left'>
                        Dados - Push Notification
                    </div>
                    <div class='card-body pad m-t-15'>
                        <div class="form-group row m-t-25">
                            <div class="col-lg-3 text-lg-right">
                                <label for="nome" class="col-form-label">Link *</label>
                            </div>
                            <div class="col-xl-6 col-lg-8">
                                <div class="input-group">
                                    <a href="https://www.onesignal.com" class="btn btn-success" target="_blank"><i class="fa fa-globe"></i> www.onesignal.com</a>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row m-t-25">
                            <div class="col-lg-3 text-lg-right">
                                <label for="nome" class="col-form-label">Usuário *</label>
                            </div>
                            <div class="col-xl-6 col-lg-8">
                                <div class="input-group">
                                    <h5 class="m-t-5">nagumo@magictv.com.br</h5>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row m-t-25">
                            <div class="col-lg-3 text-lg-right">
                                <label for="nome" class="col-form-label">Senha *</label>
                            </div>
                            <div class="col-xl-6 col-lg-8">
                                <div class="input-group">
                                    <h5 class="m-t-5">nagumo2018</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        -->
        <div class="row summer_note_display summer_note_btn">
            <div class="col-12">
                <div class='card'>
                    <div class='card-header bg-white text-left'>
                        Criar Notificação
                    </div>
                    <div class='card-body pad m-t-15'>
                        <form action="salvartexto" id="form_notificacao" method="POST">
                            <div class="row">
                                <label for="titulo" class="col-form-label margemEsq">Notificação *</label>
                                <input type="text" class="form form-control col-lg-5 margemEsq" placeholder="Digite a notificação aqui..." name="texto" id="texto" maxlength="122">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
                                <div class="col-lg-2">
                                    <div id="botoes">
                                        <input class="btn btn-warning margemDir" type="reset" id="clear" value="Limpar">
                                        <input class="btn btn-info" type="submit" value="Enviar" id="enviarNotificacao" />
                                    </div>
                                    <div id="gif" style="background: url('{{asset('assets/img/loader.gif')}}') no-repeat center; height: 30px; width: 28px; display: none;"></div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row m-t-15">
            <div class="col-12 data_tables">
                <div class="card">
                    <div class="card-body m-t-15">
                        <table class="table table-striped table-bordered table-hover dataTable no-footer textoEsquerda" id="teste" role="grid">
                            <thead>
                            <tr role="row">
                                <th class="sorting_asc wid-10" tabindex="0" rowspan="1" colspan="1">ID</th>
                                <th class="sorting_asc wid-10" tabindex="0" rowspan="1" colspan="1">Data</th>
                                <th class="sorting wid-20" tabindex="0" rowspan="1" colspan="1">Notificação</th>
                                <th class="sorting wid-20" tabindex="0" rowspan="1" colspan="1">Usuário</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <!-- /.inner -->
</div>
    <!-- /.outer -->
@stop
@section('footer_scripts')
    <!--Page level scripts-->

    <script type="text/javascript" src="{{asset('assets/js/pluginjs/jasny-bootstrap.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/holderjs/js/holder.js')}}"></script>

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
    <script type="text/javascript" src="{{asset('assets/js/pages/users.js')}}"></script>
    <!-- end page level scripts -->
    <script type="text/javascript">
        
var TableAdvanced = function() {
    // ===============table 1====================
    var initTable1 = function() {
        var table = $('#teste');
        /* Table tools samples: https://www.datatables.net/release-datatables/extras/TableTools/ */
        /* Set tabletools buttons and button container */
        table.DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": "{{ route('datatable.getnotificacoesapp') }}",
            "columns": [
                {data: 'id', name: 'id'},
                {data: 'created_at', name: 'created_at', "render": function ( data, type, row, meta )
                    {
                            var dataAtual = new Date(data);
                            var dia = dataAtual.getDate();
                            var mes = dataAtual.getMonth()+1;
                            var ano = dataAtual.getFullYear();
                            var hora = dataAtual.getHours();
                            var minuto = dataAtual.getMinutes();
                            var segundo = dataAtual.getSeconds();
                            var horaImprimivel = hora + ":" + minuto + ":" + segundo;

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
                            
                            return dia +'/'+mes+'/'+ano+' '+hora+':'+minuto+':'+segundo;
                            //return dataAtual;
                    }
                },
                {data: 'texto', name: 'texto'},
                {data: 'nome', name: 'usuarios.nome'}
            ],
            dom: "Bflr<'table-responsive't><'row'<'col-md-5 col-12'i><'col-md-7 col-12'p>>",
            buttons: [
                {
                extend: 'copy',
                text: 'Copiar',
            },
           'csv',
           {
               extend: 'print',
               text: 'Imprimir',
           }
            ],
            "language": {
            "sEmptyTable": "Nenhum registro encontrado",
            "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
            "sInfoFiltered": "(Filtrados de _MAX_ registros)",
            "sInfoPostFix": "",
            "sInfoThousands": ".",
            "sLengthMenu": "Mostrar _MENU_ entradas",
            "sLoadingRecords": "Carregando...",
            "sProcessing": "Processando...",
            "sZeroRecords": "Nenhum registro encontrado",
            "sSearch": "Buscar",
            "oPaginate": {
                "sNext": "Próximo",
                "sPrevious": "Anterior",
                "sFirst": "Primeiro",
                "sLast": "Último"
            },
            "oAria": {
                "sSortAscending": ": Ordenar colunas de forma ascendente",
                "sSortDescending": ": Ordenar colunas de forma descendente"
            }
        }
    });

        var tableWrapper = $('#sample_1_wrapper'); // datatable creates the table wrapper by adding with id {your_table_id}_wrapper
        tableWrapper.find('.dataTables_length select').select2(); // initialize select2 dropdown


    }
    // ===============table 1===============
    return {
        //main function to initiate the module
        init: function() {
            if (!jQuery().dataTable) {
                return;
            }
            initTable1();
        }
    };
}();
    /*
    //Enviando notificações:
    $('#enviarNotificacao').on('click', function(e) {
        e.preventDefault();
        $('#gif').css('display','block');
        $('#botoes').css('display','none');
        $("#titulo").prop("disabled", true);
        $("#texto").prop("disabled", true);

        $.ajax({
           type: "POST",
           url: 'salvartexto',
           data: {texto:$('#texto').val(), _token:$('#token').val()},
           success: function( data, status ) {
               //location.reload(); //se enviou, recarrega
           }
        });
   });
   */
    </script>
@stop