@extends('adminlte::default')

@section('content')
    <div class="container-fluid">
        <h1>Novo Cliente</h1>

        @if($errors->any())
            <ul class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        
        {!! Form::open(['route'=>'clientes.store']) !!}
        
        <div class="form-group">
            {!! Form::label('nome', 'Nome:') !!}
            {!! Form::text('nome', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('sobrenome', 'Sobrenome:') !!}
            {!! Form::text('sobrenome', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('cpf', 'CPF:') !!}
            {!! Form::text('cpf', null, ['class'=>'form-control', 'placeholder'=>'04098930066', 'maxlength'=>'14']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('aniver', 'Data Nascimento:') !!}
            {!! Form::date('aniver', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('telefone', 'Telefone:') !!}
            {!! Form::text('telefone', null, ['class'=>'form-control', 'placeholder'=>'(00) 00000-0000', 'maxlength'=>'15','onkeydown'=>'masktel(this.value)']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Criar Cliente', ['class'=>'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}
    </div>
@endsection

@section('dyn_scripts')
    <script src="../../../js/jquery.mask.min.js"></script>
    <script>
    $(document).ready(function($){
        $("#cpf").mask("999.999.999-99")
        
        if(document.getElementById("telefone") !== null){
            var tamanho = document.getElementById("telefone").value;
            tamanho = tamanho.length;
            if(tamanho < 15){
                $('#telefone').mask('(00) 0000-0000', {reverse: false});
            }else{
                $('#telefone').mask('(00) 00000-0000', {reverse: false});
            }
        }
    });

    function masktel(value){
        value = value.length;
        var codigos = [48,49,50,51,52,53,54,55,56,57,96,97,98,99,100,101,102,103,104,105,8];
        for(var i=0; i< codigos.length; i++) {
            if(event.keyCode == codigos[i]){
                if(value==15 && event.keyCode =='8'){
                    $('#telefone').mask('(00) 0000-00000', {reverse: false});  
                }
                else if(value > 14 && event.keyCode !='8'){
                    $('#telefone').mask('(00) 00000-0000', {reverse: false});
                }else if (value==14 && event.keyCode !='8'){
                    $('#telefone').mask('(00) 00000-0000', {reverse: false});
                }else {
                    $('#telefone').mask('(00) 0000-0000', {reverse: false});
                }
            }
        }
    }


    </script>
@endsection