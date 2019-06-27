<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Carro;
use App\Http\Requests\CarroRequest;

class CarrosController extends Controller
{   
    public function index_site(Request $filtro) {
        $filtragem = $filtro->get('filtragem');
        if($filtragem == null){
            $carros = Carro::orderBy('modelo')->paginate(3);
        }else{
            $carros = Carro::where('modelo','like','%'.$filtragem.'%')->orWhere('cor','like','%'.$filtragem.'%')->orderBy('modelo')->paginate(3);
        }
        return view('welcome', ['carros'=>$carros]);
    }
    
    public function index(Request $filtro) {
        $filtragem = $filtro->get('filtragem');
        if($filtragem == null){
            $carros = Carro::orderBy('modelo')->paginate(3);
        }else{
            $carros = Carro::where('modelo','like','%'.$filtragem.'%')->orWhere('cor','like','%'.$filtragem.'%')->orderBy('modelo')->paginate(3);
        }
        return view('carros.index', ['carros'=>$carros]);
    }

    public function create() {
        return view('carros.create');
    }

    public function store(CarroRequest $request) {
    	$novo_carro = $request->all();
    	Carro::create($novo_carro);
    	
        return redirect()->route('carros');
    }

    public function destroy($id) {
        try{
            Carro::find($id)->delete();
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
        $carro = Carro::find($id);
        return view('carros.edit', compact('carro'));
    }

    public function update(CarroRequest $request, $id) {
        Carro::find($id)->update($request->all());
        return redirect()->route('carros');    
    }

    public function geraPdf(){
        $carros = Carro::all();

        $view = \View::make('carros.relatorio', ['carros' => $carros]);
        $html = $view->render();
        $pdf = \PDF::loadHTML($html)->setPaper('a4', 'landscape')->setWarnings(false)->save('PFVeiculos_carros.pdf');
        
        return $pdf->download('PFVeiculos_carros.pdf');
    }
}
