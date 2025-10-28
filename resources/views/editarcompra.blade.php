<!DOCTYPE html>
<html>
    <body>
        @include('partials.nav', ['x' => 0])
        @include('partials.formularios')
        <form action="/compraEditar_bd" method="GET">
            @csrf

            <input type="hidden" name="cod_compra" value="{{$compra[0]->cod_compra}}">

            <label>Código do Ingrediente</label>
            <select id='opcoesDeIngredientes' name='cod_ingrediente'>
            @foreach($ingredientes as $ingrediente)
                <option value='{{$ingrediente->cod_ingrediente}}'>{{$ingrediente->descricao}}</option>
            @endforeach
            </select>

            <label>Código do Fornecedor</label>
            <select id='opcoesDeFornecedores' name='cod_fornecedor'>
            @foreach($fornecedores as $fornecedor)
                <option value='{{$fornecedor->cod_fornecedor}}'>{{$fornecedor->nome_fantasia}}</option>
            @endforeach
            </select>

            <label>Quantidade</label>
            <input name="quantidade" type="number" step="0.01" value="{{$compra[0]->quantidade}}"></input>

            <center><input class="enviar" type="submit" value="Salvar"></input></center>
        </form>
    </body>

    <script>
        var ingredientes = @json($ingredientes);
        var fornecedores = @json($fornecedores);

        var cod_ingrediente = @json($compra[0]->cod_ingrediente);
        var cod_fornecedor = @json($compra[0]->cod_fornecedor);

        var opcoesDeIngredientes = document.getElementById('opcoesDeIngredientes');

        for (var i = 0; i < opcoesDeIngredientes.options.length; i++)
        {
            if (opcoesDeIngredientes.options[i].value == cod_ingrediente)
            {
                opcoesDeIngredientes.selectedIndex = i;
                break;
            }
        }

        var opcoesDeFornecedores = document.getElementById('opcoesDeFornecedores');

        for (var i = 0; i < opcoesDeFornecedores.options.length; i++)
        {
            if (opcoesDeFornecedores.options[i].value == cod_fornecedor)
            {
                opcoesDeFornecedores.selectedIndex = i;
                break;
            }
        }
    </script>
</html>
