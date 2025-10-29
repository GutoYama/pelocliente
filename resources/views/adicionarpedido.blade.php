<!DOCTYPE html>
<html>
    <body>
        @include('partials.nav', ['x'=>0])
        @include('partials.formularios')
        <form action='adicionar_bd' method='POST'>    
        @csrf
            
            <button class="botaoPedido" id='botaoCadastrado' type='button' onclick='modificarParaCliente(true)'>Pedido para cliente cadastrado</button>
            <button class="botaoPedido" id='botaoNaoCadastrado' type='button' onclick='modificarParaCliente(false)'>Pedido para Cliente não cadastrado</button>

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
                
                </div>
            </div>
            <div id='formularioClienteNaoCadastrado'>
                <label>Endereço </label>
                <input id='enderecoNaoCadastrado' name='enderecoNaoCadastrado'></input>
            </div>

            <button class="botaoPedido" type='button' onclick='adicionarItem()'>Adicionar Item</button>

            <div id='itensDoPedido'>
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

        document.getElementById('formularioClienteCadastrado').style.display = 'none';
        document.getElementById('formularioClienteNaoCadastrado').style.display = 'none';

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