<!DOCTYPE html>
<html>
    <body>
        @include('partials.nav', ['x'=>0])
        @include('partials.formularios')
        <form action='pedidoEditar_bd' method='GET'>    
        @csrf
            <input type='hidden' name='cod_pedido' value='{{$pedido[0]->cod_pedido}}'>

            <div id='formularioClienteCadastrado'>
                <label>Cliente</label>
                <select id='opcoesDeClientes' name='cliente'>
                    <option value=0></option>
                    
                    @foreach($clientes as $cliente)
                        <option value='{{$cliente->cod_cliente}}' {{ $cliente->cod_cliente == $pedido[0]->cod_cliente ? 'selected' : '' }} >{{$cliente->nome}}</option>
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
                
                </div>
            </div>
            <div id='formularioClienteNaoCadastrado'>
                <label>Endereço </label>
                <input id='enderecoEntrega' name='enderecoEntrega' value='{{$pedido[0]->endereco}}'></input>
            </div>

            <button class="botaoPedido" type='button' onclick='adicionarItem()'>Adicionar Item</button>

            <div id="itensDoPedido">
            @foreach($itens_pedido as $item_pedido)
                <script>contadorDeItens++;</script>

                <div>

                    <label>Prato</label>
                    <select name="pratos[]" id="prato">
                        <option value=""></option>

                        @foreach($pratos as $prato)
                            <option data-valor_unitario="{{$prato->valor}}" value="{{$prato->cod_prato}}" {{$item_pedido->cod_prato == $prato->cod_prato ? 'selected' : ''}} >{{$prato->descricao}}</option>
                        @endforeach
                    </select>

                    <label>Quantidade</label>
                    <input name="quantidades[]" type="number" id="quantidade" value='{{$item_pedido->quantidade}}'>

                    <button type='button' onclick='excluirIngrediente(this)'>Lixeira/Excluir ingrediente</button>

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

        function excluirIngrediente(botaoExcluirIgrediente)
        {
            var divIngrediente = botaoExcluirIgrediente.parentElement;

            divIngrediente.remove();
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
                    var enderecoCliente = document.getElementById('endereco');
                    var cpfCliente = document.getElementById('cpf');

                    enderecoCliente.innerText = clientes[i].endereco;
                    cpfCliente.innerText = clientes[i].cpf;

                    alert('Campo "Endereço" será substituído pelo endereço do cliente cadastrado no sistema')
                    document.getElementById('enderecoEntrega').value = clientes[i].endereco;
                }
            }
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
    </script>
</html>