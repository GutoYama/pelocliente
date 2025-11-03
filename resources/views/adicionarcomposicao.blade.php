<!DOCTYPE html>
<html>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <body>
        @include('partials.nav', ['x'=>0])
        @include('partials.formularios')

        

        <form action='/composicao/adicionar_bd' method='POST'>
            @csrf
            <label for="">Dados do Prato</label>
            <label>Nome </label>
            <input type='text' name='descricao_prato'>
            <label>Valor </label>
            <input type='number' name='valor_prato'>

            <div id='ingredientes_do_prato'>
            
            </div>

            <label for="">Ingredientes</label>
                <div class="composicao" id='composicao1' onchange='(verificarIngredienteSelecionado)'>
                    <select id='ingrediente1' name='ingrediente1'>
                        <option value="">Selecionar Ingrediente</option>
                    @foreach($ingredientes as $ingrediente)
                        <option value='{{$ingrediente->cod_ingrediente}}'>{{$ingrediente->descricao}}</option>
                    @endforeach
                    </select>

                    <input type='number' id='quantidadeingrediente1' name='quantidadeingrediente1' step='any'>
                    <p id='unidade1'>  </p>
                    <img class="excluirComposicao" src='https://cdn-icons-png.flaticon.com/128/1214/1214428.png' onclick='excluirComposicao(event)'>
                </div>

            <input type='hidden' id='totaldeingredientes' name='totaldeingredientes' value=1>

            <button class="adicionarComposicao" type='button' onclick='adicionarComposicao()'>
                <img class="adicionar" src="https://cdn-icons-png.flaticon.com/128/54/54414.png" alt="">
                Adicionar Ingrediente na Composicao
            </button>
            <center><input class="enviar" type='submit' value='evmia'></center>
        </form>
    </body>

    <script>
            var contadorDeComposicoes = 1;
            var ingredientes = @json($ingredientes);
            
            function excluirComposicao(event)
            {
                var divComposicao = event.target.parentElement;

                divComposicao.remove();
            }

            function adicionarIngrediente()
            {

            }

            function verificarIngredienteSelecionado(event)
            {
                var cod_ingrediente_selecionado = event.target.selectedOptions[0].value;

                var id_select = event.target.id;

                console.log(id_select);

                for (var i = 1; i <= contadorDeComposicoes; i++)
                {
                    var selectIngrediente = document.getElementById('ingrediente' + i);
                    
                    if (selectIngrediente != null)
                    {
                        if (selectIngrediente.id != id_select)
                        {
                            if (selectIngrediente.value == cod_ingrediente_selecionado)
                            {
                                alert('Prezado(a) funcionário, não é permitido a inclusão do mesmo ingrediente mais de uma vez.');

                                event.target.selectedIndex = 0;
                                break;
                            }
                        }
                    }                    
                }
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

            var composicaoOriginal = document.getElementById('composicao1').querySelector('select');
            composicaoOriginal.addEventListener('change', alterarUnidade);
            //alterarUnidade({currentTarget: composicaoOriginal});

            var listaDeIngredientes = document.getElementById('prato');
            listaDeIngredientes.addEventListener('change', alterarIngredientesListados);
            //alterarIngredientesListados({ currentTarget: listaDeIngredientes });

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
                formComposicao.querySelector('select').addEventListener('change', verificarIngredienteSelecionado);

                formComposicaoOriginal.after(formComposicao);
            }

    </script>
</html>