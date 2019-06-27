<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $fillable = ['data','valor','tipo_pagamento','cliente_id','vendedor_id'];

    public function vendedor() {
        return $this->belongsTo('App\Vendedor');
    }

    public function cliente() {
        return $this->belongsTo('App\Cliente');
    }

    public function carro() {
        return $this->belongsTo('App\Carro');
    }

    public function carro_pedidos(){
        return $this->hasMany('App\CarroPedidos');
    }
}
