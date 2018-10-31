<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lojas extends Model
{
    protected $table = 'lojas'; //definindo a tabela do BD que a classe vai gerenciar

    public $timestamps = true; //desabilitando controle de data e hora de manipulação dos registros

    //necessário para descriminar quais campos serao aceitos q sejam add em massa, sem descricao individual:
    protected $fillable = array('nome_loja', 'telefone', 'foto', 'site', 'piso', 'mapa', 'email');
}
