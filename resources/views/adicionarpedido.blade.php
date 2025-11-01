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

        console.log(pratos);

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

        function verificarPrato(event)
        {
            var cod_prato = event.target.selectedOptions[0].value;

            var selects_pratos = document.getElementById('itensDoPedido').querySelectorAll('select');

            for (var i = 0; i < selects_pratos.length; i++)
            {
                if (event.target != selects_pratos[i])
                {
                    if (selects_pratos[i].selectedOptions[0].value == cod_prato)
                    {
                        alert('Prezado(a) funcionário, não é permitido a inclusão do mesmo prato mais de uma vez.');

                        event.target.selectedIndex = 0;
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
            contadorDeItens++;

            var Item = document.createElement('div');
            Item.id = 'item';

            var primeiraDiv = document.createElement('div');
            primeiraDiv.id = 'PartePrato';

            var segundaDiv = document.createElement('div');
            segundaDiv.id = 'ParteQuantidade';

            var selectPrato = document.createElement('select');
            selectPrato.addEventListener('change', reacalcularValorTotal);
            selectPrato.addEventListener('change', verificarPrato);
            selectPrato.name = 'pratos[]';
            selectPrato.id = 'prato';

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
            
            primeiraDiv.appendChild(labelPrato);
            primeiraDiv.appendChild(selectPrato);

            segundaDiv.appendChild(labelQuantidade);
            segundaDiv.appendChild(inputQuantidade);

            Item.appendChild(primeiraDiv);
            Item.appendChild(segundaDiv);

            var botaoExcluir = document.createElement('img');
            botaoExcluir.src = 'https://cdn-icons-png.flaticon.com/128/1214/1214428.png';
                botaoExcluir.className = 'excluir';
                botaoExcluir.onclick = function(){
                excluirIngrediente(botaoExcluir);
            };
            botaoExcluir.innerText = 'Lixeira/Excluir Ingrediente';

            Item.appendChild(botaoExcluir);

            divItensDoPedido.appendChild(Item);

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
</html>