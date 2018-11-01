<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedidos extends Model
{
    protected $table = 'pedidos_planos'; //definindo a tabela do BD que a classe vai gerenciar

    public $timestamps = true; //desabilitando controle de data e hora de manipulação dos registros

    //necessário para descriminar quais campos serao aceitos q sejam add em massa, sem descricao individual:
    protected $fillable = array( 'id', 'id_usuario', 'id_plano','nome_plano', 'preco_plano','email_fatura', 'forma_pgto', 'bandeira_cartao', 'nome_cartao', 'numero_cartao', 'mes_cartao', 'ano_cartao', 'cvv_cartao', 'renovacao_auto', 'created_at', 'updated_at');

    public function usuarios(){
        //informando o Model q existe uma relacao do plano com Usuario:
        return $this->belongsTo('App\Usuarios', 'id_usuario', 'id'); //('model', 'chave_estrangeira', 'valor')
        //hasMany indica q a cardinalidade é de 1:n (um plano tem varios usuarios)
    }

    public function planos(){
        //informando o Model q existe uma relacao do plano com Usuario:
        return $this->belongsTo('App\Planos', 'id_plano', 'id'); //('model', 'chave_estrangeira', 'valor')
        //hasMany indica q a cardinalidade é de 1:n (um plano tem varios usuarios)
    }
}
