@extends('adminlte::default')
@section('content')
    <div class="container-fluid">
        <h1>Novo Carro</h1>

        @if($errors->any())
            <ul class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        
        {!! Form::open(['route'=>'carros.store']) !!}
        

        <div class="form-group">
            {!! Form::label('modelo', 'Modelo: ') !!}
            {!! Form::text('modelo', null, ['class'=>'form-control']) !!}
        </div>
        
        <div class="form-group">
            {!! Form::label('cor', 'Cor:') !!}
            {!! Form::select('cor', 
                array('Prata'=>'Prata', 'Preto'=>'Preto',
                                   'Branco'=>'Branco', 'Vermelho'=>'Vermelho',
                                   'Azul'=>'Azul', 'Verde'=>'Verde',
                                   'Bordo'=>'Bordo'),
                             'branco', ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('ano', 'Ano: ') !!}
            {!! Form::text('ano', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('ano_modelo', 'Ano Modelo: ') !!}
            {!! Form::text('ano_modelo', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('marca_id', 'Marca') !!}
            {{ Form::select('marca_id', \App\Marca::orderBy('nome')->pluck('nome', 'id')->toArray(), null, ['class'=>'form-control']) }}
        </div>
        
        <div class="form-group">
            {!! Form::submit('Criar Carro', ['class'=>'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}
    </div>
@endsection

