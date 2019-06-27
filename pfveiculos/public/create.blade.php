@extends('adminlte::default')

@section('contentheader_title')
Novo Histórico
@endsection

@section('content')
    <div class="container-fluid">
        <h1>Novo Histórico</h1>

        @if($errors->any())
            <ul class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        
        {!! Form::open(['route'=>'historicos.store']) !!}

        <div class="form-group">
            {!! Form::label('habito_id', 'Hábito') !!}
            {{ Form::select('habito_id', \App\Habito::orderBy('nome')->pluck('nome', 'id')->toArray(), null, ['class'=>'form-control']) }}
        </div>

        <div class="form-group">
            {!! Form::label('data', 'Data: ') !!}
            {!! Form::text('data', null, ['class'=>'form-control']) !!}
        </div>
        
        <div class="form-group">
            {!! Form::label('hora', 'Hora: ') !!}
            {!! Form::text('hora', null, ['class'=>'form-control']) !!}
        </div>
        
        <div class="form-group">
            {!! Form::submit('Criar Histórico', ['class'=>'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}
    </div>
@endsection

