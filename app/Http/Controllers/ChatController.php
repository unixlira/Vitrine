<?php 
namespace App\Http\Controllers; //obrigatorio a definicao do namespace do diretorio q contem as classes q vamos extender

use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller; //chamando a classe extendida
use Illuminate\Support\Facades\DB; //classe de comunicacao com o BD
use View;
use App\Chat;

class ChatController extends Controller
{
	public function __construct()
    {
        $this->middleware('autorizador'); //invocamos o middleware q verifica o login
    }
	
	public function carregaContatos(){
		//Pegando Lista de Contatos do BD select a.id, a.nome, a.status_chat, b.id_destinatario, b.id_usuario from usuarios a left join chat b on a.id = b.id_usuario and b.created_at = b.updated_at and b.id_destinatario =1 group by a.id order by a.status_chat desc, a.nome asc
		$contatos = DB::select('select a.id, a.nome, a.status_chat, b.id_destinatario, b.id_usuario from usuarios a left join chat b on a.id = b.id_usuario and b.created_at = b.updated_at and b.id_destinatario ='.\Request::session()->get("id_usuario").' group by a.id, a.nome, a.status_chat, b.id_destinatario, b.id_usuario order by a.status_chat desc, a.nome asc;');
		return \Response::json($contatos);
	}
	
	public function carregaMensagens($id,$destinatario){
		//Pegando Lista de Contatos do BD
		$mensagens = DB::select('select * from appnagumo.chat where id_usuario in('.$id.','.$destinatario.') and id_destinatario in('.$id.','.$destinatario.')');
		return \Response::json($mensagens);
	}
	
	public function visualizarMensagem($id,$destinatario){
		//Atualizando updated_at (visualizou) onde o usuario logado é o destinatario:
		Chat::where('id_usuario', $destinatario)->where('id_destinatario', $id)->update(array('updated_at' => date('Y-m-d H:i:s')));
		return \Response::json(array('success' => true));
	}
		
	public function enviaMensagem(Request $request){
		//enviando mensagem:
		$mensagem = new Chat;
		$mensagem->id_usuario = $request->id_usuario;	
		$mensagem->id_destinatario = $request->id_destinatario;
		$mensagem->mensagem = $request->mensagem; 
		$mensagem->save();

    	return \Response::json(array('success' => true));
	}
}