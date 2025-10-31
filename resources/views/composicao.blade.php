<!DOCTYPE html>
<html>
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
                <table class="tabelaComposicao">
                    <thead>
                        <tr>
                            <th>Quantidade</th>
                            <th>Ingrediente</th>
                            <th>Editar</th>
                            <th>Excluir</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach($composicao as $comp)
                            <tr>
                                <td>{{ $comp->quantidade }} {{ $comp->sigla }}</td>
                                <td>{{ $comp->descricao_ingrediente }}</td>

                                <td>
                                    <a href="{{ route('composicaoEditar', ['id'=>$comp->cod_prato]) }}"><img src="https://cdn-icons-png.flaticon.com/128/2951/2951128.png" alt=""></a>
                                </td>
                                <td>
                                    <a href="{{ route('composicaoExcluir', ['id'=>$comp->cod_prato]) }}"><img src="https://cdn-icons-png.flaticon.com/128/1214/1214428.png" alt=""></a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            @endforeach
        </div>
    </body>
</html>
