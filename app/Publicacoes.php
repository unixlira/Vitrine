<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publicacoes extends Model
{
    protected $table = 'publicacoes'; //definindo a tabela do BD que a classe vai gerenciar

    public $timestamps = true; //desabilitando controle de data e hora de manipulação dos registros

    //relacionamentos
    public function usuarios(){
        //informando o Model q existe uma relacao do CNPJ com Usuario:
        return $this->belongsTo('App\Usuarios', 'id_usuario', 'id'); //('model', 'chave_estrangeira', 'valor')
        //hasMany indica q a cardinalidade é de 1:n (um cnpj tem varios usuarios)
    }

}
