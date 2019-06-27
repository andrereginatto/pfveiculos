<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarroPedidos extends Model
{
    protected $fillable = ['carro_id','pedido_id'];

    public function carro(){
        return $this->belongsTo('App\Carro');
    }
}
