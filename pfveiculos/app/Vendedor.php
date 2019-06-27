<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendedor extends Model
{
    protected $fillable = ['nome','sobrenome','cpf','telefone','aniver'];

    public function pedidos() {
        return $this->hasMany('App\Pedido');
    }
    
}
