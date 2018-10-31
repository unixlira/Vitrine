<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    protected $table = 'clientes'; //definindo a tabela do BD que a classe vai gerenciar

    public $timestamps = true; //desabilitando controle de data e hora de manipulação dos registros

    //relacionamentos
    /*
    public function participantes_block(){
    	return $this->hasOne('App\Participantes_block','id_participante', 'id'); //informando o Model q existe uma relacao do produto com a categoria
    }
    */
    public function usuarios(){
        //informando o Model q existe uma relacao do CNPJ com Usuario:
        return $this->belongsTo('App\Usuarios', 'id_usuario', 'id'); //('model', 'chave_estrangeira', 'valor')
        //hasMany indica q a cardinalidade é de 1:n (um cnpj tem varios usuarios)
    }
}
