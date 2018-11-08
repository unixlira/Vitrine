<?php

Route::get('/','IndexController@index'); //pagina inicial

Route::get('index1','IndexController@index'); //pagina inicial Administrador (permissão 0)

Route::get('indexloja','IndexController@index'); //pagina inicial Loja (permissão 1 ou 2)

Route::get('indexlojaadm/{id_loja}','IndexController@indexlojaadm'); //pagina inicial Loja (permissão 1 ou 2)

Route::get('acoesrecentes','IndexController@acoesrecentes'); // Pagina com a listagem das acoes dos usuarios do sistema

Route::get('datatable/getacoesrecentes/', ['as'=>'datatable.getacoesrecentes','uses'=>'IndexController@getAcoesRecentes']);

// --------------------------------------------------------- //
// -- LOGIN -- //
// --------------------------------------------------------- //

Route::get('login/login','LoginController@login'); //form de login

Route::get('login/lockscreen','LoginController@lockscreen'); //Tela de Bloqueio de Tela

Route::post('login/valida_login','LoginController@valida_login'); //validar login

Route::post('login/valida_login_lockscreen','LoginController@valida_login_lockscreen'); //validar login tela de bloqueio

Route::get('login/logoff','LoginController@logoff'); //form de logoff

Route::get('login/recuperarlogin','LoginController@recuperarlogin'); //form recuperar senha

Route::post('login/enviarlogin','LoginController@enviarlogin'); //enviar senha por email




// --------------------------------------------------------- //
// -- CARREGAMENTOS DA PAGINA INCICIAL ADM -- //
// --------------------------------------------------------- //

Route::get('acoesrecentesusuarios','IndexController@acoesRecentesUsuarios'); //Pega as 4 ultimas acoes dos usuarios no Site (Todos)

Route::get('carregaquadradinhos','IndexController@carregaQuadradinhos'); //Quadradinhos

Route::get('carregatop5Produtos','IndexController@carregatop5Produtos'); //Contagem de spins por Origem (PDV, Cartao< RA).

Route::get('carregasexos','IndexController@carregaSexos'); //Grafico de Sexos dos Participantes

Route::get('totalclientescadastrados','IndexController@totalClientesCadastrados'); //Total de Clientes cadastrados dia / semana / mes

Route::get('carregagraficoidade','IndexController@carregaGraficoIdade'); //Contagem de spins por Origem (PDV, Cartao< RA).

Route::get('carregacalendario','IndexController@carregaCalendario'); //Calendario





// --------------------------------------------------------- //
// -- CARREGAMENTOS DA PAGINA INCICIAL LOJAS -- //
// --------------------------------------------------------- //

Route::get('acoesrecentesusuarioslojas/{id_loja}','IndexController@acoesRecentesUsuariosLojas'); //Pega as 4 ultimas acoes dos usuarios no DA lOJA

Route::get('carregaquadradinhoslojas/{id_loja}','IndexController@carregaQuadradinhosLojas'); //Quadradinhos da Loja

Route::get('totalvisualizacoes/{id_loja}','IndexController@totalvisualizacoes'); //Total de vizualizacoes da loja dia / semana / mes

Route::get('mineracaopublicacoesativas/{id_loja}','IndexController@mineracaopublicacoesativas'); // Preenchimento da tabela dos dados minerados das Publicações Ativas

Route::get('mineracaopublicacoesinativas/{id_loja}','IndexController@mineracaopublicacoesinativas'); // Preenchimento da tabela dos dados minerados das Publicações Inativas

Route::get('verdetalhespublicacao/{id_publicacao}/{listagem}','IndexController@verdetalhespublicacao'); // Listagem dos clientes que interagiram com a publicacao X

Route::get('getverdetalhespublicacao/{id_publicacao}/{listagem}', ['as'=>'getverdetalhespublicacao','uses'=>'IndexController@getverdetalhespublicacao']); // ajax dos clientes que interagiram com a publicacao X

Route::get('classificacaopublicacoes/{id_loja}','IndexController@classificacaopublicacoes'); // Quantificação dos Likes ou Unlikes das Publicações

Route::get('reservaspublicacoes/{id_loja}','IndexController@reservaspublicacoes'); // Quantificação das reservas das Publicações




// --------------------------------------------------------- //
// -- AFAZERES-- //
// --------------------------------------------------------- //

Route::post('insereAfazer','IndexController@insereAfazer'); //inserindo Afazer (tarefa)

Route::get('removeAfazer/{id}','IndexController@removeAfazer'); //inserindo Afazer (tarefa)

Route::post('atualizaAfazer/{id}','IndexController@atualizaAfazer'); //atualizando Afazer (tarefa)

// -- REGISTRA NOTAS -- //
Route::post('salvaNotas','IndexController@salvaNotas'); //atualizando Afazer (tarefa)



// --------------------------------------------------------- //
// -- LOJAS DO SITE -- //
// --------------------------------------------------------- //

Route::get('lojas/listarlojas','LojasController@listarlojas'); // listando as lojas

Route::get('lojas/getlojas/{excluido}', ['as'=>'lojas.getlojas','uses'=>'LojasController@getlojas']); // ajax da tabela lojas

Route::get('lojas/novaloja','LojasController@novaloja'); //  chama form de nova loja

Route::get('lojas/verloja/{id}','LojasController@editarloja'); //  chama form de nova loja

Route::get('lojas/lojasremovidas','LojasController@lojasremovidas'); //ver usuarios removidos

Route::post('lojas/salvarloja','LojasController@salvarloja'); //cadastrando no BD

Route::post('lojas/salvarloja/{id}','LojasController@atualizarloja'); //atualizando registro no BD

Route::get('lojas/excluirloja/{id}','LojasController@excluirloja'); //Restaura a loja 

Route::get('lojas/restaurarloja/{id}','LojasController@restaurarloja'); //Restaura a Loja




// --------------------------------------------------------- //
// -- USUARIOS DO SITE -- //
// --------------------------------------------------------- //

Route::get('usuarios/listarusuarios','UsuariosController@listarusuarios'); //listando os usuarios

Route::get('datatable/getusuarios/{ativo}', ['as'=>'datatable.getusuarios','uses'=>'UsuariosController@getUsuarios']);

Route::get('usuarios/novousuario','UsuariosController@novousuario'); //chama form de novo usuario

Route::get('usuarios/editarusuario/{id}','UsuariosController@editarusuario'); //insere novo usuario no BD

Route::get('usuarios/usuariosremovidos','UsuariosController@usuariosremovidos'); //ver usuarios removidos

Route::get('usuarios/perfilusuario/{id}','UsuariosController@perfilusuario'); //ver usuarios removidos 

Route::get('datatable/getacoes/{id}', ['as'=>'datatable.getacoes','uses'=>'UsuariosController@getacoes']);

Route::post('usuarios/adicionarUsuario','UsuariosController@adicionarusuario'); //cadastrando no BD novo usuario

Route::put('usuarios/atualizarusuario/{id}','UsuariosController@atualizarusuario'); //atualizar dados cadastrais do usuário 

Route::get('usuarios/restaurarusuario/{id}','UsuariosController@restaurarusuario'); //Restaura acesso de usuario

Route::get('usuarios/bloquearusuario/{id}','UsuariosController@bloquearusuario'); //Restaura acesso de usuario



// --------------------------------------------------------- //
// --  CLIENTES -- //
// --------------------------------------------------------- //

Route::get('clientes/clientescadastrados','ClientesController@clientescadastrados'); //ver participantes cadastrados

Route::get('clientes/clientesbloqueados','ClientesController@clientesbloqueados'); //ver participantes cadastrados 

Route::get('clientes/getclientes/{habilitado}', ['as'=>'datatable.getclientes','uses'=>'ClientesController@getClientes']); //Listagem dos participantes com ajax

//Route::get('clientes/infoclientes/{id}','ClientesController@infoParticipantes'); //Pegando informacoes extra do participante (+) 

Route::get('clientes/detalhescliente/{id}','ClientesController@detalhescliente'); //ver detalhes de um participante 

Route::get('clientes/bloquearclientedireto/{id}','ClientesController@bloquearclientedireto'); //bloquear participante

Route::put('clientes/bloquearcliente/{id}','ClientesController@bloquearcliente'); //bloquear participante

Route::get('clientes/habilitarclientedireto/{id}','ClientesController@habilitarclientedireto'); //habilitar participante 

Route::put('clientes/habilitarcliente/{id}','ClientesController@habilitarcliente'); //habilitar participante 

Route::get('clientes/resetarsenha/{id}','ClientesController@resetarsenha'); //resetar senha do participante 

Route::post('clientes/atualizadesconto/{id}','ClientesController@atualizaDesconto'); //resetar senha do participante 



// --------------------------------------------------------- //
// -- PUBLICAÇÕES DPARA O APP -- //
// --------------------------------------------------------- //

Route::get('publicacoes/publicacoesativas','PublicacoesController@publicacoesativas'); //Listar todas as ofertas ativas

Route::get('publicacoes/publicacoesinativas','PublicacoesController@publicacoesinativas'); //Listar todas as ofertas inativas

Route::get('publicacoes/publicacoesfuturas','PublicacoesController@publicacoesfuturas'); //Listar todas as ofertas futuras

Route::get('publicacoes/novapublicacao','PublicacoesController@novapublicacao'); //Nova Oferta

Route::get('publicacoes/ordenacaoof','PublicacoesController@ordenacao'); //Listar as 12 publicacoes para ordenar

Route::post('publicacoes/salvarpublicacao','PublicacoesController@salvarpublicacao'); //Salvando novo texto de notificacao

Route::post('publicacoes/salvarpublicacao/{id}','PublicacoesController@atualizarpublicacao'); //Atualizando os dados da Oferta

Route::post('publicacoes/salvarsequenciapublicacoes','PublicacoesController@salvarSequencia'); //Salva a nova ordenacao das postagens

Route::get('publicacoes/publicacoes/{id}','PublicacoesController@verPublicacao'); //Detalhes da Oferta

Route::get('publicacoes/getpublicacoes', ['as'=>'publicacoes.getpublicacoes','uses'=>'PublicacoesController@getPublicacoes']); //Tabela de listagem JSON das ofertas

Route::get('publicacoes/getpublicacoesfuturas', ['as'=>'publicacoes.getpublicacoesfuturas','uses'=>'PublicacoesController@getPublicacoesFuturas']); //Tabela de listagem JSON das ofertas

Route::get('publicacoes/getpublicacoesinativas', ['as'=>'publicacoes.getpublicacoesinativas','uses'=>'PublicacoesController@getPublicacoesInativas']); //Tabela de listagem JSON das ofertas

Route::get('publicacoes/clientesdapublicacao/{id}','PublicacoesController@clientesdapublicacao'); // Ver as Publicações aderidas por determinado Cliente

Route::get('publicacoes/getclientespublicacao/{id}', ['as'=>'publicacoes.getclientespublicacao','uses'=>'PublicacoesController@getClientesPublicacao']); //Listagem ajax das Publicações aderidas por determinado Cliente

Route::get('publicacoes/excluirpublicacao/{id}','PublicacoesController@excluirPublicacao'); //Excluir Publicação

Route::get('publicacoes/verClientesPublicacao/{id}','PublicacoesController@verClientesPublicacao'); //Clientes que aderiram a determinada Publicação

Route::get('datatable/getpublicacoesclientes/{id}', ['as'=>'datatable.getpublicacoesclientes','uses'=>'PublicacoesController@getPublicacoesClientes']); //Listagem ajax dos Clientes que aderiram a determinada Publicação




// --------------------------------------------------------- //
// -- PROMOÇÕES DESTAQUE PARA O APP -- //
// --------------------------------------------------------- //

Route::get('destaques/listardestaques','DestaquesController@listardestaques'); //Listar todas os destaques

Route::get('destaques/getdestaques', ['as'=>'destaques.getdestaques','uses'=>'DestaquesController@getdestaques']); //Tabela de listagem JSON dos destaques

Route::get('destaques/novodestaque','DestaquesController@novodestaque'); //Tela de Novo Destaque

Route::post('destaques/salvardestaque','DestaquesController@salvardestaque'); //Salvando novo Destaque

Route::post('destaques/salvardestaque/{id}','DestaquesController@atualizardestaque'); //Atualizando os dados do Destaque

Route::get('destaques/excluirdestaque/{id}','DestaquesController@excluirdestaque'); //Excluir Destaque

Route::get('destaques/destaques/{id}','DestaquesController@verDestaque'); //Detalhes do Destaque

// === IMAGENS DESTAQUE === //

Route::get('destaques/listarimagensdestaque/{id}','DestaquesController@listarimagensdestaque'); //Listar todas as imagens de um destaque

Route::get('destaques/getimagensdestaque/{id}', ['as'=>'destaques.getimagensdestaque','uses'=>'DestaquesController@getimagensdestaque']); //Listagem JSON das imagens dos destaques

Route::get('destaques/novaimgdestaque/{id}','DestaquesController@novaimgdestaque'); //Tela de Novo Destaque

Route::post('destaques/salvarimgdestaque/{id_destaque}','DestaquesController@salvarimgdestaque'); //Salvando novo texto de notificacao

Route::post('destaques/atualizarimgdestaque/{id}','DestaquesController@atualizarimgdestaque'); //Salvando novo texto de notificacao

Route::get('destaques/verimgdestaque/{id}','DestaquesController@verimgdestaque'); //Tela de Novo Destaque

Route::get('destaques/excluirimgdestaque/{id_imgdestaque}/{id_destaque}','DestaquesController@excluirimgdestaque'); //Excluir Imagem de um Destaque


// --------------------------------------------------------- //
// -- NOTIFICAÇÕES DO APP -- //
// --------------------------------------------------------- //

Route::get('notificacoesapp/notificacoesapp','NotificacoesAppController@notificacoes'); //Nova Notificacao

Route::get('datatable/getnotificacoesapp', ['as'=>'datatable.getnotificacoesapp','uses'=>'NotificacoesAppController@getNotificacoesApp']); //Tabela de listagem dos arquivos

Route::post('notificacoesapp/salvartexto','NotificacoesAppController@salvarTexto'); //Salvando novo texto de notificacao


// --------------------------------------------------------- //
// -- PAGAMENTOS -- //
// --------------------------------------------------------- //

Route::get('pagamentos/planos', 'PagamentosController@planos');

Route::get('pagamentos/forma_pagamento/{id}', 'PagamentosController@formapagamento');

Route::post('pagamentos/salvarPedido', 'PagamentosController@salvarPedido');

Route::get('pagamentos/financeiro', 'PagamentosController@financeiro');

Route::get('pagamentos/termos', 'PagamentosController@termos');

Route::get('pagamentos/financeiro/renovacao_automatica/{id}', 'PagamentosController@renovacao');

Route::post('pagamentos/financeiro/alteraemail/', 'PagamentosController@alteraemail');

Route::post('pagamentos/financeiro/editar/{id}', 'PagamentosController@editarPagamento');

Route::get('pagamentos/financeiro/plano/{id}', 'PagamentosController@showPlano');

Route::get('pagamentos/financeiro/cancelamento/{id}', 'PagamentosController@excluir');

Route::get('datatable/getplanos', ['as'=>'datatable.getplanos','uses'=>'PagamentosController@getPlanos']);

