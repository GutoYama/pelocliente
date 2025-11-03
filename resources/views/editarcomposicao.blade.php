<!DOCTYPE html>
<html>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <head>
        <style>
            .ingrediente{
                display: flex;
                flex-direction: row;
                gap: 10px;
                align-items: center;    
            }

            .ingrediente p{
                position: relative;
                left: -40px;
            }

            .ingrediente input{
                width: 70px;
            }

            .ingrediente img{
                position: relative;
                left: 0;
                top: -2px;
            }
        </style>
    </head>
    <body>
        @include('partials.nav', ['x'=>0])
        @include('partials.formularios')

        

        <form action='/composicaoEditar_bd' method='POST' id='form_composicao'>
            @csrf
            
            <input type='hidden' name='cod_prato' value='{{$prato[0]->cod_prato}}'>

            <h2>{{ $prato[0]->descricao }}</h2>

            <h3>Valor: {{ $prato[0]->valor }}</h3>
            
            @php $contador = 0; @endphp

            @foreach($composicoes as $composicao)
                @php $contador += 1; @endphp
                <script>contadorDeComposicoes++</script>
                <div class='ingrediente {{$contador}}'>
                    <select name='cod_ingrediente[]' onchange='verificarIngrediente(event)' id='ingrediente{{$contador}}'>
                        <option></option>
                        @foreach($ingredientes as $ingrediente)
                            <option value='{{$ingrediente->cod_ingrediente}}' {{ $composicao->cod_ingrediente == $ingrediente->cod_ingrediente ? 'selected' : '' }} >{{$ingrediente->descricao}}</option>
                        @endforeach
                    </select>

                    <input value='{{$composicao->quantidade}}' name='quantidade[]' type='number' step='0.01'>
                    <p>{{$composicao->sigla}}</p>

                    <img src="https://cdn-icons-png.flaticon.com/128/1214/1214428.png" onclick='excluirComposicao(event)'>
                </div>
            @endforeach

            <button class="adicionarComposicao" type='button' onclick='adicionarComposicao()'>
                <img class="adicionar" src="https://cdn-icons-png.flaticon.com/128/54/54414.png" alt="">
                Adicionar Ingrediente na Composicao
            </button>

            <center><input class="enviar" type='submit' value='salvar'></center>
        </form>
    </body>

    <script>
        var contadorDeComposicoes = @json($contador);

        var ingredientes_selecionados_originais = {};

        var selects_ingredientes_originais = document.getElementById('form_composicao').querySelectorAll('select');

        for (var i = 0; i < selects_ingredientes_originais.length; i++)
        {
            var select = selects_ingredientes_originais[i];
            ingredientes_selecionados_originais[select.id] = select.selectedIndex;
        }

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
                        alert('Prezado(a) funcionário, não é permitido a inclusão do mesmo ingrediente mais de uma vez.');
                        
                        event.target.selectedIndex = ingredientes_selecionados_originais[event.target.id];
                    }
                }
            }
        }

        function excluirComposicao(event)
        {
            var divComposicao = event.target.parentElement;

            divComposicao.remove();
        }

        function alterarUnidade(event)
        {
            if (event.target === undefined)
            {
                var cod_ingrediente_selecionado = 1;
                var formComposicaoPai = document.getElementById('composicao1').querySelector('p')
            }
            else
            {
                var cod_ingrediente_selecionado = event.target.selectedOptions[0].value;
                var formComposicaoPai = event.target.parentElement.querySelector('p');
            }

            for(var i = 0; i < ingredientes.length; i++)
            {
                if (ingredientes[i]['cod_ingrediente'] == cod_ingrediente_selecionado)
                {
                    formComposicaoPai.innerText = ingredientes[i]['sigla'];
                }
            }
        }

        function adicionarComposicao()
        {
            contadorDeComposicoes++;

            //document.getElementById('totaldeingredientes').value = contadorDeComposicoes;

            var formComposicaoOriginal = document.getElementById('composicao' + (contadorDeComposicoes - 1).toString());

            console.log('composicao' + (contadorDeComposicoes - 1).toString());

            var formComposicao = formComposicaoOriginal.cloneNode(true); // Chama form mas não é o form todo, só a quantidade e os ingredientes

            formComposicao.id = 'composicao' + contadorDeComposicoes.toString();

            formComposicao.querySelector('select').id = 'ingrediente' + contadorDeComposicoes.toString();
            formComposicao.querySelector('select').name = 'cod_ingrediente[]';
            
            formComposicao.querySelector('input').id= 'quantidadeingrediente' + contadorDeComposicoes.toString();
            formComposicao.querySelector('input').name = 'quantidade[]' + contadorDeComposicoes.toString();

            formComposicao.querySelector('p').id= 'unidade' + contadorDeComposicoes.toString();

            formComposicao.querySelector('select').addEventListener('change', alterarUnidade);
            formComposicao.querySelector('select').addEventListener('change', verificarIngrediente);

            formComposicaoOriginal.after(formComposicao);
        }
    </script>
</html>