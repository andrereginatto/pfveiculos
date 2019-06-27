<?php

namespace App\Http\Controllers;

use App\Vendedor;
use Illuminate\Http\Request;
use App\Http\Requests\VendedorRequest;

class VendedoresController extends Controller
{
    public function index(Request $filtro) {
        $filtragem = $filtro->get('filtragem');
        if($filtragem == null){
            $vendedores = Vendedor::orderBy('nome')->paginate(3);
        }else{
            $vendedores = Vendedor::where('nome','like','%'.$filtragem.'%')->orWhere('sobrenome','like','%'.$filtragem.'%')->orderBy('nome')->paginate(3);
        }
        return view('vendedores.index', ['vendedores'=>$vendedores]);
    }

    public function create() {
        return view('vendedores.create');
    }

    public function store(VendedorRequest $request) {
    	$novo_vendedor = $request->all();
    	Vendedor::create($novo_vendedor);
    	
        return redirect()->route('vendedores');
    }

    public function destroy($id) {
        try{
            Vendedor::find($id)->delete();
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
        $vendedor = Vendedor::find($id);
        return view('vendedores.edit', compact('vendedor'));
    }

    public function update(VendedorRequest $request, $id) {
        Vendedor::find($id)->update($request->all());
        return redirect()->route('vendedores');    
    }
}
