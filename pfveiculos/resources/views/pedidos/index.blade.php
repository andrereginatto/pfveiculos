@extends('adminlte::default')
@section('content')
    <div class="container-fluid">
        <h1>Pedidos</h1>

        <table class="table table-striped table-bordered table-hover">
            <thead>
            <tr>
                <th>Data</th>
                <th>Valor</th>
                <th>Tipo Pagamento</th>
                <th>Vendedor</th>
                <th>Cliente</th>
                <th>Carros</th>
                <th>Ação</th>
            </tr>
            </thead>

            <tbody>
            @foreach($pedidos as $ped)
                    <tr>
                        <td>{{ date('d/m/Y', strtotime($ped->data)) }}</td>
                        <td>{{ $ped->valor }}</td>
                        <td>{{ $ped->tipo_pagamento }}</td>
                        <td>{{ $ped->vendedor->nome.' '.$ped->vendedor->sobrenome }}</td>
                        <td>{{ $ped->cliente->nome.' '.$ped->cliente->sobrenome }}</td>
                        <td>@foreach($ped->carro_pedidos as $car)
                                <li>{{ $car->carro->modelo }}</li>
                            @endforeach</td>
                        

                        <td>
                            <a href="{{ route('pedidos.edit', ['id'=>$ped->id]) }}" class="btn-sm btn-success">Editar</a>
                            <a href="#" onClick="return ConfirmaExclusao({{$ped->id}})" class="btn-sm btn-danger">Remover</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $pedidos->links() }}
        <div>
            <a href="{{ route('pedidos.create') }}" class="btn btn-info">Novo Pedido</a>
            <a href="{{ route('pedidos.relatorio') }}" class="btn btn-success">Gerar PDF</a>
        </div>
@endsection

@section('table-delete')
"pedidos"
@endsection