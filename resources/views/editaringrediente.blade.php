<!DOCTYPE html>
<html>
    <body>
        <form action="/ingredienteEditar_bd" method="GET">
            @csrf

            <input type="hidden" name="cod_ingrediente" value="{{$ingrediente[0]->cod_ingrediente}}">

            <label>Descrição</label>
            <input name="descricao" type="text" value="{{$ingrediente[0]->descricao}}"></input>

            <label>Quantidade</label>
            <input name="quantidade" type="number" step="0.01" value="{{$ingrediente[0]->quantidade}}"></input>

            <label>Unidade</label>
            <select id='opcoesDeUnidade' name='cod_unidade'>
            @foreach($unidades as $unidade)
                <option value='{{$unidade->cod_unidade}}'>{{$unidade->sigla}}</option>
            @endforeach
            </select>

            <label>Valor Unitário</label>
            <input name="valor_unit" type="number" step="0.01" value="{{$ingrediente[0]->valor_unit}}"></input>

            <input type="submit" value="Salvar"></input>
        </form>
    </body>

    <script>
        // Para fazer com q a Unidade selecionada seja a mesma q está no banco de dados

        var cod_unidade = @json($ingrediente[0]->cod_unidade);

        var opcoesDeUnidade = document.getElementById('opcoesDeUnidade');

        for (var i = 0; i < opcoesDeUnidade.options.length; i++)
        {
            if (opcoesDeUnidade.options[i].value == cod_unidade)
            {
                opcoesDeUnidade.selectedIndex = i;
                break;
            }
        }
    </script>
</html>
