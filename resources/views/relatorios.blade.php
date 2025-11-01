<!DOCTYPE html>
<html>
    <head>
        <style>
            body{
            }

            header{
                width: calc(100% - 250px);
                height: 50px;
                position: absolute;
                left: 250px;
                display: grid;
                grid-template-columns: repeat(3, 1fr);
                background-color: #E14339;
            }

            header button{
                height: 50px;
                background-image: linear-gradient(#E14339);
                font-size: 30px;
            }
            
            header button:hover{
                cursor: pointer;
            }

            #botaoLucro{
                background-image: linear-gradient(to top, #FFDE48, #E14339);
            }

            main{
                z-index: 15;
                top: 50px;
                position: relative;

                display: flex;
                flex-direction: column;

                width: 100%;
            }

            main table{
                position: absolute;
                width: 97.5%;
                background-color: #E0B27A;
            }

            nav{
            }

            #RELATORIO_PRATOS_MAIS_VENDIDOS{
                opacity: 0;
            }

            #RELATORIO_LUCRO_POR_MES{
                opacity: 0;
            }

            #graficoLucro{
                opacity: 1;
            }

            #RELATORIO_COMPRA_POR_CLIENTE{
                opacity: 0;
            }
        </style>
    </head>
    <body>
        @include('partials.nav',['x'=> 9])
        @include('partials.tabelas')
        <header>
            <button id="botaoLucro" onclick="MostrarRelatorio('RELATORIO_LUCRO_POR_MES')">Lucro</button>
            <button id="botaoPratoMaisVendido" onclick="MostrarRelatorio('RELATORIO_PRATOS_MAIS_VENDIDOS')">Prato mais pedido</button>
            <button id="botaoCompraPorCliente" onclick="MostrarRelatorio('RELATORIO_COMPRA_POR_CLIENTE')">Compra por Cliente</button>
        </header>
            <main>
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

                <canvas id="graficoLucro"></canvas>

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
            </main>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            function MostrarRelatorio(ID){
                var lucro = document.getElementById('RELATORIO_LUCRO_POR_MES');
                var pratoMaisPedido = document.getElementById('RELATORIO_PRATOS_MAIS_VENDIDOS');
                var compraPorCliente = document.getElementById('RELATORIO_COMPRA_POR_CLIENTE');
                var grafico = document.getElementById('graficoLucro');

                lucro.style.opacity = 0;
                grafico.style.opacity = 0;
                pratoMaisPedido.style.opacity = 0;
                compraPorCliente.style.opacity = 0;

                var selecionado = document.getElementById(ID);
                selecionado.style.opacity = 1;

                var botaoLuc = document.getElementById('botaoLucro');
                var botaoPrato = document.getElementById('botaoPratoMaisVendido');
                var botaoCompra = document.getElementById('botaoCompraPorCliente');

                switch(ID){
                    case 'RELATORIO_LUCRO_POR_MES':
                        botaoLuc.style.backgroundImage = 'linear-gradient(to top, #FFDE48, #E14339)';
                        botaoPrato.style.backgroundImage = 'linear-gradient(to top, #E14339)';
                        botaoCompra.style.backgroundImage = 'linear-gradient(to top, #E14339)';
                        lucro.style.opacity = 0;
                        grafico.style.opacity = 1;
                        break;
                    case 'RELATORIO_PRATOS_MAIS_VENDIDOS':
                        botaoLuc.style.backgroundImage = 'linear-gradient(to top, #E14339)';
                        botaoPrato.style.backgroundImage = 'linear-gradient(to top, #FFDE48, #E14339)';
                        botaoCompra.style.backgroundImage = 'linear-gradient(to top, #E14339)';
                        break;
                    case 'RELATORIO_COMPRA_POR_CLIENTE':
                        botaoLuc.style.backgroundImage = 'linear-gradient(to top, #E14339)';
                        botaoPrato.style.backgroundImage = 'linear-gradient(to top, #E14339)';
                        botaoCompra.style.backgroundImage = 'linear-gradient(to top, #FFDE48, #E14339)';
                        break;
                }
            }

            document.addEventListener("DOMContentLoaded", function() {
                
                const lucroData = @json($lucro_mes);

                const labels = lucroData.map(item => item.data);
                const lucros = lucroData.map(item => item.lucro);
                const vendidos = lucroData.map(item => item.totalVendido);
                const comprados = lucroData.map(item => item.totalComprado);

                const ctx = document.getElementById('graficoLucro').getContext('2d');

                new Chart(ctx, {
                    type: 'bar', // ou 'line'
                    data: {
                        labels: labels,
                        datasets: [
                            {
                                label: 'Total Comprado',
                                data: comprados,
                                backgroundColor: 'rgba(255, 99, 132, 0.5)',
                                borderColor: 'rgba(255, 99, 132, 1)',
                                borderWidth: 1
                            },
                            {
                                label: 'Total Vendido',
                                data: vendidos,
                                backgroundColor: 'rgba(54, 162, 235, 0.5)',
                                borderColor: 'rgba(54, 162, 235, 1)',
                                borderWidth: 1
                            },
                            {
                                label: 'Lucro',
                                data: lucros,
                                backgroundColor: 'rgba(75, 192, 192, 0.6)',
                                borderColor: 'rgba(75, 192, 192, 1)',
                                borderWidth: 1
                            }
                        ]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            title: {
                                display: true,
                                text: 'Lucro Mensal'
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            });
        </script>
    </body>
</html>
