@extends('adminlte::default')

@section('content')
    <div class="container-fluid">
        <h1>Editando Carro: {{$carro->modelo}}</h1>

        @if($errors->any())
            <ul class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        
        {!! Form::open(['route'=>["carros.update", $carro->id], 'method'=>'put']) !!}

        <div class="form-group">
            {!! Form::label('modelo', 'Modelo: ') !!}
            {!! Form::text('modelo', $carro->modelo, ['class'=>'form-control']) !!}
        </div>
        
        <div class="form-group">
        {!! Form::label('cor', 'Cor:') !!}
            {!! Form::select('cor', 
                             array('Prata'=>'Prata', 'Preto'=>'Preto',
                                   'Branco'=>'Branco', 'Vermelho'=>'Vermelho',
                                   'Azul'=>'Azul', 'Verde'=>'Verde',
                                   'Bordo'=>'Bordo'),
                             $carro->cor, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('ano', 'Ano: ') !!}
            {!! Form::text('ano', $carro->ano, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('ano_modelo', 'Ano Modelo: ') !!}
            {!! Form::text('ano_modelo', $carro->ano_modelo, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('marca_id', 'Marca') !!}
            {{ Form::select('marca_id', \App\Marca::orderBy('nome')->pluck('nome', 'id')->toArray(), $carro->marca_id, ['class'=>'form-control']) }}
        </div>
        
        <div class="form-group">
            {!! Form::submit('Editar Carro', ['class'=>'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}
    </div>
@endsection

