<!DOCTYPE html>
<html>
    <head>
        <script>
            var contadorDeItens = 0;
            var clientes = @json($clientes);
            var pratos = @json($pratos);
            var itens_pedido = @json($itens_pedido);


            var opcoesDeCliente = document.getElementById('opcoesDeClientes');
        opcoesDeCliente.addEventListener('change', alterarDadosCliente);

        function adicionarItem()
        {
            contadorDeItens++;

            var selectPrato = document.createElement('select');
            selectPrato.addEventListener('change', calcularValorTotal);
            selectPrato.name = 'pratos[]';
            selectPrato.id = 'prato';

            var labelPrato = document.createElement('label');
            labelPrato.innerText = "Prato ";

            var inputQuantidade = document.createElement('input');
            inputQuantidade.name = 'quantidades[]';
            inputQuantidade.type = 'number';
            inputQuantidade.id = 'quantidade';
            inputQuantidade.addEventListener('input', calcularValorTotal);

            var labelQuantidade = document.createElement('label');
            labelQuantidade.innerText = "Quantidade ";

            var optionPratoVazia = document.createElement('option');
            optionPratoVazia.value = "";
            optionPratoVazia.innerText = "";
            selectPrato.appendChild(optionPratoVazia);

            for (var i = 0; i < pratos.length; i++)
            {
                var optionPrato = document.createElement('option');
                optionPrato.dataset.valor_unitario = pratos[i].valor;
                optionPrato.value = pratos[i].cod_prato;
                optionPrato.innerText = pratos[i].descricao;
                
                selectPrato.appendChild(optionPrato);
            }

            var divItensDoPedido = document.getElementById('itensDoPedido');
            
            divItensDoPedido.appendChild(labelPrato);
            divItensDoPedido.appendChild(selectPrato);

            divItensDoPedido.appendChild(labelQuantidade);
            divItensDoPedido.appendChild(inputQuantidade);

            divItensDoPedido.appendChild('<br>');
        }

        function calcularValorTotal()
        {
            var itensPedidoDiv = document.getElementById('itensDoPedido');
            var itensPedido = itensPedidoDiv.children;

            var valorTotal = 0;

            for (var i = 0; i < itensPedido.length; i++)
            {
                if (itensPedido[i].id == 'prato')
                {
                    var valor_unitario = itensPedido[i].selectedOptions[0].dataset.valor_unitario;
                    

                    for (var j = i; j < itensPedido.length; j++)
                    {
                        if (itensPedido[j].id == 'quantidade')
                        {
                            valorTotal += valor_unitario * itensPedido[j].value;
                            break;
                        }
                    }
                }
            }

            document.getElementById('valorTotal').innerText = 'Valor Total: R$ ' + valorTotal.toString();
        }



            function adicionarItemAdicionado(item_pedido)
        {
            contadorDeItens++;

            var selectPrato = document.createElement('select');
            //selectPrato.addEventListener('change', calcularValorTotal);
            selectPrato.name = 'pratos[]';
            selectPrato.id = 'prato';

            var labelPrato = document.createElement('label');
            labelPrato.innerText = "Prato ";

            var inputQuantidade = document.createElement('input');
            inputQuantidade.name = 'quantidades[]';
            inputQuantidade.type = 'number';
            inputQuantidade.id = 'quantidade';
            inputQuantidade.value = itens_pedido[item_pedido];
            //inputQuantidade.addEventListener('input', calcularValorTotal);

            var labelQuantidade = document.createElement('label');
            labelQuantidade.innerText = "Quantidade ";

            var optionPratoVazia = document.createElement('option');
            optionPratoVazia.value = "";
            optionPratoVazia.innerText = "";
            selectPrato.appendChild(optionPratoVazia);

            for (var i = 0; i < pratos.length; i++)
            {
                var optionPrato = document.createElement('option');
                optionPrato.dataset.valor_unitario = pratos[i].valor;
                optionPrato.value = pratos[i].cod_prato;
                optionPrato.innerText = pratos[i].descricao;
                
                for (var j = 0; j < itens_pedido.length; j++)
                {
                    if (itens_pedido[j]['cod_prato'] == pratos[i])
                    {
                        optionPrato.selected = true;
                    }
                }

                selectPrato.appendChild(optionPrato);
            }

            var divItensDoPedido = document.getElementById('itensDoPedido');
            
            divItensDoPedido.appendChild(labelPrato);
            divItensDoPedido.appendChild(selectPrato);

            divItensDoPedido.appendChild(labelQuantidade);
            divItensDoPedido.appendChild(inputQuantidade);

            divItensDoPedido.appendChild('<br>');
        }

        function alterarDadosCliente(event)
        {
            var cod_cliente = event.target.value;

            for (var i = 0; i < clientes.length; i++)
            {
                if (clientes[i].cod_cliente == cod_cliente)
                {
                    var enderecoCliente = document.getElementById('endereco');
                    var cpfCliente = document.getElementById('cpf');

                    enderecoCliente.innerText = clientes[i].endereco;
                    cpfCliente.innerText = clientes[i].cpf;
                }
            }
        }
    
        </script>
    </head>

    <body>
        @include('partials.nav', ['x'=>0])
        @include('partials.formularios')
        <form action='adicionar_bd' method='POST'>    
        @csrf
            <div id='formularioClienteCadastrado'>
                <label>Cliente</label>
                <select id='opcoesDeClientes' name='cliente'>
                    <option></option>
                    
                    @foreach($clientes as $cliente)
                        <option value='{{$cliente->cod_cliente}}'>{{$cliente->nome}}</option>
                    @endforeach
                </select>

                <div id='dadosDoCliente'>

                    <div class="endereco">
                        <label>Endereço: </label>
                        <div id='endereco'></div>
                    </div>
                    
                    <div class="cpf">
                        <label>CPF: </label>
                        <div id='cpf'></div>    
                    </div>
                
                    <label>Endereço</lebal>
                    <input type='text' value='{{$pedido[0]->endereco}}'>

                </div>
            </div>

            <button class="botaoPedido" type='button' onclick='adicionarItem()'>Adicionar Item</button>

            <div id="itensDoPedido">
            @foreach($itens_pedido as $item_pedido)
                <label>Prato</label>
                <select name="pratos[]" id="prato">
                    <option value=""></option>

                    @foreach($pratos as $prato)
                        <option data-valor_unitario="{{$prato->valor}}" value="{{$prato->cod_prato}}" {{$item_pedido->cod_prato == $prato->cod_prato ? 'selected' : ''}} >{{$prato->descricao}}</option>
                    @endforeach
                </select>

                <label>Quantidade</label>
                <input name="quantidades[]" type="number" id="quantidade" value='{{$item_pedido->quantidade}}'>

            @endforeach
            </div>

            <p id='valorTotal'>Valor Total: R$ 0.0</p>

            <center><input class="enviarPedido" type='submit' value='Finalizar Pedido'></center>
        </form>
    </body>

    <script>
        
    </script>
</html>