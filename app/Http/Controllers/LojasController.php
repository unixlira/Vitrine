<?php 
namespace App\Http\Controllers; //obrigatorio a definicao do namespace do diretorio q contem as classes q vamos extender

use App\Http\Controllers\Controller; //chamando a classe extendida
use App\Http\Requests\UsuarioRequest; //classe de validacao
use Illuminate\Support\Facades\DB; //classe de comunicacao com o BD
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

use App\Lojas;
use App\Acoes; 
/**
* 
*/
class LojasController extends Controller
{
	public function __construct()
    {
        $this->middleware('autorizador'); //invocamos o middleware q verifica o login
    }

    public function listarlojas() //lista lojas ativas
	{
		return view('lojas/listarlojas');
	}

    public function getlojas($excluido) // chamad ajax da tabela lojas
    {
    	if ($excluido == 1) { 
    		$users = Lojas::where('excluido', 1);
			return Datatables::of($users)->make(true);
		}else{
    		$users = Lojas::where('excluido', 0);
			return Datatables::of($users)->make(true);
		}
    }

    public function novaloja() //tela de adicionar loja
	{
		return view('lojas/adicionarloja'); 	
	}

	public function lojasremovidas() //lista todas as lojas removidas
	{
		return view('lojas/listarlojasremovidas');
	}

	public function editarloja($id) // edita loja
	{		
		$loja = Lojas::find($id);
		return view('lojas/adicionarloja',compact("loja"));
	}

	public function salvarloja(Request $request){ //Salvando nova loja no BD
		
		$fileName = 'foto_perfil.png';
		$mapa = 'foto_perfil.png';

		if (\Request::hasFile('foto')) {
	        $file = $request->file('foto');
	        $fileName = rand(0,999999).uniqid(time()).rand(0,999999). "." . $file->getClientOriginalExtension();
	        $file->move(public_path('assets/img/lojas/'), $fileName);
	    }

	    if (\Request::hasFile('mapa')) { //testando se houve alteração da foto de perfil
	        $file = $request->file('mapa');
		    $mapa = rand(0,999999).uniqid(time()).rand(0,999999). "." . $file->getClientOriginalExtension();
	        $file->move(public_path('assets/img/mapas/'), $mapa);    			
	    }					

		$loja = new Lojas; //criando o objeto da classe q manupula o BD para a tabela usuarios
		$loja->foto = $fileName;
		$loja->mapa = $mapa;
		$loja->nome_loja = $request->nome_loja;
		$loja->piso = $request->piso;
		$loja->site = $request->site;
		$loja->email = $request->email;
		$loja->telefone = $request->telefone;
		$loja->excluido = 0;
		$loja->save(); //salvando o insert
		
		//registrando a ocorrencia na tabela acao:
		$acao = new Acoes;
		$acao->id_usuario = \Request::session()->get('id_usuario');
		$acao->acao = 'Cadastro de Nova Loja';
		$acao->link = 'lojas/listarlojas';
		$acao->save();
		return redirect('/lojas/listarlojas'); //após inserir, redireciona para a rota de listagem de usuarios e faz uma requisição nova ao servidor
				
	}

	public function atualizarloja(Request $request, $id)
	{		
		$loja = Lojas::find($id);
		$loja->nome_loja = $request->nome_loja;
		$loja->piso = $request->piso;
		$loja->site = $request->site;
		$loja->email = $request->email;
		$loja->telefone = $request->telefone;
		$loja->excluido = 0;

		//Verificando se houve upload de imagem:
		if (\Request::hasFile('foto')) {
	        $file = $request->file('foto');
	        if ($loja->foto != 'foto_perfil.png') {
	        	$fileName = $loja->foto;
	        }else{
		        $fileName = rand(0,999999).uniqid(time()).rand(0,999999). "." . $file->getClientOriginalExtension();	        	
	        }
	        $file->move(public_path('assets/img/lojas/'), $fileName);    
			$loja->foto = $fileName;
	    }

	    if (\Request::hasFile('mapa')) {
	        $file = $request->file('mapa');
	        if ($loja->mapa != 'foto_perfil.png') {
	        	$mapa = $loja->mapa;
	        }else{
		        $mapa = rand(0,999999).uniqid(time()).rand(0,999999). "." . $file->getClientOriginalExtension();
	        }
	        $file->move(public_path('assets/img/mapas/'), $mapa);
			$loja->mapa = $mapa;
	    }
	    $loja->save();

		//registrando a ocorrencia na tabela acao:
		$acao = new Acoes;
		$acao->id_usuario = \Request::session()->get('id_usuario');
		$acao->acao = 'Atualização de Dados da Loja';
		$acao->link = 'lojas/verloja/'.$id;
		$acao->save();

		return redirect('/lojas/verloja/'.$id);
	}

	public function excluirloja($id)
	{
		Lojas::where('id', $id)->update(array('excluido' => 1, 'updated_at' => date("Y-m-d H:i:s")));
		
		//registrando a ocorrencia na tabela acao:
		$acao = new Acoes;
		$acao->id_usuario = \Request::session()->get('id_usuario');
		$acao->acao = 'Exclusão de Loja';
		$acao->link = 'lojas/verloja/'.$id;
		$acao->save();

		return redirect('/lojas/listarlojas'); //redireciona para a listagem
	}

	public function restaurarloja($id)
	{
		Lojas::where('id', $id)->update(array('excluido' => 0));
		
		//registrando a ocorrencia na tabela acao:
		$acao = new Acoes;
		$acao->id_usuario = \Request::session()->get('id_usuario');
		$acao->acao = 'Reativação de Loja';
		$acao->link = 'lojas/verloja/'.$id;
		$acao->save();

		return redirect('/lojas/listarlojas'); //redireciona para a listagem
	}
}