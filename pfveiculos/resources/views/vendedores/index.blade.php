@extends('adminlte::default')
@section('content')
    <div class="container-fluid ">
    <div id="dv_cabecalho">
            <div style="float:left"> 
                <h1>Vendedores</h1>
            </div>

            {!! Form::open(['name'=>'form_name', 'route'=>'vendedores']) !!}
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
                @foreach($vendedores as $vend)
                    <tr>
                        <td>{{ $vend->id }}</td>
                        <td>{{ $vend->nome }} {{ $vend->sobrenome }}</td>
                        <td>{{ $vend->cpf }}</td>
                        <td>{{ $vend->telefone }}</td>
                        <td>{{ date('d/m/Y', strtotime($vend->aniver)) }}</td>
                        
                        <td>
                            <a href="{{ route('vendedores.edit', ['id'=>$vend->id]) }}" class="btn-sm btn-success">Editar</a>
                            <a href="#" onClick="return ConfirmaExclusao({{$vend->id}})" class="btn-sm btn-danger">Remover</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $vendedores->links() }}
        <div><a href="{{ route('vendedores.create') }}" class="btn btn-info">Novo Vendedor</a></div>
    </div>
@endsection

@section('table-delete')
"vendedores"
@endsection