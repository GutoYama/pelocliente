<!DOCTYPE html>
<html>
    <body>
        <table id='RELATORIO_PRATOS_MAIS_VENDIDOS'>
            <thead>
                <tr>
                    <th>Descrição</th>
                    <th>Quantidade Vendida</th>
                </tr>
            </thead>

            <tbody>
                @foreach($pratos_vendidos as $prato)
                    <tr>
                        <td>{{ $prato->descricao }}</td>
                        <td>{{ $prato->quantidade_vendida }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <table id='RELATORIO_LUCRO_POR_MES'>
            <thead>
                <tr>
                    <th>Data</th>
                    <th>Valor Total Vendido</th>
                    <th>Valor Total Comprado</th>
                    <th>Lucro</th>
                </tr>
            </thead>

            <tbody>
                @foreach($lucro_mes as $mes)
                    <tr>
                        <td>{{ $mes['data'] }}</td>
                        <td>{{ $mes['totalVendido'] }}</td>
                        <td>{{ $mes['totalComprado'] }}</td>
                        <td>{{ $mes['lucro'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <table id='RELATORIO_COMPRA_POR_CLIENTE'>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Total de Pedidos</th>
                    <th>Total Gasto</th>
                </tr>
            </thead>

            <tbody>
                @foreach($compras_clientes as $cliente)
                    <tr>
                        <td>{{ $cliente->nome }}</td>
                        <td>{{ $cliente->total_pedidos }}</td>
                        <td>{{ $cliente->total_gasto }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </body>
</html>
