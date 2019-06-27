@extends('adminlte::default')
@section('content')
    <div class="container-fluid ">
    <div id="dv_cabecalho">
            <div style="float:left"> 
                <h1>Marcas</h1>
            </div>

            {!! Form::open(['name'=>'form_name', 'route'=>'marcas']) !!}
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
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                @foreach($marcas as $marc)
                    <tr>
                        <td>{{ $marc->id }}</td>
                        <td>{{ $marc->nome }}</td>
                        <td>
                            <a href="{{ route('marcas.edit', ['id'=>$marc->id]) }}" class="btn-sm btn-success">Editar</a>
                            <a href="#" onClick="return ConfirmaExclusao({{$marc->id}})" class="btn-sm btn-danger">Remover</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $marcas->links() }}
        <div><a href="{{ route('marcas.create') }}" class="btn btn-info">Nova Marca</a></div>
        
    </div>
@endsection

@section('table-delete')
"marcas"
@endsection