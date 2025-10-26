<!DOCTYPE html>
<html>
    <body>
        @include('partials.nav', ['x' => 2])
        @include('partials.tabelas')
        
        @foreach($composicoes as $composicao)
        <p>{{$composicao[0]->descricao_prato}}</p>
        <table>
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
                            <a href="{{ route('composicaoEditar', [$comp->cod_prato, $comp->cod_ingrediente]) }}">Editar</a>
                        </td>
                        <td>
                            <a href="{{ route('composicaoExcluir', [$comp->cod_prato, $comp->cod_ingrediente]) }}">Excluir</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @endforeach
    </body>
</html>
