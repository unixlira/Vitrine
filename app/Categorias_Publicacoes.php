<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorias_Publicacoes extends Model
{
    protected $table = 'categorias_publicacoes';

    public $timestamps = true;

    public function categorias(){
        return $this->belongsTo('App\Usuarios', 'id_usuario', 'id');
    }
}
