@extends('adminlte::default')
@section('content')
    <div class="container-fluid ">
        <div id="dv_cabecalho">
            <div style="float:left"> 
                <h1>Clientes</h1>
            </div>

            {!! Form::open(['name'=>'form_name', 'route'=>'clientes']) !!}
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
                    <th>Nome Completo</th>
                    <th>CPF</th>
                    <th>Telefone</th>
                    <th>Aniversário</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                @foreach($clientes as $cli)
                    <tr>
                        <td>{{ $cli->id }}</td>
                        <td>{{ $cli->nome }} {{ $cli->sobrenome }}</td>
                        <td>{{ $cli->cpf }}</td>
                        <td>{{ $cli->telefone }}</td>
                        <td>{{ date('d/m/Y', strtotime($cli->aniver)) }}</td>
                        
                        <td>
                            <a href="{{ route('clientes.edit', ['id'=>$cli->id]) }}" class="btn-sm btn-success">Editar</a>
                            <a href="#" onClick="return ConfirmaExclusao({{$cli->id}})" class="btn-sm btn-danger">Remover</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $clientes->links() }}
        <div><a href="{{ route('clientes.create') }}" class="btn btn-info">Novo Cliente</a></div>
    </div>
@endsection

@section('table-delete')
"clientes"
@endsection