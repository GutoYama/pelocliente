<!DOCTYPE html>
<html>
    <body>
        @include('partials.nav', ['x'=>0])

        

        <form action='/composicao/adicionar_bd' method='POST'>
            @csrf
            
            <select id='prato' name='prato'>
                @foreach($pratos as $prato)
                    <option value='{{$prato->cod_prato}}'>{{$prato->descricao}}</option>
                @endforeach
            </select>

            <button type='button' onclick='adicionarComposicao()'>Adicionar Composicao</button>

            <div id='composicao1'>
                <select id='ingrediente1' name='ingrediente1'>
                @foreach($ingredientes as $ingrediente)
                    <option value='{{$ingrediente->cod_ingrediente}}'>{{$ingrediente->descricao}}</option>
                @endforeach
                </select>

                <input type='number' id='quantidadeingrediente1' name='quantidadeingrediente1' step='any'>
                <p id='unidade1'>  </p>
            </div>

            <input type='hidden' id='totaldeingredientes' name='totaldeingredientes' value=1>

            <input type='submit' value='evmia'>
        </form>
    </body>

    <script>
            var contadorDeComposicoes = 1;
            var ingredientes = @json($ingredientes);

            


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
                    

                console.log(event.target);

                for(var i = 0; i < ingredientes.length; i++)
                {
                    if (ingredientes[i]['cod_ingrediente'] == cod_ingrediente_selecionado)
                    {
                        formComposicaoPai.innerText = ingredientes[i]['sigla'];
                    }
                }
            }

            var composicaoOriginal = document.getElementById('composicao1').querySelector('select');
            composicaoOriginal.addEventListener('change', alterarUnidade);
            alterarUnidade({currentTarget: composicaoOriginal});



            function adicionarComposicao()
            {
                contadorDeComposicoes++;

                document.getElementById('totaldeingredientes').value = contadorDeComposicoes;

                var formComposicaoOriginal = document.getElementById('composicao' + (contadorDeComposicoes - 1).toString());

                var formComposicao = formComposicaoOriginal.cloneNode(true); // Chama form mas não é o form todo, só a quantidade e os ingredientes

                formComposicao.id = 'composicao' + contadorDeComposicoes.toString();

                formComposicao.querySelector('select').id = 'ingrediente' + contadorDeComposicoes.toString();
                formComposicao.querySelector('select').name = 'ingrediente' + contadorDeComposicoes.toString();
                
                formComposicao.querySelector('input').id= 'quantidadeingrediente' + contadorDeComposicoes.toString();
                formComposicao.querySelector('input').name = 'quantidadeingrediente' + contadorDeComposicoes.toString();

                formComposicao.querySelector('p').id= 'unidade' + contadorDeComposicoes.toString();

                formComposicao.querySelector('select').addEventListener('change', alterarUnidade);

                formComposicaoOriginal.after(formComposicao);
            }

    </script>
</html>