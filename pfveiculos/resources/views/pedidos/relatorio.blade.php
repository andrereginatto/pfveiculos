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
        <h1>Passo Fundo Veículos - Pedidos</h1>

        <table style="border:1px">
            <thead>
            <tr>
                <th>Data</th>
                <th>Valor</th>
                <th>Tipo Pagamento</th>
                <th>Vendedor</th>
                <th>Cliente</th>
                <th>Carros</th>
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
                    </tr>
                @endforeach
            </tbody>
        </table>
</div>
