<?php 
namespace App\Http\Controllers; //obrigatorio a definicao do namespace do diretorio q contem as classes q vamos extender

use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Http\Requests\AfazeresRequest; //classe de validacao
use App\Http\Requests\UsuarioRequest; //classe de validacao
use App\Http\Controllers\Controller; //chamando a classe extendida
use Illuminate\Support\Facades\DB; //classe de comunicacao com o BD
use Yajra\Datatables\Datatables;
use View;
use App\Afazeres;
use App\Usuarios;
use App\Publicacoes;

class IndexController extends Controller
{
	public function __construct()
    {
        $this->middleware('autorizador'); //invocamos o middleware q verifica o login
    }
	
	public function showView($name)
    {
        if(View::exists($name)){
            return view($name);
        }
        else{
            return view('404');
        }
    }

    // -- CONTROLE DOS AFAZERES-- //
    public function insereAfazer(AfazeresRequest $request){ //salvando novo
		$afazer = new Afazeres; 
		$afazer->texto = $request->texto;
		$afazer->id_usuario = \Request::session()->get('id_usuario');
		$afazer->save();
		return redirect('/');
	}

	public function removeAfazer($id){ //removendo afazer
		$afazer = Afazeres::find($id); 
		if ($afazer) {
			$afazer->delete();
		}
		return redirect('/');
	}

	public function atualizaAfazer(AfazeresRequest $request, $id){ //atualizando
		$afazer_Atualizar = Afazeres::find($id); //pegando o produto a atualizar
		$afazer_Atualizar->texto = $request->afazerAtualizado;

		$update = $afazer_Atualizar->save(); //atualizando
		//redirecionando de acordo com o resultado do update
		return redirect('/'); 
	}

	public function salvaNotas(UsuarioRequest $request){ //atualizando
		$usuario = Usuarios::find(\Request::session()->get('id_usuario')); //pegando o produto a atualizar
		$usuario->notas = $request->notas;

		$update = $usuario->save(); //atualizando
		//redirecionando de acordo com o resultado do update
		return redirect('/'); 
	}

	public function acoesRecentes()
	{
		return view('acoesrecentes');
	}

	public function getAcoesRecentes()
    {
		$files = DB::select('select a.*, b.nome from acoes_recentes a, usuarios b where a.id_usuario = b.id;');
		return Datatables::of($files)->make(true);
    }

	// -- FIM DOS AFAZERES -- //



	// -- CARREGEMENTOS AJAX DA PAGINA INICIAL -- //

    // == SESSAO ADMINISTRADOR GERAL == //
	public function acoesRecentesUsuarios() // ADM - Ver todas as acoes recentes
	{
		$acoesRecentes = '';
		$acoesRecentes = DB::select('select a.*, b.foto, b.nome from acoes_recentes a, usuarios b where a.id_usuario = b.id order by created_at desc limit 4');
		return \Response::json($acoesRecentes);
	}

	public function carregaQuadradinhos(){ // ADM - Quadradinhos superior esquerdo
		$produtos_visualizados = DB::select('select count(*) as produtos_visualizados from vitrine.visualizacao_publicacao');
		$produtos_reservados = DB::select('select count(*) as produtos_reservados from vitrine.reservas_cliente');
		$totalClientes = DB::select('select count(*) as total_clientes from vitrine.clientes');
		$acessos = DB::select('select count(*) as acessos from vitrine.clientes where cliente_online = 1;');
		$compartilhamentos = DB::select('select count(*) as compartilhamentos from vitrine.compartilhamentos_publicacao;');			
		return \Response::json([$produtos_visualizados, $produtos_reservados, $totalClientes, $acessos, $compartilhamentos]);
	}

	public function totalClientesCadastrados() // ADM - Total de Participantes no app, por dia/semana e mes
	{
		// -- QUANTIDADE DE PARTICIPANTES CADASTRADOS NO DIA/SEMANA/MES-- //
		$clientesDia = DB::select("select count(*) as clientesDia from vitrine.clientes where MONTH(created_at) = MONTH(now()) and DAYOFMONTH(created_at) = ".date('j'));
		$clientesSemana = DB::select("select count(*) as clientesSemana from vitrine.clientes where WEEK (created_at ,0) = WEEK(NOW())");
		$clientesMes = DB::select("select count(*) as clientesMes from vitrine.clientes where MONTH(created_at) = MONTH(now())");

		return \Response::json([$clientesDia, $clientesSemana, $clientesMes]);
	}

	public function carregatop5Produtos() //Top 10 promocoes mais aderidas
	{
		$top5 = DB::select('select a.id, a.titulo, (select count(*) from visualizacao_publicacao where id_publicacao = a.id) as total from publicacoes a where a.excluido = 0 and a.dataFinal >= DATE_ADD(now(), INTERVAL -1 DAY) AND a.dataInicial <= DATE_ADD(now(), INTERVAL 0 DAY) order by total desc limit 5;'); //1 - PDV
		
		return \Response::json($top5);
	}


	public function carregaCalendario(){ //Grafico de linhas de Acessos por Dia no Mes Vigente
		$acessos = 0;
		$acessos_mes_atual = array();
		$contador = 1;
		//Repetindo até o ultimo dia do mes atual:
		for ($i=0; $i <= (cal_days_in_month(CAL_GREGORIAN, date('n'), date('Y')) - 1); $i++) { 
			//pegando a contagem de todos os cupons gerados no dia da repeticao:
			$dia_sql = DB::select('select count(*) as acessos from vitrine.acessos_clientes where MONTH(created_at) = '.date('n').' and DAYOFMONTH(created_at) = '.$contador);
			
			if (!is_null($dia_sql[0]->acessos)) {
				$acessos = $dia_sql[0]->acessos;
			}
			$acessos_mes_atual[$i] = [$contador, $acessos]; //concatenando com a variavel q acumula os valores
			$acessos = 0;
			$contador++;
		}

		return \Response::json($acessos_mes_atual);
	}


	// == SESSAO LOJAS == //

	public function acoesRecentesUsuariosLojas($id_loja) // Lojas - Ver todas as acoes recentes
	{
		$acoesRecentes = DB::select('select a.*, b.foto, b.nome from acoes_recentes a, usuarios b, lojas c where a.id_usuario = b.id and b.id_loja = c.id and c.id = '.$id_loja.'  order by created_at desc limit 4');
		return \Response::json($acoesRecentes);
	}

	public function carregaQuadradinhosLojas($id_loja) // Loja - Quadradinhos superior esquerdo
	{
		$produtos_visualizados = DB::select('select count(*) as produtos_visualizados from visualizacao_publicacao a inner join publicacoes b on a.id_publicacao = b.id inner join usuarios c on b.id_usuario = c.id INNER JOIN lojas d on c.id_loja = d.id and d.id = '.$id_loja);
		$produtos_compartilhados = DB::select('select count(*) as produtos_compartilhados from compartilhamentos_publicacao a inner join publicacoes b on a.id_publicacao = b.id inner join usuarios c on b.id_usuario = c.id INNER JOIN lojas d on c.id_loja = d.id and d.id = '.$id_loja);
		$total_reservas = DB::select('select count(*) as total_reservas from reservas_cliente a inner join publicacoes b on a.id_publicacao = b.id inner join usuarios c on b.id_usuario = c.id INNER JOIN lojas d on c.id_loja = d.id and d.id = '.$id_loja);
		return \Response::json([$produtos_visualizados, $produtos_compartilhados, $total_reservas]);
	}


	public function totalvisualizacoes($id_loja) // Loja - Total de visualizações no app, por dia/semana e mes
	{
		// -- QUANTIDADE DE PARTICIPANTES CADASTRADOS NO DIA/SEMANA/MES-- //
		$visualizacoesDia = DB::select("select count(*) as visualizacoesDia from visualizacao_publicacao a inner join publicacoes b on a.id_publicacao = b.id inner join usuarios c on b.id_usuario = c.id INNER JOIN lojas d on c.id_loja = d.id and d.id = ".$id_loja." and MONTH(a.created_at) = MONTH(now()) and DAYOFMONTH(a.created_at) = ".date('j'));
		$visualizacoesSemana = DB::select("select count(*) as visualizacoesSemana from visualizacao_publicacao a inner join publicacoes b on a.id_publicacao = b.id inner join usuarios c on b.id_usuario = c.id INNER JOIN lojas d on c.id_loja = d.id and d.id = ".$id_loja." and WEEK (a.created_at ,0) = WEEK(NOW());");
		$visualizacoesMes = DB::select("select count(*) as visualizacoesMes from visualizacao_publicacao a inner join publicacoes b on a.id_publicacao = b.id inner join usuarios c on b.id_usuario = c.id INNER JOIN lojas d on c.id_loja = d.id and d.id = ".$id_loja." and MONTH(a.created_at) = MONTH(now());");
		$visualizacoesTotal = DB::select("select count(*) as visualizacoesTotal from visualizacao_publicacao a inner join publicacoes b on a.id_publicacao = b.id inner join usuarios c on b.id_usuario = c.id INNER JOIN lojas d on c.id_loja = d.id and d.id = ".$id_loja);
		return \Response::json([$visualizacoesDia, $visualizacoesSemana, $visualizacoesMes,$visualizacoesTotal]);
	}

	public function mineracaopublicacoesativas($id_loja) // Loja - Mineração de dados das publicações ativas por loja
	{
		$dados_publicacao = DB::select("select distinct a.id, a.titulo, a.dataInicial, a.dataFinal, (select count(*) from visualizacao_publicacao where id_publicacao = a.id) as visualizacoes, (select count(*) from minha_lista where id_publicacao = a.id) as minha_lista, (select count(*) from compartilhamentos_publicacao where id_publicacao = a.id) as compartilhamentos, (select count(*) from compras_cliente where id_publicacao = a.id) as compras, (select count(*) from downloads_publicacao where id_publicacao = a.id) as downloads from publicacoes a inner join usuarios b on a.id_usuario = b.id inner join lojas c on b.id_loja = c.id and a.excluido = 0 and a.dataFinal >= DATE_ADD(now(), INTERVAL -1 DAY) AND a.dataInicial <= DATE_ADD(now(), INTERVAL 0 DAY) and c.id =".$id_loja." limit 10;");
		return \Response::json($dados_publicacao);
	}

	public function mineracaopublicacoesinativas($id_loja) // Loja - Mineração de dados das publicações inativas por loja
	{
		$dados_publicacao = DB::select("select distinct a.id, a.titulo, a.dataInicial, a.dataFinal, (select count(*) from visualizacao_publicacao where id_publicacao = a.id) as visualizacoes, (select count(*) from minha_lista where id_publicacao = a.id) as minha_lista, (select count(*) from compartilhamentos_publicacao where id_publicacao = a.id) as compartilhamentos, (select count(*) from compras_cliente where id_publicacao = a.id) as compras, (select count(*) from downloads_publicacao where id_publicacao = a.id) as downloads from publicacoes a inner join usuarios b on a.id_usuario = b.id inner join lojas c on b.id_loja = c.id and a.excluido = 0 and a.dataFinal < DATE_ADD(now(), INTERVAL -1 DAY) and c.id =".$id_loja." limit 10;");
		return \Response::json($dados_publicacao);
	}

	public function verdetalhespublicacao($id_publicacao, $listagem) // Loja - Listagem dos clientes que interagiram com a publicacao X
	{
		$id_publicacao = $id_publicacao;
		$listagem = $listagem;
		$publicacao = Publicacoes::where('id', $id_publicacao)->first();
		return view('verdetalhespublicacao', compact("id_publicacao", "publicacao", "listagem"));
	}

	public function getverdetalhespublicacao($id_publicacao, $listagem) // Loja - Listagem ajax dos clientes que interagiram com a publicacao X
	{
		$files = '';
		if ($listagem == 0) { // Ver Visualizações
			$files = DB::select("select distinct a.id, a.nome_razao_social, a.cpf_cnpj, a.email, a.created_at as data_cadastro, b.created_at as data_visualizacao from clientes a inner join visualizacao_publicacao b on a.id = b.id_cliente and b.id_publicacao = ".$id_publicacao.";");
		}elseif ($listagem == 1) { // Ver Minha Lista
			$files = DB::select("select distinct a.id, a.nome_razao_social, a.cpf_cnpj, a.email, a.created_at as data_cadastro, b.created_at as data_visualizacao from clientes a inner join minha_lista b on a.id = b.id_cliente and b.id_publicacao = ".$id_publicacao.";");
		}elseif ($listagem == 2) { // Ver Compartilhamentos
			$files = DB::select("select distinct a.id, a.nome_razao_social, a.cpf_cnpj, a.email, a.created_at as data_cadastro, b.created_at as data_visualizacao from clientes a inner join compartilhamentos_publicacao b on a.id = b.id_cliente and b.id_publicacao = ".$id_publicacao.";");
		}elseif ($listagem == 3) { // Ver E-Commerce (Compras)
			$files = DB::select("select distinct a.id, a.nome_razao_social, a.cpf_cnpj, a.email, a.created_at as data_cadastro, b.created_at as data_visualizacao from clientes a inner join compras_cliente b on a.id = b.id_cliente and b.id_publicacao = ".$id_publicacao.";");
		}elseif ($listagem == 4) { // Ver Downloads
			$files = DB::select("select distinct a.id, a.nome_razao_social, a.cpf_cnpj, a.email, a.created_at as data_cadastro, b.created_at as data_visualizacao from clientes a inner join downloads_publicacao b on a.id = b.id_cliente and b.id_publicacao = ".$id_publicacao.";");
		}
		
		return Datatables::of($files)->make(true);
	}

	public function classificacaopublicacoes($id_loja) // Loja - Quantificação dos Likes ou Unlikes das Publicações
	{
		$classificacao = DB::select("select a.titulo, (select count(*) from classificacao_publicacao where id_publicacao = a.id and curtiu = 1) as likes, (select count(*) from classificacao_publicacao where id_publicacao = a.id and curtiu = 0) as unlikes from publicacoes a inner join usuarios b on a.id_usuario = b.id inner join lojas c on b.id_loja = c.id and a.excluido = 0 and a.dataFinal >= DATE_ADD(now(), INTERVAL -1 DAY) AND a.dataInicial <= DATE_ADD(now(), INTERVAL 0 DAY) and c.id = ".$id_loja." order by a.titulo limit 10;");
		return \Response::json($classificacao);
	}

	public function reservaspublicacoes($id_loja) // Loja - Quantificação das Reservas das Publicações
	{
		$classificacao = DB::select("select a.titulo, (select count(*) from reservas_cliente where id_publicacao = a.id) as reservas from publicacoes a inner join usuarios b on a.id_usuario = b.id inner join lojas c on b.id_loja = c.id and a.excluido = 0 and a.dataFinal >= DATE_ADD(now(), INTERVAL -1 DAY) AND a.dataInicial <= DATE_ADD(now(), INTERVAL 0 DAY) and c.id = ".$id_loja." order by a.titulo limit 10;");
		return \Response::json($classificacao);
	}



	// == AMBOS == //	

	public function carregaSexos() //Grafico de Pizza com Total de participantes de cada sexo
	{
		//Pegando a quantidade de participantes de ambos os sexos:
		$homens = DB::select('select count(*) as homens from vitrine.clientes where sexo = 0');
		$mulheres = DB::select('select count(*) as mulheres from vitrine.clientes where sexo = 1');

		return \Response::json([$homens, $mulheres]);
	}

	public function carregaGraficoIdade() // Grafico com as Idades dos Participantes
	{
		$idade = DB::select('SELECT TIMESTAMPDIFF(YEAR, dataNasc, CURDATE()) as idade FROM vitrine.clientes');
		return \Response::json($idade);
	}


	// -- FIM CARREGAMENTOS INDEX AJAX -- //

	public function index() //Página inicial
	{
		// -- LISTAGEM DE AFAZERES -- //
		$listagemAfazeres = DB::select('select * from vitrine.afazeres where id_usuario = '.\Request::session()->get('id_usuario'));

		// -- NOTAS -- //
		$notas = DB::select('select notas from vitrine.usuarios where id = '.\Request::session()->get('id_usuario'));

		if (\Request::session()->get('permissao') == 0) {
			return view('index1',compact("listagemAfazeres", "notas"));
		}else{
			return view('indexloja',compact("listagemAfazeres", "notas"));
		}
	}

	public function indexlojaadm($id_loja) //Página inicial Lojas
	{
		$nome_loja = DB::select('select nome_loja from lojas where id = '.$id_loja);

		return view('indexlojaadm',compact("nome_loja"));
	}
		
}