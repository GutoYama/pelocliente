<html>
<head>
    <style>
        
        body{
            display: flex;
            flex-direction: row;
            align-items: flex-start;
        }

        main{
            overflow-x: hidden;

            width: 75%;
            height: calc(100vh - 140px);

            display: flex;
            flex-direction: column;
            
            gap: 30px;
            padding-bottom: 20px;
            padding-top: 20px;
            margin-left: auto;
            margin-right: auto;
        }

        main::-webkit-scrollbar{
            display: none;
        }

        .pedido{
            display: flex;
            flex-direction: column;
            gap: 20px;
            padding: 20px;

            border: 1px solid #E0B27A;
            border-radius: 15px;

            background-color: #FFF6E9;

            box-shadow: 3px 3px 3px rgba(0,0,0, 0.5);
        }

        .dadosDoPedido{
            padding-left: 20px;
            border: 1px solid #FFE4C4;
            border-radius: 20px;
            background-color: white;
            position:relative;
            box-shadow: 3px 3px 3px rgba(0,0,0, 0.5);
        }

        .datahora{
            position: absolute;
            right: 10;
            top: -15px;
        }

        .entregue{
            width: 200px;
            position: relative;
        }

        .entregue .finalizado{
            background-color: green;
            position: absolute;
            top: -5px;
            right: 45px;
            padding: 5px;
            border-radius: 10px;
        }

        .entregue .emAndamento{
            background-color: yellow;
            position: absolute;
            top: -5px;
            right: 5px;
            padding: 5px;
            border-radius: 10px;
        }

        .finalizar{
            position: absolute;
            right: -1125px;
            border: 1px solid black;
            border-radius: 10px;
            height: 25px;
            font-size: 20px;
            background-color: transparent;
        }

        .itensDoPedido{
            padding-left: 20px; 
            border: 1px solid red;
            border-radius: 15px;
            background-color: #FFF1D6;
            box-shadow: 3px 3px 3px rgba(0,0,0, 0.5);
        }

        .pratoDoPedido, .identificacao{
            display: flex;
            flex-direction: row;
            justify-content: space-between;
        }

        .identificacao{
            width: 460px;
        }

        .pratoDoPedido{
            width: 400px;
        }
    </style>
</head>
<body>
    @include('partials.nav',['x' => 7])
    @include('partials.add', ['link' => '/pedido/adicionar', 'icone' => 'https://cdn-icons-png.flaticon.com/128/54/54414.png', 'aba' => 'Pedido'])
    @include('partials.img')
    <main>
        @foreach ($pedidos as $pedido)
             <div class="pedido"> 
                <div class="dadosDoPedido">
                    <h3 class="codigoPedido">Código do pedido: {{ $pedido['dados_do_pedido']->cod_pedido }}</h3>
                    <h3 class="nomeCliente">
                        @if( $pedido['dados_do_pedido']->nome != null)
                            Cliente: {{ $pedido['dados_do_pedido']->nome }}
                        @endif
                    </h3>
                    <h3 class="datahora">{{ $pedido['dados_do_pedido']->datahora }}</h3>
                    <h3 class="endereco">Endereço: {{ $pedido['dados_do_pedido']->endereco }}</h3>
                    <h3 class="valorTotal">Valor Total:{{ $pedido['dados_do_pedido']->valor_total }}</h3>
                    <h3 class="entregue">
                        Status: 

                        @if( $pedido['dados_do_pedido']->entregue  == 0)
                            <div class="emAndamento">Em andamento</div>

                            <!--botão de finalizar pedido, ele só vai aparecer se o pedido estiver em andamento-->
                            <button class="finalizar">Finalizar pedido</button>
                        @endif

                        @if(  $pedido['dados_do_pedido']->entregue  == 1)
                            <div class="finalizado">Finalizado</div>
                        @endif
                    </h3>
                </div>
                <div class="itensDoPedido">
                    <div class="identificacao">
                            <h2>Prato</h2>
                            <h2>Quantidade</h2>
                        </div>
                    @foreach($pedido['itens_do_pedido'] as $item)
                        <div class="pratoDoPedido">
                            <h3 class="nomePrato">{{ $item->descricao }}</h3>
                            <h3 class="quantidade">{{ $item->quantidade }}</h3>
                        </div>                    
                    @endforeach
                </div>
            </div>
        @endforeach
    </main>
</body>
</html>