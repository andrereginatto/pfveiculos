@extends('adminlte::default')
@section('content')
    <div class="container-fluid">
        <h1>Novo Pedido</h1>
        <ul class="alert alert-danger" style="display:none;" id="bloco_erro">
        </ul>
        @if($errors->any())
            <ul class="alert alert-danger" id="erro">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        
        {!! Form::open(['route'=>'pedidos.masterdetail','onSubmit'=>'return valida_form();']) !!}
        

        <div class="form-group">
            {!! Form::label('data', 'Data: ') !!}
            {!! Form::date('data', null, ['class'=>'form-control']) !!}
        </div>
        
        <div class="form-group">
            {!! Form::label('valor', 'Valor: ') !!}
            {!! Form::Number('valor', null, ['class'=>'form-control','min'=>'1','max'=>'200000']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('tipo_pagamento', 'Tipo Pagamento:') !!}
            {!! Form::select('tipo_pagamento', 
                array('Dinheiro'=>'Dinheiro', 'Credito'=>'Credito',
                      'Débito'=>'Débito', 'Cheque'=>'Cheque'),
                             'Débito', ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('vendedor_id', 'Vendedor') !!}
            {{ Form::select('vendedor_id', \App\Vendedor::orderBy('nome')->pluck('nome', 'id')->toArray(), null, ['class'=>'form-control','required']) }}
        </div>

        <div class="form-group">
            {!! Form::label('cliente_id', 'Cliente') !!}
            {{ Form::select('cliente_id', \App\Cliente::orderBy('nome')->pluck('nome', 'id')->toArray(), null, ['class'=>'form-control','required']) }}
        </div>
        
        <h4>Carros</h4>
        <div class="input_fields_wrap"></div>
        <br>

        <button style="float:right;" class="add_field_button btn btn-success">Adicionar Carro</button>
        <br>
        <hr/>

        <div class="form-group">
            {!! Form::submit('Criar Pedido', ['class'=>'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}
    </div>
@endsection

@section('dyn_scripts')

<script>
function valida_form(){
    var carros = document.getElementsByName("itens[]");
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

    if(carros.length==0){
        if(document.getElementById("er_carro")== null){
            var input_li = "<li id='er_carro'>Você precisa selecionar no mínimo 1 carro.</li>";
            document.getElementById("bloco_erro").style="display:block;";
            $(bloco_erro).append(input_li);
        }
        v_return=false;
    }else{
        if(document.getElementById("er_carro")!== null){
            document.getElementById("er_carro").remove();
        }
    }

    return v_return;
}
        $(document).ready(function() {
            var wrapper        = $(".input_fields_wrap");  //Fields Wrapper
            var add_button     = $(".add_field_button"); //Add Button ID

            var x = 0; //init lal text box count
            $(add_button).click(function(e){ //on add input button click
                x++; //text box increment
                var newField = '<div style="margin-bottom:5px;"><div style="width: 94%; float:left" id="carro">{!! Form::select("itens[]", \App\Carro::orderBy("modelo")->pluck("modelo", "id")->toArray(), null, ["class"=>"form-control", "required", "placeholder"=>"Selecione um Carro"]) !!}</div><button type="button" class="remove_field btn btn-danger btn-circle"><i class="fa fa-times"></button></div>';
                
                $(wrapper).append(newField);
            });

            $(wrapper).on("click",".remove_field", function(e){  //user click on remove text
                e.preventDefault(); $(this).parent('div').remove(); x--;
            });
        });

</script>
@endsection

