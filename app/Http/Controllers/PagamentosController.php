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

    public function financeiro(Request $request, $user){
        
        $user = Usuarios::find(\Request::session()->get('id_usuario'));
        $planos = Pedidos::where('id_usuario', '=', $user->id)->get();
        $acao = "pagamentos/updateFinanceiro";

        return view('pagamentos.financeiro',compact('request','user','planos','acao'));
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
        $plano->forma_pgto = $request->radio == 'Cartao de Credito' ? 'Cartao de Credito' : 'Boleto Bancario' ;
		$plano->nome_cartao = $request->nome_cartao;
		$plano->numero_cartao = $request->numero_cartao;
		$plano->mes_cartao = $request->mes_cartao;
		$plano->ano_cartao = $request->ano_cartao;
        $plano->cvv_cartao = $request->cvv_cartao;
        $plano->save(); //salvando o insert

        return redirect('/pagamentos/financeiro/'.$user->id);
        
    }

    public function cancelamento(Request $request, $id){

        $user = Usuarios::find(\Request::session()->get('id_usuario'));
        $planos = Pedidos::where('id_usuario', '=', $user->id)->get();
        return view('pagamentos.cancelamento', compact('user','request', 'planos'));

    }
    
    public function editarPlano($id){
        
        $usuario = Usuarios::find($id);
        $financeiro = array();
        $financeiro = new Pedidos;

    }

    public function deletePlano(Request $request, $id){

        $user = Usuarios::find(\Request::session()->get('id_usuario'));

        $plano = Pedidos::findOrFail($id);
        $plano->delete();

        return redirect('/pagamentos/financeiro/'.$user->id);
    }
		
}