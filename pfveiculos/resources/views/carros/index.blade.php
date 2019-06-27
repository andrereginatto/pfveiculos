@extends('adminlte::default')
@section('content')
    <div class="container-fluid">
    <div id="dv_cabecalho">
            <div style="float:left"> 
                <h1>Carros</h1>
            </div>

            {!! Form::open(['name'=>'form_name', 'route'=>'carros']) !!}
            <div class="input-group" style="width:200px; padding:15px; float:right;">
                <input type="text" name="filtragem" class="form-control" placeholder="Pesquisar...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-default">
                        <i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
            {!! Form::close() !!}
        </div>

        <table class="table table-striped table-bordered table-hover">
            <thead>
            <tr>
                <th>Modelo</th>
                <th>Cor</th>
                <th>Ano</th>
                <th>Ano Modelo</th>
                <th>Marca</th>
                <th>Ação</th>
            </tr>
            </thead>

            <tbody>
            @foreach($carros as $car)
                    <tr>
                        <td>{{ $car->modelo }}</td>
                        <td>{{ $car->cor }}</td>
                        <td>{{ $car->ano }}</td>
                        <td>{{ $car->ano_modelo }}</td>
                        <td>{{ $car->marca->nome }}</td>
                        

                        <td>
                            <a href="{{ route('carros.edit', ['id'=>$car->id]) }}" class="btn-sm btn-success">Editar</a>
                            <a href="#" onClick="return ConfirmaExclusao({{$car->id}})" class="btn-sm btn-danger">Remover</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $carros->links() }}
        <div><a href="{{ route('carros.create') }}" class="btn btn-info">Novo Carro</a>
        <a href="{{ route('carros.relatorio') }}" class="btn btn-success">Gerar PDF</a>
        </div>
@endsection

@section('table-delete')
"carros"
@endsection