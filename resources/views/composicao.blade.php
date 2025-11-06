<!DOCTYPE html>
<html>
    <head>
        <style>
            .acoes{
                position: relative;
            }

            .editar, .excluir{
                position: absolute;
                top: -40px;
            }

            .editar{
                right: 60px;
            }

            .excluir{
                right: 5px;   
            }
        </style>
    </head>
    <body>
        @include('partials.nav', ['x' => 2])
        @include('partials.tabelas')
        @include('partials.img')
        @include('partials.pratos')
        @include('partials.add', ['link' => '/composicao/adicionar', 'icone' => 'https://cdn-icons-png.flaticon.com/128/54/54414.png', 'aba' => 'Composicao'])
        
        <div class="listapratos">
            @foreach($composicoes as $composicao)
            <div class="pratos">
                <center><p>{{$composicao[0]->descricao_prato}}</p></center>
                <h3>Valor: {{$composicao[0]->valor}}</h3>
                
                <div class="acoes">
                    <a href="{{ route('composicaoEditar', ['id'=>$composicao[0]->cod_prato]) }}"><img class="editar" src="https://cdn-icons-png.flaticon.com/128/2951/2951128.png" alt=""></a>
                    <a href="{{ route('composicaoExcluir', ['id'=>$composicao[0]->cod_prato]) }}"><img class="excluir" src="https://cdn-icons-png.flaticon.com/128/1214/1214428.png" alt=""></a>
                </div>
                
                <table class="tabelaComposicao">
                    <thead>
                        <tr>
                            <th>Quantidade</th>
                            <th>Ingrediente</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach($composicao as $comp)
                            <tr>
                                <td>{{ $comp->quantidade }} {{ $comp->sigla }}</td>
                                <td>{{ $comp->descricao_ingrediente }}</td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            @endforeach
        </div>
    </body>
</html>
