<!DOCTYPE html>
<html>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <body>
        @include('partials.nav', ['x'=>0])
        @include('partials.formularios')

        

        <form action='/composicao/adicionar_bd' method='POST'>
            @csrf
            <label for="">Pratos</label>
            <select id='prato' name='prato'>
                    <option value="">Selecionar Prato</option>  
                @foreach($pratos as $prato)
                    <option value='{{$prato->cod_prato}}'>{{$prato->descricao}}</option>
                @endforeach
            </select>

            <div id='ingredientes_do_prato'>
            
            </div>

            <label for="">Ingredientes</label>
            <div id='composicao1'>
                <select id='ingrediente1' name='ingrediente1'>
                    <option value="">Selecionar Ingrediente</option>
                @foreach($ingredientes as $ingrediente)
                    <option value='{{$ingrediente->cod_ingrediente}}'>{{$ingrediente->descricao}}</option>
                @endforeach
                </select>

                <input type='number' id='quantidadeingrediente1' name='quantidadeingrediente1' step='any'>
                <p id='unidade1'>  </p>
            </div>

            <input type='hidden' id='totaldeingredientes' name='totaldeingredientes' value=1>

            <button class="adicionarComposicao" type='button' onclick='adicionarComposicao()'>
                <img class="adicionar" src="https://cdn-icons-png.flaticon.com/128/54/54414.png" alt="">
                Adicionar Composicao
            </button>
            <center><input class="enviar" type='submit' value='evmia'></center>
        </form>
    </body>

    <script>
            var contadorDeComposicoes = 1;
            var ingredientes = @json($ingredientes);
            
            function adicionarIngrediente()
            {

            }

            function alterarIngredientesListados(event)
            {
                if (event.target === undefined)
                    var cod_prato = 1;
                else
                    var cod_prato = event.target.value;

                $.ajax({
                    url: '/composicao/listar_composicoes',
                    type: 'GET',
                    data: {id: cod_prato},
                    success: function(resposta){
                        
                        var composicoesListadas = document.getElementById('ingredientes_do_prato');
                        composicoesListadas.innerHTML = "";

                        for(var i = 0; i < resposta.composicoes.length; i++)
                        {
                            var novoIngrediente = document.createElement('ul');
                            novoIngrediente.id = 'novo_ingrediente';
                            
                            novoIngrediente.innerHTML = "<li>" + 
                                resposta.composicoes[i].descricao_ingrediente + " " + 
                                resposta.composicoes[i].quantidade + 
                                resposta.composicoes[i].sigla + 
                                "</li>";

                            composicoesListadas.appendChild(novoIngrediente);
                        }
                    }
                });
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

                formComposicaoOriginal.after(formComposicao);
            }

    </script>
</html>