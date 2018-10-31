<?php 
namespace App\Http\Controllers; //obrigatorio a definicao do namespace do diretorio q contem as classes q vamos extender

use App\Http\Controllers\Controller; //chamando a classe extendida
use Illuminate\Support\Facades\DB; //classe de comunicacao com o BD
use Request;
use Session;
use App\Clientes;
use App\Acoes;
use Yajra\Datatables\Datatables;

/**
* 
*/
class ClientesController extends Controller
{
	public function __construct()
    {
        $this->middleware('autorizador'); //invocamos o middleware q verifica o login
    }
    
    //-- CLIENTES --//
    
    public function clientescadastrados() // tela de listagem dos clientes (Habilitados)
	{
		return view('clientes/clientescadastrados'); 	
	}

	public function clientesbloqueados() // tela de listagem dos clientes (Bloqueados)
	{
		return view('clientes/clientescadastrados');
	}

    public function getClientes($habilitado)
    {
    	if ($habilitado == 1) { //participantes habilitados
    		$users = Clientes::where('habilitado', 1);
			//$users = DB::table('participantes')->where('habilitado', 1);
			return Datatables::of($users)->make(true);
		}else{ //participantes bloqueados
			$users = DB::table('clientes')->join('usuarios', 'clientes.id_usuario', '=', 'usuarios.id')->select('clientes.*', 'usuarios.nome')->where('habilitado', 0);
			return Datatables::of($users)->make(true);
		}
    }

	public function detalhescliente($id) //lista todos os participantes cadastrados
	{		
		$cliente = Clientes::find($id); //fazendo select passando a clausula where usando funcao find
		$id_cliente = $id;
		return view('clientes/detalhescliente',compact("cliente", "id_cliente"));
	}

	public function bloquearclientedireto(Request $request, $id)// validando os valores e pegando o ID
	{
		Clientes::where('id', $id)->update(array('habilitado' => 0, 'id_usuario' => \Request::session()->get('id_usuario')));

		//registrando a ocorrencia na tabela acao:
		$acao = new Acoes;
		$acao->id_usuario = \Request::session()->get('id_usuario');
		$acao->acao = 'Bloqueio de Cliente';
		$acao->link = 'clientes/detalhescliente/'.$request->id;
		$acao->save();

		//redirecionando de acordo com o resultado do update
		return redirect('/clientes/clientescadastrados'); //redireciona para a listagem
	}

	public function habilitarclientedireto(Request $request, $id)// validando os valores e pegando o ID
	{
		Clientes::where('id', $id)->update(array('habilitado' => 1,'id_usuario' => \Request::session()->get('id_usuario')));

		//registrando a ocorrencia na tabela acao:
		$acao = new Acoes;
		$acao->id_usuario = \Request::session()->get('id_usuario');
		$acao->acao = 'Desbloqueio de Cliente';
		$acao->link = 'clientes/detalhescliente/'.$id;
		$acao->save();

		//redirecionando de acordo com o resultado do update
		return redirect('/clientes/clientesbloqueados'); //redireciona para a listagem
	}

	public function bloquearcliente(Request $request, $id)// validando os valores e pegando o ID
	{
		Clientes::where('id', $id)->update(array('habilitado' => 0, 'id_usuario' => \Request::session()->get('id_usuario'), 'observacoes' => $request->observacoes));

		//registrando a ocorrencia na tabela acao:
		$acao = new Acoes;
		$acao->id_usuario = \Request::session()->get('id_usuario');
		$acao->acao = 'Bloqueio de Cliente';
		$acao->link = 'clientes/detalhescliente/'.$request->id;
		$acao->save();

		//redirecionando de acordo com o resultado do update
		return redirect('/clientes/clientescadastrados'); //redireciona para a listagem
	}

	public function habilitarcliente(Request $request, $id)// validando os valores e pegando o ID
	{
		Clientes::where('id', $id)->update(array('habilitado' => 1, 'id_usuario' => \Request::session()->get('id_usuario'), 'observacoes' => $request->observacoes));

		//registrando a ocorrencia na tabela acao:
		$acao = new Acoes;
		$acao->id_usuario = \Request::session()->get('id_usuario');
		$acao->acao = 'Desbloqueio de Cliente';
		$acao->link = 'clientes/detalhescliente/'.$id;
		$acao->save();

		//redirecionando de acordo com o resultado do update
		return redirect('/clientes/clientescadastrados'); //redireciona para a listagem
	}
}