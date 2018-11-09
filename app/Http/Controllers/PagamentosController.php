<?php 
namespace App\Http\Controllers; //obrigatorio a definicao do namespace do diretorio q contem as classes q vamos extender

use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Http\Requests\UsuarioRequest; //classe de validacao
use App\Http\Controllers\Controller; //chamando a classe extendida
use Illuminate\Support\Facades\DB; //classe de comunicacao com o BD
use Yajra\Datatables\Datatables;
use View;
use Carbon\Carbon;
use Session;
use App\Usuarios;
use App\Planos;
use App\Pedidos;
use Symfony\Component\VarDumper\VarDumper;


class PagamentosController  extends Controller
{

    public function __construct()
    {
        $this->middleware('autorizador'); //invocamos o middleware q verifica o login
    }

    
	public function planos(Request $request){

        $planos = Planos::get();
        

        return view('pagamentos.planos',compact('request','planos'));
    }

    public function financeiro(){
        
        $user = Usuarios::find(\Request::session()->get('id_usuario'));
        $planos = Pedidos::where('id_usuario', '=', $user->id)->get();
        $acao = "/pagamentos/financeiro/renovacao_automatica/".$planos[0]->id;
        $editPagamento = "pagamentos/financeiro/editar/".$planos[0]->id;
        $alteraemail = "/pagamentos/financeiro/alteraemail/";

        return view('pagamentos.financeiro',compact('user','planos', 'acao', 'alteraemail', 'editPagamento'));
    }

    public function renovacao(Request $request,$id){

        
        $user = Usuarios::find(\Request::session()->get('id_usuario'));
        $plano = Pedidos::find($id);
        $plano->renovacao_auto = ($plano->renovacao_auto == 0)? 1 : 0;        
        $plano->save();

        return redirect('/pagamentos/financeiro');

    }

    public function alteraemail(Request $request){

        $user = Usuarios::find(\Request::session()->get('id_usuario'));
        Pedidos::where('id_usuario', $user->id)->update(array('email_fatura' => $request->email_fatura, 'updated_at' => date("Y-m-d H:i:s")));
        Usuarios::where('id', $user->id)->update(array('telefone' => $request->telefone, 'updated_at' => date("Y-m-d H:i:s")));

        return redirect('/pagamentos/financeiro');
    }



    public function formapagamento(Request $request, $id){

        $titulo = "Forma de Pagamento";
        $acao = "pagamentos/salvarPedido";
        $mensagem = 'Pedido efetuado com sucesso.';
        $usuario = Usuarios::find(\Request::session()->get('id_usuario'));
        $users = '';
        if(\Request::session()->get('id') == $usuario->id){
            return Datatables::of($users)->make(true);
        }
        $planos = Planos::where('id','=',$request->id)->get();

        //dd(\Request::session());
        return view('pagamentos.formapagamento',compact('request','planos', 'usuario','acao','users', 'titulo', 'mensagem'));
    }

    public function termos(){
        return view('pagamentos.termos');
    }

    public function salvarPedido(Request $request){ 
        
        $user = Usuarios::find(\Request::session()->get('id_usuario'));

        $plano = array();
		$plano = new Pedidos;
		$plano->id_usuario = \Request::session()->get('id_usuario');
        $plano->id_plano = $request->id_plano;
        if(isset($_POST['email_cadastrado'])){
            $plano->email_fatura = $request->email_cadastrado;
        }else{
            $plano->email_fatura = $request->email_fatura;
        }
        $plano->nome_plano = $request->nome_plano;             
        $plano->preco_plano = $request->preco_plano;             
        $plano->forma_pgto = $request->radio == '1' ? '1' : '2' ;
		$plano->nome_cartao = $request->nome_cartao;
		$plano->numero_cartao = $request->numero_cartao;
		$plano->mes_cartao = $request->mes_cartao;
		$plano->ano_cartao = $request->ano_cartao;
        $plano->cvv_cartao = $request->cvv_cartao;
        $plano->save(); //salvando o insert

        return redirect('/pagamentos/financeiro/');
        
    }

    
    public function editarPagamento(Request $request, $id){        
        
        $plano = Pedidos::find($id);

        if($request->radio == 2){

            $plano->forma_pgto = $request->radio == 1 ? 1 : 2 ;
            $plano->nome_cartao = null;
            $plano->numero_cartao = null;
            $plano->mes_cartao = null;
            $plano->ano_cartao = null;
            $plano->cvv_cartao = null;
            $plano->save();

        }else{

            $plano->forma_pgto = $request->radio == 1 ? 1 : 2 ;
            $plano->nome_cartao = $request->nome_cartao;
            $plano->numero_cartao = $request->numero_cartao;
            $plano->mes_cartao = $request->mes_cartao;
            $plano->ano_cartao = $request->ano_cartao;
            $plano->cvv_cartao = $request->cvv_cartao;
            $plano->save();

        }

        return redirect('/pagamentos/financeiro');
    }

    public function showPlano($id_plano)
    {
        $planos = Pedidos::find($id_plano);
        
        return response($planos);   
    }

    public function excluir($id){

        $user = Usuarios::find(\Request::session()->get('id_usuario'));
        $plano = Pedidos::find($id);
        $plano->delete();

        return redirect('/pagamentos/financeiro');
    }

    public function getPlanos()
    {
        $user = Usuarios::find(\Request::session()->get('id_usuario'));
        $planos = Pedidos::where('id_usuario', '=', $user->id)->get();     
        
        return Datatables::of($planos)->make(true);
    }
  
		
}