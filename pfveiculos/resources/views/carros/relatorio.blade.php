<style>
table, td, th {  
  border: 1px solid #ddd;
  text-align: left;
}

table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  padding: 15px;
}
</style>

<div class="container-fluid">
        <h1>Passo Fundo Veículos - Carros</h1>

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
</div>
