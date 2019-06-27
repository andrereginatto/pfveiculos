@extends('adminlte::default')
@section('content')
    <div class="container-fluid">
        <h1>Editar Pedido: {{$pedido->id}}</h1>
        <ul class="alert alert-danger" style="display:none;" id="bloco_erro">
        </ul>
        @if($errors->any())
            <ul class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        
        {!! Form::open(['route'=>["pedidos.update", $pedido->id], 'method'=>'put','onSubmit'=>'return valida_form();']) !!}
        

        <div class="form-group">
            {!! Form::label('data', 'Data: ') !!}
            {!! Form::date('data', $pedido->data, ['class'=>'form-control']) !!}
        </div>
        
        <div class="form-group">
            {!! Form::label('valor', 'Valor: ') !!}
            {!! Form::Number('valor', $pedido->valor, ['class'=>'form-control','min'=>'1','max'=>'200000']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('tipo_pagamento', 'Tipo Pagamento:') !!}
            {!! Form::select('tipo_pagamento', 
                array('Dinheiro'=>'Dinheiro', 'Credito'=>'Credito',
                      'Débito'=>'Débito', 'Cheque'=>'Cheque'),
                      $pedido->tipo_pagamento, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('vendedor_id', 'Vendedor') !!}
            {{ Form::select('vendedor_id', \App\Vendedor::orderBy('nome')->pluck('nome', 'id')->toArray(), $pedido->vendedor_id, ['class'=>'form-control','required']) }}
        </div>

        <div class="form-group">
            {!! Form::label('cliente_id', 'Cliente') !!}
            {{ Form::select('cliente_id', \App\Cliente::orderBy('nome')->pluck('nome', 'id')->toArray(), $pedido->cliente_id, ['class'=>'form-control','required']) }}
        </div>

        <div class="form-group">
            {!! Form::submit('Editar Pedido', ['class'=>'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}
    </div>
@endsection
@section('dyn_scripts')

<script>
function valida_form(){
    var bloco_erro = $("#bloco_erro");
    var v_return = true;

    if(document.getElementById("data").value == ""){
       if(document.getElementById("er_data")== null){
            var input_li = "<li id='er_data'>Campo data obrigatório.</li>";
            document.getElementById("bloco_erro").style="display:block;";
            $(bloco_erro).append(input_li);
        }
        v_return=false;
    }else{
        if(document.getElementById("er_data")!== null){
            document.getElementById("er_data").remove();
        }
    }

    if(document.getElementById("valor").value == ""){
       if(document.getElementById("er_valor")== null){
            var input_li = "<li id='er_valor'>Campo valor obrigatório.</li>";
            document.getElementById("bloco_erro").style="display:block;";
            $(bloco_erro).append(input_li);
        }
        v_return=false;
    }else{
        if(document.getElementById("er_valor")!== null){
            document.getElementById("er_valor").remove();
        }
    }

    return v_return;
}
</script>
@endsection

