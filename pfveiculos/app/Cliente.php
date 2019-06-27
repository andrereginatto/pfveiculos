<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = ['nome','sobrenome','cpf','telefone','aniver'];

    public function pedidos() {
        return $this->hasMany('App\Pedido');
    }
}
