<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publicacoes_Clientes extends Model
{
    protected $table = 'publicacoes_clientes'; //definindo a tabela do BD que a classe vai gerenciar

    public $timestamps = true; //desabilitando controle de data e hora de manipulação dos registros

    //relacionamentos
    public function publicacoes(){
        //informando o Model q existe uma relacao do CNPJ com Usuario:
        return $this->belongsTo('App\Publicacoes', 'id_publicacao', 'id'); //('model', 'chave_estrangeira', 'valor')
        //hasMany indica q a cardinalidade é de 1:n (um cnpj tem varios usuarios)
    }

    public function clientes(){
        //informando o Model q existe uma relacao do CNPJ com Usuario:
        return $this->belongsTo('App\Clientes', 'id_clientes', 'id'); //('model', 'chave_estrangeira', 'valor')
        //hasMany indica q a cardinalidade é de 1:n (um cnpj tem varios usuarios)
    }
}
