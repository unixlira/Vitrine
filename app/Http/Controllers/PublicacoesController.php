<?php 
namespace App\Http\Controllers; //obrigatorio a definicao do namespace do diretorio q contem as classes q vamos extender

use App\Http\Controllers\Controller; //chamando a classe extendida
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; //classe de comunicacao com o BD
use Yajra\Datatables\Datatables;
//use Request;
use App\Clientes;
use App\Publicacoes;
use App\Publicacoes_Clientes;
use App\Categorias_Publicacoes;
use App\Acoes;
/**
* 
*/
class PublicacoesController extends Controller
{
	public function __construct()
    {
        $this->middleware('autorizador'); //invocamos o middleware q verifica o login
    }


	public function novapublicacao() //leva para a tela de Nova Postagem
	{
		$categorias = Categorias_Publicacoes::all(); //pegando todos os usuarios ativos
		return view('publicacoes/novapublicacao', compact("categorias"));
	}

	public function publicacoesativas()
	{
		return view('publicacoes/publicacoesativas');
	}

	public function publicacoesinativas()
	{
		return view('publicacoes/publicacoesinativas');
	}

	public function publicacoesfuturas()
	{
		return view('publicacoes/publicacoesfuturas');
	}

	public function getPublicacoes()
    {
    	$files = '';
    	if (\Request::session()->get('permissao') == 0) {
			$files = DB::select('select a.*, c.categoria, d.nome from publicacoes a inner join usuarios d on a.id_usuario = d.id inner join categorias_publicacoes c on a.id_categoria = c.id and a.excluido = 0 and a.dataFinal >= DATE_ADD(now(), INTERVAL -1 DAY) AND a.dataInicial <= DATE_ADD(now(), INTERVAL 0 DAY);');
    	}else{
			$files = DB::select('select a.*, c.categoria, d.nome from publicacoes a inner join usuarios d on a.id_usuario = d.id and d.id_loja = '.\Request::session()->get('id_loja').' inner join categorias_publicacoes c on a.id_categoria = c.id and a.excluido = 0 and a.dataFinal >= DATE_ADD(now(), INTERVAL -1 DAY) AND a.dataInicial <= DATE_ADD(now(), INTERVAL 0 DAY);');
    	}

		return Datatables::of($files)->make(true);
    }

	public function getPublicacoesFuturas()
    {
    	$files = '';
    	if (\Request::session()->get('permissao') == 0) {
			$files = DB::select('select a.*, c.categoria, d.nome from publicacoes a inner join usuarios d on a.id_usuario = d.id inner join categorias_publicacoes c on a.id_categoria = c.id and a.excluido = 0 and a.dataInicial > DATE_ADD(now(), INTERVAL 0 DAY);');
    	}else{
			$files = DB::select('select a.*, c.categoria, d.nome from publicacoes a inner join usuarios d on a.id_usuario = d.id and d.id_loja = '.\Request::session()->get('id_loja').' inner join categorias_publicacoes c on a.id_categoria = c.id and a.excluido = 0 and a.dataInicial > DATE_ADD(now(), INTERVAL 0 DAY);');
    	}
		
		return Datatables::of($files)->make(true);
    }

	public function getPublicacoesInativas()
    {
    	$files = '';
    	if (\Request::session()->get('permissao') == 0) {
			$files = DB::select('select a.*, c.categoria, d.nome from publicacoes a inner join usuarios d on a.id_usuario = d.id inner join categorias_publicacoes c on a.id_categoria = c.id and a.excluido = 0 and a.dataFinal < DATE_ADD(now(), INTERVAL -1 DAY);');
    	}else{
			$files = DB::select('select a.*, c.categoria, d.nome from publicacoes a inner join usuarios d on a.id_usuario = d.id and d.id_loja = '.\Request::session()->get('id_loja').' inner join categorias_publicacoes c on a.id_categoria = c.id and a.excluido = 0 and a.dataFinal < DATE_ADD(now(), INTERVAL -1 DAY);');
    	}
		
		return Datatables::of($files)->make(true);
    }


	public function ordenacao() //leva para a tela de Nova Postagem
	{
		$dados = DB::SELECT('SELECT DISTINCT a.* FROM publicacoes a inner join usuarios b on a.id_usuario = b.id inner join lojas c on b.id_loja = a.id and a.excluido = 0 and a.id_usuario = '.\Request::session()->get('id_usuario').' and a.dataFinal >= DATE_ADD(now(), INTERVAL -1 DAY) AND a.dataInicial <= DATE_ADD(now(), INTERVAL 0 DAY) order by a.ordenacao;');
		return view('publicacoes/ordenacao', compact("dados"));
	}

	public function verClientesPublicacao($id) //lista todas as Publicações aderidas por um determinado Cliente
	{
		$id = $id;
		$cliente = Clientes::where('id', $id)->first(); //pegando o cliente
		
		return view('publicacoes/publicacoesclientes', compact("id", "cliente"));
	}

    public function getClientesPublicacao($id_publicacao) //Listagem ajax das Publicações aderids por um Cliente específico
    {
		$files = DB::SELECT('select a.* from clientes a inner join publicacoes_clientes b on b.id_cliente = a.id INNER join publicacoes c on b.id_publicacao = c.id and c.id ='.$id_publicacao.' group by a.id;');
		return Datatables::of($files)->make(true);
    }

	public function clientesdapublicacao($id) //lista todos os Clientes de uma determinada Publicacao
	{
		$id = $id;
		$publicacao = Publicacoes::where('id', $id)->first(); //pegando a Publicação
		
		return view('publicacoes/participantes', compact("id", "publicacao"));
		
	}

    public function getPublicacoesClientes($id) //Listagem ajax dos clientes que aderiram a uma publicacao
    {
		$files = DB::SELECT('select a.*, b.created_at as data_adesao, b.status_oferta, e.categoria, d.nome from publicacoes a inner join usuarios d on a.id_usuario = d.id inner join categorias_publicacoes e on a.id_categoria = e.id inner join publicacoes_clientes b on b.id_publicacao = a.id inner join clientes c on b.id_cliente = c.id and c.id = '.$id.';');
		return Datatables::of($files)->make(true);
    }

	public function salvarpublicacao(Request $request) //fazendo o upload de uma ou várias fotos
	{
		if (!$request->dataInicial || !$request->dataFinal) {
			return back();
		}
		//salvando no BD:
	    $publicacao = new Publicacoes;

		$fileName1 = 'foto_perfil.png';
		$fileName2 = 'foto_perfil.png';
		$fileName3 = 'foto_perfil.png';
		$imagens = $request->file('imagem');
    	if(!empty($imagens)){
    		$contador = 1;
			foreach($imagens as $imagem):
				//fazendo upload das imagens:
				if ($contador == 1) {
					$fileName1 = rand(0,999999).uniqid(time()).rand(0,999999). "." . $imagem->getClientOriginalExtension();
			    	$imagem->move(public_path('assets/img/publicacoes/'), $fileName1);
				}elseif ($contador == 2) {
					$fileName2 = rand(0,999999).uniqid(time()).rand(0,999999). "." . $imagem->getClientOriginalExtension();
			    	$imagem->move(public_path('assets/img/publicacoes/'), $fileName2);
				}else{
					$fileName3 = rand(0,999999).uniqid(time()).rand(0,999999). "." . $imagem->getClientOriginalExtension();
			    	$imagem->move(public_path('assets/img/publicacoes/'), $fileName3);
				}
		    	$contador++;
			endforeach;
    	}

		$publicacao->id_usuario = \Request::session()->get('id_usuario');
    	$publicacao->id_categoria = $request->id_categoria;
    	$publicacao->imagem1 = $fileName1;
    	$publicacao->imagem2 = $fileName2;
    	$publicacao->imagem3 = $fileName3;
    	$publicacao->titulo = $request->titulo;
    	$publicacao->descricao = $request->descricao;
    	$publicacao->referencias = $request->referencias;
    	$publicacao->preco = $request->preco;
    	$publicacao->disponibilidade = $request->disponibilidade;
    	$publicacao->link = $request->link;
    	$publicacao->excluido = 0;
    	$publicacao->dataInicial = implode("-",array_reverse(explode("/",$request->dataInicial))); //invertendo de dd/mm/aaaa -> aaaa-mm-dd
    	$publicacao->dataFinal = implode("-",array_reverse(explode("/",$request->dataFinal)));
		$publicacao->save();

    	//registrando o ocorrido nas acoes:
    	$acao = new Acoes;
		$acao->id_usuario = \Request::session()->get('id_usuario');
		$acao->acao = 'Cadastro de Nova Publicação';
		$acao->link = 'publicacoes/publicacoesativas';
		$acao->save();

    	//Retornando resposta JSON ao arquivo file_uploads.js
    	return redirect('publicacoes/publicacoesativas');
	}	

	public function atualizarpublicacao(Request $request, $id){// validando os valores e pegando o ID
		
		$publicacao = Publicacoes::find($id); //pegando o oferta a atualizar

    	$publicacao->id_categoria = $request->id_categoria;
    	$publicacao->titulo = $request->titulo;
    	$publicacao->descricao = $request->descricao;
    	$publicacao->referencias = $request->referencias;
    	$publicacao->preco = $request->preco;
    	$publicacao->disponibilidade = $request->disponibilidade;
    	$publicacao->link = $request->link;
    	$publicacao->dataInicial = implode("-",array_reverse(explode("/",$request->dataInicial))); //invertendo de dd/mm/aaaa -> aaaa-mm-dd
    	$publicacao->dataFinal = implode("-",array_reverse(explode("/",$request->dataFinal)));
		
		if (\Request::hasFile('imagem')) { //testando se houve alteração da imagem
			$imagens = $request->file('imagem');
    		$contador = 1;
			foreach($imagens as $imagem):
				//fazendo upload das imagens:
				if ($contador == 1) {
					if ($publicacao->imagem1 == 'foto_perfil.png') {
						$fileName1 = rand(0,999999).uniqid(time()).rand(0,999999). "." . $imagem->getClientOriginalExtension();
				    }else{
				        $fileName1 = $publicacao->imagem1;
				    }
					$imagem->move(public_path('assets/img/publicacoes/'), $fileName1);
				}elseif ($contador == 2) {
					if ($publicacao->imagem2 == 'foto_perfil.png') {
						$fileName2 = rand(0,999999).uniqid(time()).rand(0,999999). "." . $imagem->getClientOriginalExtension();
				    }else{
				        $fileName2 = $publicacao->imagem2;
				    }
					$imagem->move(public_path('assets/img/publicacoes/'), $fileName2);
				}else{
					if ($publicacao->imagem3 == 'foto_perfil.png') {
						$fileName3 = rand(0,999999).uniqid(time()).rand(0,999999). "." . $imagem->getClientOriginalExtension();
			        }else{
				        $fileName3 = $publicacao->imagem3;
				    }
				    $imagem->move(public_path('assets/img/publicacoes/'), $fileName3);
				}
		    	$contador++;
			endforeach;
	    }

		$publicacao->save(); //atualizando
		
		//registrando a ocorrencia na tabela acao:
		$acao = new Acoes;
		$acao->id_usuario = \Request::session()->get('id_usuario');
		$acao->acao = 'Atualização de Publicação';
		$acao->link = 'publicacoes/publicacoes/'.$id;
		$acao->save();

		return redirect('publicacoes/publicacoesativas'); //redireciona para a listagem
	}

	public function verPublicacao($id) //detalhes da oferta
	{		
		$publicacao = Publicacoes::find($id);
		$nome_loja = DB::select('select c.nome_loja from publicacoes a inner join usuarios b on a.id_usuario = b.id inner join lojas c on b.id_loja = c.id and a.id = '.$id.';');
		$categorias = Categorias_Publicacoes::all(); //pegando todas as categorias
		return view('publicacoes/novapublicacao',compact("publicacao", "categorias","nome_loja"));
	}

	public function excluirPublicacao($id)
	{
		Publicacoes::where('id', $id)->update(array('excluido' => 1));
		/*
		DB::table('ofertas_participantes')->where('id_oferta', '=', $id)->delete(); //removendo as ofertas_participantes

		$publicacao = Publicacoes::find($id); //fazendo select passando a clausula where usando funcao find
		if ($publicacao->imagem != 'foto_perfil.png') {
			unlink(public_path('assets/img/publicacoes/'.$publicacao->imagem)); //removendo a arquivo física		
		}
		$publicacao->delete();
		*/
    	//registrando o ocorrido nas acoes:
    	$acao = new Acoes;
		$acao->id_usuario = \Request::session()->get('id_usuario');
		$acao->acao = 'Exclusão de Publicação';
		$acao->link = 'publicacoes/publicacoesativas';
		$acao->save();

    	return redirect('publicacoes/publicacoesativas');
	}

	public function salvarSequencia(Request $request) //fazendo o upload de uma ou várias fotos
	{
		$c = 0;
		//Percorrendo o array de sequencias atualizando a ordenacao pelo ID
		for ($i=0; $i <= sizeof($request->sequencia) -1; $i++) { 
			Publicacoes::where('id', $request->sequencia[$i])->update(array('ordenacao' => $c));
			$c++;		
		}
		//registrando o ocorrido nas acoes:
    	$acao = new Acoes;
		$acao->id_usuario = \Request::session()->get('id_usuario');
		$acao->acao = 'Reordenação das Publicações';
		$acao->link = 'publicacoes/ordenacao';
		$acao->save();

		return \Response::json(array('success' => true));
	}
}