<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pedido;
use App\Http\Requests\PedidoRequest;
use App\CarroPedidos;

class PedidosController extends Controller
{
    public function index() {
        $pedidos = Pedido::orderBy('data')->paginate(3);
        return view('pedidos.index', ['pedidos'=>$pedidos]);
    }

    public function create() {
        return view('pedidos.create');
    }

    public function store(PedidoRequest $request) {
    	$novo_pedido = $request->all();
    	Pedido::create($novo_pedido);
    	
        return redirect()->route('pedidos');
    }

    public function destroy($id) {
        try{
            CarroPedidos::where('pedido_id',$id)->delete();
            Pedido::find($id)->delete();
            $ret = array('status'=>'ok', 'msg'=>"null");
          }catch (\Illuminate\Database\QueryException $e){
            $ret = array('status'=>'erro', 'msg'=>$e->getMessage());
          }
          catch (\PDOException $e) {
            $ret = array('status'=>'erro', 'msg'=>$e->getMessage());
          }
          return $ret;
    }

    public function edit($id) {
        $pedido = Pedido::find($id);
        return view('pedidos.edit', compact('pedido'));
    }

    public function update(PedidoRequest $request, $id) {
        Pedido::find($id)->update($request->all());
        return redirect()->route('pedidos');    
    }

    public function createmaster(){
        return view('pedidos.masterdetail');
    }

    public function masterdetail(Request $request){
        $pedido = Pedido::create([
            'data'=> $request->get('data'),
            'valor'=> $request->get('valor'),
            'tipo_pagamento'=> $request->get('tipo_pagamento'),
            'cliente_id'=> $request->get('cliente_id'),
            'vendedor_id'=> $request->get('vendedor_id')
        ]);

        $itens = $request->itens;
        foreach($itens as $key => $value){
            CarroPedidos::create([
                'pedido_id' => $pedido->id,
                'carro_id' => $itens[$key]
            ]);
        }
        return redirect()->route('pedidos');
    }

    public function geraPdf(){
        $pedidos = Pedido::all();

        $view = \View::make('pedidos.relatorio', ['pedidos' => $pedidos]);
        $html = $view->render();
        $pdf = \PDF::loadHTML($html)->setPaper('a4', 'landscape')->setWarnings(false)->save('PFVeiculos_pedidos.pdf');
        
        return $pdf->download('PFVeiculos_pedidos.pdf');
    }

}
