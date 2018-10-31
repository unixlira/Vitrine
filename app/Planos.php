<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Planos extends Model
{
    protected $table = 'planos';

    public $timestamps = true;
   

    protected $fillable = array( 'id', 'id_usuario', 'id_plano','nome', 'preco', 'created_at', 'updated_at');

    public function usuarios(){
        
        return $this->belongsTo('App\Usuarios', 'id_usuario', 'id'); //('model', 'chave_estrangeira', 'valor')
        
    }

    public function pedidos(){
        
        return $this->belongsTo('App\Planos', 'id_plano', 'id'); //('model', 'chave_estrangeira', 'valor')
        
    }
}
