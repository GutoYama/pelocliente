<!DOCTYPE html>
<html>
    <head>
        <style>
            #formularioClienteCadastrado{
                display: flex;
                flex-direction: column;
                gap: 20px;
            }

            #dadosDoCliente{
                display: flex;
                flex-direction: column;
                gap: 20px;
            }
        </style>
    </head>
    <body>
        @include('partials.nav', ['x'=>0])
        @include('partials.formularios')
        <form action='pedidoEditar_bd' method='GET'>    
        @csrf
            <input type='hidden' name='cod_pedido' value='{{$pedido[0]->cod_pedido}}'>

            <div id='formularioClienteCadastrado'>
                <div class="cliente">
                    <label>Cliente</label>
                    <select id='opcoesDeClientes' name='cliente'>
                        <option value = 0></option>
                        
                        @foreach($clientes as $cliente)
                            <option value='{{$cliente->cod_cliente}}' {{ $cliente->cod_cliente == $pedido[0]->cod_cliente ? 'selected' : '' }} >{{$cliente->nome}}</option>
                        @endforeach
                    </select>
                </div>

                <div id='dadosDoCliente'>

                    <div class="endereco">
                        <label>Endereço</label>
                        <input value='{{$pedido[0]->endereco}}' name='enderecoEntrega' id='enderecoEntrega'>
                    </div>

            <center><button class="botaoPedido" type='button' onclick='adicionarItem()'>Adicionar Item</button></center>

            <div id="itensDoPedido">
            
            @php $contador = 0; @endphp
            @foreach($itens_pedido as $item_pedido)
                @php $contador += 1; @endphp
                <script>contadorDeItens++;</script>

                <div id="item">

                    <div id="PartePrato">
                        <label>Prato</label>
                        <select name="pratos[]" id="prato{{$contador}}" onchange='verificarPrato(event);reacalcularValorTotal()'>
                            <option value=""></option>

                            @foreach($pratos as $prato)
                                <option data-valor_unitario="{{$prato->valor}}" value="{{$prato->cod_prato}}" {{$item_pedido->cod_prato == $prato->cod_prato ? 'selected' : ''}} >{{$prato->descricao}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div id="ParteQuantidade">
                        <label>Quantidade</label>
                        <input name="quantidades[]" type="number" id="quantidade" value='{{$item_pedido->quantidade}}' oninput='reacalcularValorTotal()'>
                    </div>

                    <img src='https://cdn-icons-png.flaticon.com/128/1214/1214428.png' onclick='excluirIngrediente(this)'>

                </div>
            @endforeach
            </div>

            <p id='valorTotal'>Valor Total: R$ 0.0</p>

            <center><input class="enviarPedido" type='submit' value='Finalizar Pedido'></center>
        </form>
    </body>

    <script>
        var opcoesDeCliente = document.getElementById('opcoesDeClientes');
        opcoesDeCliente.addEventListener('change', alterarDadosCliente);

        var clientes = @json($clientes);
        var pratos = @json($pratos);

        var contadorDeItens = 0;

        var selects_pratos_originais = document.getElementById('itensDoPedido').querySelectorAll('select');

        var pratos_selecionados_originais = {};

        for (var i = 0; i < selects_pratos_originais.length; i++)
        {
            var select = selects_pratos_originais[i];
            pratos_selecionados_originais[select.id] = select.selectedIndex;
        }

        console.log(pratos_selecionados_originais);


        function verificarPrato(event)
        {
            var selects_pratos = document.getElementById('itensDoPedido').querySelectorAll('select');
            var cod_prato_selecionado = event.target.selectedOptions[0].value;

            for (var i = 0; i < selects_pratos.length; i++)
            {
                if (event.target != selects_pratos[i])
                {
                    if (cod_prato_selecionado == selects_pratos[i].selectedOptions[0].value)
                    {
                        alert('Prezado(a) funcionário, não é permitido a inclusão do mesmo prato mais de uma vez.');

                        if (event.target.id == 'pratoNovo' )
                            event.target.selectedIndex = 0;
                        else
                            event.target.selectedIndex = pratos_selecionados_originais[event.target.id];
                        break;
                    }
                }
            }
        }

        function excluirIngrediente(botaoExcluirIgrediente)
        {
            var divIngrediente = botaoExcluirIgrediente.parentElement;

            divIngrediente.remove();

            reacalcularValorTotal();
        }

        function modificarParaCliente(isCadastrado)
        {
            document.getElementById('botaoNaoCadastrado').remove();
            document.getElementById('botaoCadastrado').remove();

            if (isCadastrado)
            {
                document.getElementById('formularioClienteCadastrado').style.display = 'block';
            }
            else
            {
                document.getElementById('formularioClienteNaoCadastrado').style.display = 'block';
            }
        }

        function adicionarItem()
        {
            var divIngrediente = document.createElement('div');

            contadorDeItens++;

            var selectPrato = document.createElement('select');
            selectPrato.addEventListener('change', reacalcularValorTotal);
            selectPrato.addEventListener('change', verificarPrato);
            selectPrato.name = 'pratos[]';
            selectPrato.id = 'pratoNovo';

            var labelPrato = document.createElement('label');
            labelPrato.innerText = "Prato ";

            var inputQuantidade = document.createElement('input');
            inputQuantidade.name = 'quantidades[]';
            inputQuantidade.type = 'number';
            inputQuantidade.id = 'quantidade';
            inputQuantidade.addEventListener('input', reacalcularValorTotal);

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
            
            divIngrediente.appendChild(labelPrato);
            divIngrediente.appendChild(selectPrato);

            divIngrediente.appendChild(labelQuantidade);
            divIngrediente.appendChild(inputQuantidade);

            

            var botaoExcluir = document.createElement('button');
            botaoExcluir.type = 'button';
            botaoExcluir.onclick = function(){
                excluirIngrediente(botaoExcluir);
            };
            botaoExcluir.innerText = 'Lixeira/Excluir Ingrediente';

            divIngrediente.appendChild(botaoExcluir);

            divItensDoPedido.appendChild(divIngrediente);
        }

        function alterarDadosCliente(event)
        {
            var cod_cliente = event.target.value;

            for (var i = 0; i < clientes.length; i++)
            {
                if (clientes[i].cod_cliente == cod_cliente)
                {
                    var enderecoCliente = document.getElementById('enderecoEntrega');

                    enderecoCliente.innerText = clientes[i].endereco;

                    alert('Campo "Endereço" será substituído pelo endereço do cliente cadastrado no sistema')
                    document.getElementById('enderecoEntrega').value = clientes[i].endereco;
                }
            }
        }

        function reacalcularValorTotal()
        {
            var selects_pratos = document.getElementById('itensDoPedido').querySelectorAll('select');
            var quantidades_pratos = document.getElementById('itensDoPedido').querySelectorAll('input');
            var valor_total = 0;

            for (var i = 0; i < selects_pratos.length; i++)
            {
                for (var j = 0; j < pratos.length; j++)
                {
                    if (selects_pratos[i].selectedOptions[0].value == pratos[j].cod_prato)
                    {
                        valor_total += pratos[j].valor * quantidades_pratos[i].value;

                        document.getElementById('valorTotal').innerText = 'Valor Total: R$ ' + valor_total;
                    }
                }
            }
        }
    </script>
</html>