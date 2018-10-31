<?php 
namespace App\Http\Controllers; //obrigatorio a definicao do namespace do diretorio q contem as classes q vamos extender

use App\Http\Controllers\Controller; //chamando a classe extendida
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; //classe de comunicacao com o BD
use Yajra\Datatables\Datatables;
//use Request;
use App\NotificacoesApp;
use App\Acoes;
/**
* 
*/
class NotificacoesAppController extends Controller
{
	public function __construct()
    {
        $this->middleware('autorizador'); //invocamos o middleware q verifica o login
    }


	public function notificacoes() //leva para a tela de Nova Postagem
	{
		return view('notificacoesapp/notificacoes');
	}

	public function getNotificacoesApp()
    {
		$files = DB::table('notificacoesapp')->join('usuarios', 'notificacoesapp.id_usuario', '=', 'usuarios.id')->select('notificacoesapp.*', 'usuarios.nome');
		return Datatables::of($files)->make(true);
    }

    public function salvarTexto(Request $request) //fazendo o upload de uma ou várias fotos
    {
        $texto = new NotificacoesApp;
        $texto->id_usuario = \Request::session()->get('id_usuario');
        $texto->texto = $request->texto;
        $texto->save();

        //registrando o ocorrido nas acoes:
        $acao = new Acoes;
        $acao->id_usuario = \Request::session()->get('id_usuario');
        $acao->acao = 'Criação de Notificação';
        $acao->link = 'notificacoesapp/notificacoes';
        $acao->save();
     
        // -- ENVIANDO NOTIFICACAO AO ONESIGNAL -- //
        $response               = $this->sendMessage($request);
        $return["allresponses"] = $response;
        $return                 = json_encode($return);

        return redirect('notificacoesapp/notificacoesapp');
        /*
        print("\n\nJSON de Resposta:\n");
        print($return);
        print("\n");
        die();
        */
    }

    public function sendMessage($request) {
        $content      = array(
            "en" => "$request->texto"
        );
        $hashes_array = array();
        array_push($hashes_array, array(
            "id" => "like-button",
            "text" => "Like",
            "icon" => "http://i.imgur.com/N8SN8ZS.png",
            "url" => "http://dashboard-magictv.com.br"
        ));
        array_push($hashes_array, array(
            "id" => "like-button-2",
            "text" => "Like2",
            "icon" => "http://i.imgur.com/N8SN8ZS.png",
            "url" => "http://dashboard-magictv.com.br"
        ));
        $fields = array(
            'app_id' => "6073172c-5a5f-4d08-a5f6-43ca72a3171d",
            /*'included_segments' => array(
                'All'
            ), */
            'include_player_ids' => array("e456234d-25b1-4274-a93b-52def19d97d1"),
            'data' => array(
                "foo" => "bar"
            ),
            'contents' => $content,
            'web_buttons' => $hashes_array
        );
        
        $fields = json_encode($fields);
        print("\nJSON sent:\n");
        print($fields);
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json; charset=utf-8',
            'Authorization: Basic YjYyZGZmNmQtMGVmYS00NTYzLWE5MjUtMmY0NTU1ZTE5Nzll'
        ));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        
        $response = curl_exec($ch);
        curl_close($ch);
        
        return $response;
    }

    


    /*
    public function salvarTexto(Request $request) //fazendo o upload de uma ou várias fotos
	{
		
		$texto = new NotificacoesApp;
		$texto->id_usuario = \Request::session()->get('id_usuario');
		$texto->titulo = $request->titulo;
		$texto->texto = $request->texto;
		$texto->save();

		//registrando o ocorrido nas acoes:
    	$acao = new Acoes;
		$acao->id_usuario = \Request::session()->get('id_usuario');
		$acao->acao = 'Criação de Notificação';
		$acao->link = 'notificacoesapp/notificacoes';
		$acao->save();
		
		// -- ENVIANDO NOTIFICACAO AO FIREBASE -- //
    	
	    $mPushNotification = array();
	    $mPushNotification['data']['title'] = $request->texto;
	    //$mPushNotification['data']['message'] = $request->message;
	    $mPushNotification['data']['body'] = $request->message;
	 
	    //Pegando todos os Tokens dos aparelhos do BD:
	    $devicetoken = DB::table('participantes')->select('token')->where('token','!=','')->get();
	    
	    //Enviando a cada 1000 tokens, limite do firebase:
	    if (count($devicetoken) > 1000) {
	    	$splitTokens = array_chunk($devicetoken, 1000);
		    //Da um looping no array dividido e envia em lotes de 1000, detalhe: o último lote pode conter menos:
		    foreach($splitTokens as $tokens) {
		        $resultado = enviar_notificacao($tokens,$data);
		    }
	    }else{
		    //Enviando a notificacao e mostrando o resultado: 
		    $resultado = enviar_notificacao($devicetoken, $mPushNotification);	    	
	    }


    	//Retornando resposta JSON ao arquivo file_uploads.js
    	//return redirect('notificacoesapp/notificacoes');
	}

	// --------------------------------------------------------- //
	// -- INTERAÇÃO COM FIREBASE, ENVIO DE PUSH NOTIFICATIONS -- //
	// --------------------------------------------------------- //

	private function enviar_notificacao($registration_ids, $message) {
        $fields = array(
            'registration_ids' => $registration_ids,
            //'to' => $registration_ids,
            'data' => $message
            //'body' => $message
        );
        return $this->sendPushNotification($fields);
    }
    
    
     //Funcao que envia a mensagem a URL do firebase:
    
    private function sendPushNotification($fields) {

        //URL do servidor do firebase
        $url = 'https://fcm.googleapis.com/fcm/send';
 
        //montando o cabeçalho da requisicao
        $headers = array(
            'Authorization: key=' . FIREBASE_API_KEY,
            'Content-Type: application/json'
        );
 
        //Iniciando o cURL para começar a requisicao
        $ch = curl_init();
 
        //setando a URL
        curl_setopt($ch, CURLOPT_URL, $url);
        
        //setando metodo POST
        curl_setopt($ch, CURLOPT_POST, true);
 
        //Adicionando cabeçalhos 
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
 
        //desabilitando suporte ssl
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        
        //adicionando os campos no formato JSON 
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
 
        //executando a requisicao cURL
        $result = curl_exec($ch);
        if ($result === FALSE) {
            die('Curl failed: ' . curl_error($ch));
        }
 
        //Fechando a conexao
        curl_close($ch);
 
		//Retornando o resultado 
        return $result;
    }
    */
}