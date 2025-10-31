<html>
    <head>
        <style>
            body{
                margin: 0;
                padding: 0;
                background-image: linear-gradient(190deg, #ebb644ff, #F0996A);
            }

            nav{
                width: 200px;
                height: 100vh;
                display: flex;
                flex-direction: column;
                padding-right: 50px;
                background-image: linear-gradient(to left, #DB3E3A, #DB6142);
            }

            .menu{
                font-size: 40px;
                padding-top: 20px;
                padding-left: 50px;
                width: 200px;
                border-bottom: 1px solid black;
            }

            .menuopcao{
                padding-left: 50px;
                width: 130px;
                height: 29px;
                font-size: 24px;
            }

            .menuopcaoselecionada{
                padding-left: 50px;
                width: 130px;
                height: 29px;
                font-size: 24px;
                background-image: linear-gradient(to left, #E14339, #FFDE48);
            }

            .menuopcaoselecionada > a{
                color: black;

            }

            .menulink{
                text-decoration: none;
                color: #E5DD8F;
                // #E2D7D1
            }

            .menulink:hover{
                text-decoration: underline;
            }
        </style>
    </head>
    <nav>
            <h1 class="menu"><a class="menulink" href="/">Menu</a></h1>

            @if($x == 1) <h2 class="menuopcaoselecionada"><a class="menulink" href="/cliente">Cliente</a></h2>
                @else <h2 class="menuopcao"><a class="menulink" href="/cliente">Cliente</a></h2>
            @endif

            @if($x == 2) <h2 class="menuopcaoselecionada"><a class="menulink" href="/composicao">Composição</a></h2>
                @else <h2 class="menuopcao"><a class="menulink" href="/composicao">Composição</a></h2>
            @endif

            @if($x == 3) <h2 class="menuopcaoselecionada"><a class="menulink" href="/compra">Compra</a></h2>
                @else <h2 class="menuopcao"><a class="menulink" href="/compra">Compra</a></h2>
            @endif

            @if($x == 4) <h2 class="menuopcaoselecionada"><a class="menulink" href="/fornecedor">Fornecedor</a></h2>
                @else <h2 class="menuopcao"><a class="menulink" href="/fornecedor">Fornecedor</a></h2>
            @endif

            @if($x == 5) <h2 class="menuopcaoselecionada"><a class="menulink" href="/ingrediente">Ingrediente</a></h2>
                @else <h2 class="menuopcao"><a class="menulink" href="/ingrediente">Ingrediente</a></h2>
            @endif

            @if($x == 6) <h2 class="menuopcaoselecionada"><a class="menulink" href="/unidade">Unidade</a></h2>
                @else <h2 class="menuopcao"><a class="menulink" href="/unidade">Unidade</a></h2>
            @endif

            <h2 class="menuopcao"><a class="menulink">Itens Pedido</a></h2>
            
            @if($x == 8) <h2 class="menuopcaoselecionada"><a class="menulink" href="/pedido">Pedidos</a></h2>
                @else <h2 class="menuopcao"><a class="menulink" href="/pedido">Pedidos</a></h2>
            @endif

             @if($x == 9) <h2 class="menuopcaoselecionada"><a class="menulink" href="/prato">Pratos</a></h2>
                @else <h2 class="menuopcao"><a class="menulink" href="/prato">Pratos</a></h2>
            @endif
        </nav>
</html>