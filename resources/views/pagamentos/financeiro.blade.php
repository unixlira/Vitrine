@extends(('layouts/default'))
{{-- Page title --}}
@section('title')
    Financeiro
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
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/style.css')}}"/>
    <link href="{{asset('assets/css/pages/flot_charts.css')}}" rel="stylesheet" type="text/css">
@stop
@section('content')
    <header class="head">
        <div class="main-bar">
            <div class="row no-gutters">
                <div class="col-6">
                    <h4 class="m-t-5">
                        Financeiro
                    </h4>
                </div>
            </div>
        </div>
    </header>
    <main>
        </head>
       
        <div class="outer">
            <div class="inner bg-container">
                <div class="card">
                    <div class="card-body ">
                        <div>
                            <h2>Meu Plano</h2><br>
                        </div>

                        <div class="m-t-30">
                            <h4>ADESÃO</h4>
                            <hr>
                        </div>
                        
                        <div class="col-lg-2 m-t-30">
                            <h5>Planos Contratados:</h5>
                        </div>                            

                        <div class="col-lg-12  adesao">
                            <div class="table-responsive">
                                <table class=" table table-striped table-bordered table-hover dataTable " id="listPlanos" role="grid" cellspacing="0" width="100%">
                                    <thead>
                                        <tr scope="row">
                                            <th scope="col" class="text-center" style="color:#00bf86;"></th>
                                            <th scope="col" class="text-center" style="color:#00bf86;">Nome</th>
                                            <th scope="col" class="text-center" style="color:#00bf86;">Data de Cadastro</th>
                                            <th scope="col" class="text-center" style="color:#00bf86;">Valor Mensal</th>
                                            <th scope="col" class="text-center" style="color:#00bf86;">Vigência</th>
                                            <th nowrap width=10% scope="col" class="text-center" style="color:#00bf86;">Renovação Automática</th>
                                            <th nowrap width=8% scope="col" class="text-center" style="color:#00bf86;">Cancelar Serviço</th>
                                        </tr>
                                    </thead>
                                   
                                    <tbody>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <br>

                        <div class="contatofinanceiro">
                            <div class="m-t-30">
                                <h4>CONTATO</h4>
                                <hr>
                            </div>
                            <div class="col-lg-2 m-t-30">
                                <h5>E-mail:</h5>
                            </div> 

                            <form action="{{ URL::to($alteraemail) }}" method="post" novalidate>
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="col-lg-8 m-t-30">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <input name="email_fatura" type="email" class="form-control col-lg-12" style="font-style: italic;" value="{{$planos[0]->email_fatura}}" >
                                        </div>
                                            <button type="submit"class="btn btn-success">Editar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <br>
                            
                        <div class="contatofinanceiro">
                            <div class="m-t-30">
                                <h4>FORMA DE PAGAMENTO</h4>
                                <hr>
                            </div>
                            <div class="col-lg-2 m-t-30">
                                <h5>Cadastrado:</h5>
                            </div>
                            <div class="col-lg-12  adesao">
                                <div class="table-responsive">
                                    <table class=" table table-striped table-bordered table-hover dataTable m-t-20" id="teste" role="grid">
                                        <thead>
                                            <tr scope="row">
                                                <th scope="col" class="text-center" style="color:#00bf86;">Nome</th>
                                                <th scope="col" class="text-center" style="color:#00bf86;">Forma de Pagamento</th>
                                                <th nowrap width=10% scope="col" class="text-center" style="color:#00bf86;">Editar Pagamento</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($planos as $plano)
                                                <tr>
                                                    <th class="text-center">{{ $plano->nome_plano }}</th>
                                                    @switch($plano->forma_pgto)
                                                        @case(1)
                                                            <th class="text-center">Cartão de Crédito</th>
                                                            @break
                                                        @case(2)
                                                            <th class="text-center">Boleto Bancário</th>
                                                            @break
                                                        @default
                                                    @endswitch
                                                    <th class="text-center">
                                                        <button id="read-data" class="fa fa-pencil text-warning" title="Click para editar a Forma de Pagamento" 
                                                        style="
                                                        background-color: transparent;
                                                        border-color: transparent;
                                                        box-shadow: none;" onclick="readFormaPagamento({{ $plano->id }})" role="button" value="{{ $plano->id }}"></button>
                                                    </th>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <form action="{{ URL::to($editPagamento) }}" method="post" novalidate id="formEditPlano">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="id_pedido" value="{{ $planos[0]->id }}">  

                                <div id="Pagamento" style="display:none">
                                
                                    <div class="col-lg-8 m-t-30">
                                        <h5>Por favor selecione a opção de pagamento desejada:</h5>
                                    </div>
                                
                                    <div id="myCartao" class="col-md-6 cartao" style="float:left">
                                        <div class="m-t-30">
                                            <div class="col ">
                                                <label class="checkbox" for="checkbox"><input type="checkbox" id="myCard" name="radio"  value="1" onclick="clickBoleto(),showCard()" ><b>&nbsp Cartão de Crédito</b></label>
                                            </div>
                                        </div>
                                        
                                        <div class="m-t-10">
                                            <img src="{{asset('assets/img/pagamentos/visa.png')}}" width="70" height="25" class="m-l-20">
                                            <img src="{{asset('assets/img/pagamentos/master.png')}}" width="60" height="30" class="m-l-20">
                                            <img src="{{asset('assets/img/pagamentos/amex.png')}}" width="45" height="35" class="m-l-20">
                                            <img src="{{asset('assets/img/pagamentos/diners.png')}}" width="100" height="30" class="m-l-20">
                                        </div>
                                        
                                        <div class="col-md-10 dadosCartao">
                                            <div class="col m-t-30">
                                                <label for="nome_cartao"><b>Nome impresso no Cartão</b></label>
                                                <input type="text" name="nome_cartao" id="nome_cartao" class="form-control col-lg-12" style="font-style: italic;">

                                                <label class="m-t-10" for="numero_cartao"><b>Número do Cartão</b></label>
                                                <input type="text" name="numero_cartao" id="numero_cartao" class="form-control col-lg-12" style="font-style: italic;" required>
    
                                                <div class="datavalidade col-lg-6">
                                                        <div class="row ">
                                                            <label class="m-t-10"><b>Data de Validade</b>
                                                                <div class="col-12  row m-t-10">
                                                                    <input type="text" name="mes_cartao" id="mes_cartao"class="form-control col-lg-5" style="font-style: italic;" required>&nbsp
                                                                    <input type="text" name="ano_cartao" id="ano_cartao" class="form-control col-lg-5" style="font-style: italic;" required>
                                                                </div>
                                                            </label>
                                                        </div>
                                                </div>
    
                                                <div class="ccv">
                                                    <label class="m-t-10" for="cvv_cartao"><b>CCV</b></label>
                                                    <input type="text" name="cvv_cartao" id="cvv_cartao" class="form-control col-lg-6" style="font-style: italic;">
                                                </div>
                                            </div>
                                        </div>    
                                    </div><br>
            
                            
                                    <div class="boleto" id="myBoleto">
                                        <div class="m-t-30">
                                            <div class="col-md-8 ">
                                            <label class="checkbox" for="radio1"><input type="checkbox"  id="myBol" name="radio" value="2" onclick="clickCartao(),showBol()" ><b>&nbsp Boleto Bancário</b></label>
                                            </div>
                                        </div>
    
                                        <div class=" m-t-10">
                                            <img src="{{asset('assets/img/pagamentos/boleto.png')}}" width="100" height="30" class="m-l-20">
                                            <label ><a href="boleto.php">&nbsp  Gerar Boleto</a></label>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="col m-t-15">
                                        <button type="submit" class="btn btn-success" style="width: 160px;">Salvar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </main>
    @stop

@section('footer_scripts')
    <!--Plugin scripts-->
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

        // `d` is the original data object for the row
        function format ( full ) {

            return '<table class="table-striped table-bordered table-hover" cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">'+
                '<tr>'+
                    '<td>Posições Vitrine:<br>'+full['id']+'</td>'+
                    
                    '<td style="padding-left:10px;">Relatório Métricas:<br><i class="fa fa-check text-success"></td>'+
                    
                    '<td style="padding-left:10px;">Base de dados de Clientes:<br><i class="fa fa-close"></td>'+
                    
                    '<td style="padding-left:10px;">Push Notification:<br><i class="fa fa-close"></td>'+
                    
                    '<td style="padding-left:10px;">Prioridade de divulgação:<br><i class="fa fa-close"></td>'+
                    
                '</tr>'+
            '</table>';
        }
    // ===============table 1====================
    var initTable1 = function() {
        var table = $('#listPlanos');
        var oTable = '';
        /* Table tools samples: https://www.datatables.net/release-datatables/extras/TableTools/ */
        /* Set tabletools buttons and button container */
       oTable =  table.DataTable({
            "destroy": true,
            "processing": true,
            "serverSide": true,
            "ajax": "{{ url('datatable/getplanos') }}",
            "columns": [ 
                    {
                        "className":  'details-control',
                        "processing": true,
                        "serverSide": true,
                        "responsive": true,
                        "orderable":  false,
                        "searching":  false,
                        "data":       null,
                        "defaultContent": '<span class="row-details row-details-close"></span>'
                    },
                {data: 'nome_plano'},
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
                            
                            return dia +'/'+mes+'/'+ano+' - '+hora+':'+minuto+':'+segundo;
                            //return dataAtual;
                    }
                },
                {data: 'preco_plano', name: 'preco_plano', "render": function(data, type, row, meta )
                    {
                        var preco = "R$ "+data+",00";

                        return preco;
                    }


                },
                {data: 'created_at', name: 'created_at', "render": function ( data, type, row, meta )
                    {
                            var dataAtual = new Date(data);
                            var dia = dataAtual.getDate();
                            var mes = dataAtual.getMonth()+1;
                            var ano = dataAtual.getFullYear()+1;
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
                            
                            return dia +'/'+mes+'/'+ano;
                            //return dataAtual;
                    }
                },               
                {data: 'id','render':function( data, type, full)
                    {
                        if( full['renovacao_auto'] == 1){
                            return  '<th class="text-center"><a href="financeiro/renovacao_automatica/'+ data +'"><i class="fa fa-check text-success" title="ATIVADO: click para desativar renovação automática"></i><a></th>';
                        }else{
                            return  '<th class="text-center"><a href="financeiro/renovacao_automatica/'+ data +'"><i class="fa fa-close text-dark" title="DESATIVADO: click para ativar renovação automática"></i></a></th>';
                        }
                    }
                
                },
                {data: 'id', "render": function ( data, type, row, meta )
                    {
                        return '<a class="delete hidden-xs hidden-sm" data-toggle="tooltip" data-placement="top" title="" href="financeiro/cancelamento/'+ data +'" data-original-title="Bloquear"><i class="fa fa-ban text-danger"></i></a>';
                        
                    }
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


 

    $(document).ready(function() { 
         // Evento que abre e fecha os detalhes
        table.on('click', 'td.details-control', function () {
            var tr = $(this).closest('tr');
            var row = oTable.row( tr );
    
            if ( row.child.isShown() ) {
                // This row is already open - close it
                tr.removeClass('shown');
                row.child.hide();
            }
            else {
                // Open this row
                tr.addClass('shown');
                row.child( format(row.data()) ).show();
            }
        } );
    } );

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

    //Troca icon Renovação Auto
    $('a').click(function() {
        $(this).find('i').toggleClass('fa fa-check text-success fa fa-close text-dark');
    });

    // Retorno de dados do cartão de crédito cadastrado
    function readFormaPagamento(id){
        $('#Pagamento').fadeToggle();
        $.get('/pagamentos/financeiro/plano/' +id, function(data){
            $('#nome_cartao').val (data.nome_cartao);
            $('#numero_cartao').val (data.numero_cartao);
            $('#mes_cartao').val (data.mes_cartao);
            $('#ano_cartao').val (data.ano_cartao);
            $('#cvv_cartao').val (data.cvv_cartao);
        });
    }


    //Ajax Pagamentos
    $('#read-data').on('click',function(id){
        $.get('pagamentos/financeiro/plano/' +id, function(data){
        });
    })

</script>
@stop
