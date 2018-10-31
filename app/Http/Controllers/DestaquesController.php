<?php 
namespace App\Http\Controllers; //obrigatorio a definicao do namespace do diretorio q contem as classes q vamos extender

use App\Http\Controllers\Controller; //chamando a classe extendida
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; //classe de comunicacao com o BD
use Yajra\Datatables\Datatables;
//use Request;
use App\Destaques;
use App\Imagens_Destaque;
use App\Acoes;
/**
* 
*/
class DestaquesController extends Controller
{
	public function __construct()
    {
        $this->middleware('autorizador'); //invocamos o middleware q verifica o login
    }

	public function listardestaques() //leva para a tela de Novo Destaque
	{
		return view('destaques/listardestaques');
	}

	public function getdestaques()
    {
    	$files = DB::select('select a.*, b.nome from destaques a inner join usuarios b on a.id_usuario = b.id and a.excluido = 0;');
		return Datatables::of($files)->make(true);
    }

	public function novodestaque() //leva para a tela de Novo Destaque
	{
		return view('destaques/novodestaque');
	}

	public function salvardestaque(Request $request)
	{
		//salvando no BD:
	    $destaque = new Destaques;

		$imagem = $request->file('imagem');
		$fileName = 'foto_perfil.png';
    	if(!empty($imagem)):
			//fazendo upload ad arquivo original:
			$fileName = rand(0,999999).uniqid(time()).rand(0,999999). "." . $imagem->getClientOriginalExtension();
		    $imagem->move(public_path('assets/img/destaques/'), $fileName);
    	endif;
		$destaque->id_usuario = \Request::session()->get('id_usuario');
    	$destaque->imagem = $fileName;
    	$destaque->titulo = $request->titulo;
    	$destaque->excluido = 0;
    	$destaque->dataInicial = implode("-",array_reverse(explode("/",$request->dataInicial))); //invertendo de dd/mm/aaaa -> aaaa-mm-dd
    	$destaque->dataFinal = implode("-",array_reverse(explode("/",$request->dataFinal)));
		
    	$destaque->save();

    	//registrando o ocorrido nas acoes:
    	$acao = new Acoes;
		$acao->id_usuario = \Request::session()->get('id_usuario');
		$acao->acao = 'Cadastro de Novo Destaque';
		$acao->link = 'destaques/listardestaques';
		$acao->save();

    	return redirect('destaques/listardestaques');
	}

	public function atualizardestaque(Request $request, $id){// validando os valores e pegando o ID
		$destaque = Destaques::find($id); //pegando o publicacao a atualizar

    	$destaque->titulo = $request->titulo;
    	$destaque->dataInicial = implode("-",array_reverse(explode("/",$request->dataInicial))); //invertendo de dd/mm/aaaa -> aaaa-mm-dd
    	$destaque->dataFinal = implode("-",array_reverse(explode("/",$request->dataFinal)));
		
		if (\Request::hasFile('imagem')) { //testando se houve alteração da imagem
	        $file = $request->file('imagem');
	        if ($destaque->imagem == 'foto_perfil.png') {
				$fileName = rand(0,999999).uniqid(time()).rand(0,999999). "." . $imagem->getClientOriginalExtension();
		    	$destaque->imagem = $fileName;
	        }else{
		        $fileName = $destaque->imagem;
		    }
	        $file->move(public_path('assets/img/destaques/'), $fileName);
	    }
		$destaque->save(); //atualizando
		
		//registrando a ocorrencia na tabela acao:
		$acao = new Acoes;
		$acao->id_usuario = \Request::session()->get('id_usuario');
		$acao->acao = 'Atualização de Destaque';
		$acao->link = 'destaques/destaques/'.$id;
		$acao->save();

		return redirect('destaques/listardestaques'); //redireciona para a listagem
	}

	public function verDestaque($id) //detalhes da oferta
	{		
		$destaque = Destaques::find($id);
		return view('destaques/novodestaque',compact("destaque"));
	}

	public function excluirdestaque($id)
	{
		Destaques::where('id', $id)->update(array('excluido' => 1));
		/*
		DB::table('ofertas_participantes')->where('id_oferta', '=', $id)->delete(); //removendo as ofertas_participantes

		$publicacao = Publicacoes::find($id); //fazendo select passando a clausula where usando funcao find
		if ($publicacao->imagem != 'foto_perfil.png') {
			unlink(public_path('assets/img/destaques/'.$publicacao->imagem)); //removendo a arquivo física		
		}
		$publicacao->delete();
		*/
    	//registrando o ocorrido nas acoes:
    	$acao = new Acoes;
		$acao->id_usuario = \Request::session()->get('id_usuario');
		$acao->acao = 'Exclusão de Destaque';
		$acao->link = 'destaques/listardestaques';
		$acao->save();

    	return redirect('destaques/listardestaques');
	}



	/* == IMAGENS DAS PROMOÇÕES DESTAQUE  ==*/



	public function listarimagensdestaque($id) //Listagem das imagens de um destaque
	{
		$destaque = Destaques::find($id);
		$id_destaque = $destaque->id;
		$titulo_destaque = $destaque->titulo;
		$qtde_imagens = Imagens_Destaque::where('id_destaque', $id)->count();
		return view('destaques/listarimagensdestaque', compact("id_destaque", "titulo_destaque", "qtde_imagens"));
	}

	public function getimagensdestaque($id)
    {
		$files = DB::select('select a.*, b.nome from imagens_destaque a inner join usuarios b on a.id_usuario = b.id and a.id_destaque = '.$id.';');
		return Datatables::of($files)->make(true);
    }

	public function novaimgdestaque($id) // tela de nova imagem de um destaque
	{
		$destaque = Destaques::find($id);
		$titulo_destaque = $destaque->titulo;
		$id_destaque = $id;
		return view('destaques/novaimgdestaque', compact("id_destaque", "titulo_destaque"));
	}

	public function salvarimgdestaque(Request $request, $id_destaque)
	{
	    $img_destaque = new Imagens_Destaque;

		$imagem = $request->file('imagem');
		$fileName = 'foto_perfil.png';
    	if(!empty($imagem)):
			//fazendo upload ad arquivo original:
			$fileName = rand(0,999999).uniqid(time()).rand(0,999999). "." . $imagem->getClientOriginalExtension();
		    $imagem->move(public_path('assets/img/imgdestaques/'), $fileName);
    	endif;
		$img_destaque->id_usuario = \Request::session()->get('id_usuario');
    	$img_destaque->id_destaque = $id_destaque;
    	$img_destaque->imagem = $fileName;
    	$img_destaque->texto = $request->texto;
		
    	$img_destaque->save();

    	//registrando o ocorrido nas acoes:
    	$acao = new Acoes;
		$acao->id_usuario = \Request::session()->get('id_usuario');
		$acao->acao = 'Cadastro de Nova Imagem Destaque';
		$acao->link = 'destaques/destaques/'.$id_destaque;
		$acao->save();

    	return redirect('destaques/listarimagensdestaque/'.$id_destaque);
	}

	public function atualizarimgdestaque(Request $request, $id){
		$img_destaque = Imagens_Destaque::find($id); //pegando o registro a atualizar
    	
    	$img_destaque->texto = $request->texto;
		
		if (\Request::hasFile('imagem')) { //testando se houve alteração da imagem
	        $file = $request->file('imagem');
	        if ($img_destaque->imagem == 'foto_perfil.png') {
				$fileName = rand(0,999999).uniqid(time()).rand(0,999999). "." . $imagem->getClientOriginalExtension();
		    	$img_destaque->imagem = $fileName;
	        }else{
		        $fileName = $img_destaque->imagem;
		    }
	        $file->move(public_path('assets/img/imgdestaques/'), $fileName);
	    }
		$img_destaque->save(); //atualizando
		
		//registrando a ocorrencia na tabela acao:
		$acao = new Acoes;
		$acao->id_usuario = \Request::session()->get('id_usuario');
		$acao->acao = 'Atualização de Imagem Destaque';
		$acao->link = 'destaques/verimgdestaque/'.$id;
		$acao->save();

		return redirect('destaques/listarimagensdestaque/'.$request->id_destaque); //redireciona para a listagem
	}

	public function verimgdestaque($id) //detalhes da oferta
	{		
		$imgdestaque = Imagens_Destaque::find($id);
		return view('destaques/novaimgdestaque',compact("imgdestaque"));
	}


	public function excluirimgdestaque($id_imgdestaque, $id_destaque)
	{
		$img_destaque = Imagens_Destaque::find($id_imgdestaque); //fazendo select passando a clausula where usando funcao find
		if ($img_destaque->imagem != 'foto_perfil.png') {
			unlink(public_path('assets/img/imgdestaques/'.$img_destaque->imagem)); //removendo a arquivo física		
		}
		$img_destaque->delete();

    	//registrando o ocorrido nas acoes:
    	$acao = new Acoes;
		$acao->id_usuario = \Request::session()->get('id_usuario');
		$acao->acao = 'Exclusão de Imagem Destaque';
		$acao->link = 'destaques/listarimagensdestaque/'.$id_destaque;
		$acao->save();

    	return redirect('destaques/listarimagensdestaque/'.$id_destaque);
	}

}