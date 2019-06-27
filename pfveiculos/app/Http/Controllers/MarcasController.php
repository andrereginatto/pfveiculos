<?php

namespace App\Http\Controllers;

use App\Marca;
use Illuminate\Http\Request;
use App\Http\Requests\MarcaRequest;

class MarcasController extends Controller
{
    public function index(Request $filtro) {
        $filtragem = $filtro->get('filtragem');
        if($filtragem == null){
            $marcas = Marca::orderBy('nome')->paginate(3);
        }else{
            $marcas = Marca::where('nome','like','%'.$filtragem.'%')->orderBy('nome')->paginate(3);
        }
        return view('marcas.index', ['marcas'=>$marcas]);
    }

    public function create() {
        return view('marcas.create');
    }

    public function store(MarcaRequest $request) {
    	$nova_marca = $request->all();
    	Marca::create($nova_marca);
    	
        return redirect()->route('marcas');
    }

    public function destroy($id) {
        try{
            Marca::find($id)->delete();
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
        $marca = Marca::find($id);
        return view('marcas.edit', compact('marca'));
    }

    public function update(MarcaRequest $request, $id) {
        Marca::find($id)->update($request->all());
        return redirect()->route('marcas');    
    }
}
