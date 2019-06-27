@extends('adminlte::layouts.landing')

    <div class="container-fluid" style="background:#FFF">
    <div id="dv_cabecalho">
            <div style="float:left"> 
                <h1>Carros</h1>
            </div>

            {!! Form::open(['name'=>'form_name', 'route'=>'/']) !!}
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
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $carros->links() }}
