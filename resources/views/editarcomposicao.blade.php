<!DOCTYPE html>
<html>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <body>
        @include('partials.nav', ['x'=>0])
        @include('partials.formularios')

        

        <form action='/composicaoEditar_bd' method='POST' id='form_composicao'>
            @csrf
            
            <input type='hidden' name='cod_prato' value='{{$composicoes[0]->cod_prato}}'>

            <p>{{$composicoes[0]->descricao_prato}}</p>
            
            @php $contador = 0; @endphp

            @foreach($composicoes as $composicao)
                @php $contador += 1; @endphp
                <select name='cod_ingrediente[]' onchange='verificarIngrediente(event)' id='ingrediente{{$contador}}'>
                    @foreach($ingredientes as $ingrediente)
                        <option value='{{$ingrediente->cod_ingrediente}}' {{ $composicao->cod_ingrediente == $ingrediente->cod_ingrediente ? 'selected' : '' }} >{{$ingrediente->descricao}}</option>
                    @endforeach
                </select>

                <input value='{{$composicao->quantidade}}' name='quantidade[]' type='number' step='0.01'>
                <p>{{$composicao->sigla}}</p>
            @endforeach

            <center><input class="enviar" type='submit' value='salvar'></center>
        </form>
    </body>

    <script>
        // ADICIONAR FORMA DE NÃO DEIXAR O USUÁRIO TENTAR ADD DUAS VEZES O MESMO INGREDIENTE!!!

        var ingredientes_selecionados_originais = {};

        var selects_ingredientes_originais = document.getElementById('form_composicao').querySelectorAll('select');

        for (var i = 0; i < selects_ingredientes_originais.length; i++)
        {
            var select = selects_ingredientes_originais[i];
            ingredientes_selecionados_originais[select.id] = select.selectedIndex;
        }

        console.log(ingredientes_selecionados_originais)

        function verificarIngrediente(event)
        {
            var selects_ingrediente = document.getElementById('form_composicao').querySelectorAll('select');
            var cod_ingrediente_selecionado = event.target.selectedOptions[0].value;

            for (var i = 0; i < selects_ingrediente.length; i++)
            {
                if (event.target != selects_ingrediente[i])
                {
                    if (cod_ingrediente_selecionado == selects_ingrediente[i].selectedOptions[0].value)
                    {
                        alert('Ingrediente não pode ser adicionado duas vezes.');
                        
                        event.target.selectedIndex = ingredientes_selecionados_originais[event.target.id];
                    }
                }
            }
        }
    </script>
</html>