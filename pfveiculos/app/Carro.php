<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carro extends Model
{
    protected $fillable = ['modelo','cor','ano','ano_modelo','marca_id'];

    public function marca() {
        return $this->belongsTo('App\Marca');
    }

    public function pedidos() {
        return $this->hasMany('App\Pedido');
    }
}
