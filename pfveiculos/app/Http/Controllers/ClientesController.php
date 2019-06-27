<?php

namespace App\Http\Controllers;

use App\Cliente;
use Illuminate\Http\Request;
use App\Http\Requests\ClienteRequest;

class ClientesController extends Controller
{
    public function index(Request $filtro) {
        $filtragem = $filtro->get('filtragem');
        if($filtragem == null){
            $clientes = Cliente::orderBy('nome')->paginate(3);
        }else{
            $clientes = Cliente::where('nome','like','%'.$filtragem.'%')->orWhere('sobrenome','like','%'.$filtragem.'%')->orderBy('nome')->paginate(3);
        }
        return view('clientes.index', ['clientes'=>$clientes]);
    }
    public function create() {
        return view('clientes.create');
    }

    public function store(ClienteRequest $request) {
    	$novo_cliente = $request->all();
    	Cliente::create($novo_cliente);
    	
        return redirect()->route('clientes');
    }

    public function destroy($id) {
        try{
            Cliente::find($id)->delete();
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
        $cliente = Cliente::find($id);
        return view('clientes.edit', compact('cliente'));
    }

    public function update(ClienteRequest $request, $id) {
        Cliente::find($id)->update($request->all());
        return redirect()->route('clientes');    
    }
}
