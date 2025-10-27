<!DOCTYPE html>
<html>
    <body>
        @include('partials.nav', ['x'=>0])
        <form action="/pedido/adicionar_bd" method="POST">
            @csrf
            
            <label>Cliente</label>
            <select id='opcoesDeClientes' name='cliente'>
                <option></option>
                
                @foreach($clientes as $cliente)
                    <option value='{{$cliente->cod_cliente}}'>{{$cliente->nome}}</option>
                @endforeach
            </select>

            <div id='dadosDoCliente'>
                <label>Endereço </label>
                <div id='endereco'></div>
                <label>CPF </label>
                <div id='cpf'></div>
            </div>

            <button type='button' onclick='adicionarItem()'>Adicionar Item</button>

            <div id='itensDoPedido'>
            </div>

            <input type='submit' value='Finalizar Pedido'>
        </form>
    </body>

    <script>
        var opcoesDeCliente = document.getElementById('opcoesDeClientes');
        opcoesDeCliente.addEventListener('change', alterarDadosCliente);

        var clientes = @json($clientes);
        var pratos = @json($pratos);

        var contadorDeItens = 0;

        function adicionarItem()
        {
            contadorDeItens++;

            var selectPrato = document.createElement('select');
            selectPrato.name = 'pratos[]';
            var labelPrato = document.createElement('label');
            labelPrato.innerText = "Prato ";

            var inputQuantidade = document.createElement('input');
            inputQuantidade.name = 'quantidades[]';
            inputQuantidade.type = 'number';

            var labelQuantidade = document.createElement('label');
            labelQuantidade.innerText = "Quantidade ";

            for (var i = 0; i < pratos.length; i++)
            {
                var optionPrato = document.createElement('option');
                optionPrato.value = pratos[i].cod_prato;
                optionPrato.innerText = pratos[i].descricao;
                
                selectPrato.appendChild(optionPrato);
            }

            var divItensDoPedido = document.getElementById('itensDoPedido');
            
            divItensDoPedido.appendChild(labelPrato);
            divItensDoPedido.appendChild(selectPrato);

            divItensDoPedido.appendChild(labelQuantidade);
            divItensDoPedido.appendChild(inputQuantidade);

            divItensDoPèdido.appendChild('<br>');
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