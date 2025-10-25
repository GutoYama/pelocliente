<!DOCTYPE html>
<html>
    <body>
        @include('partials.nav', ['x' => 2])
        @include('partials.tabelas')
        <table>
            <thead>
                <tr>
                    <th>Quantidade</th>
                    <th>Ingrediente</th>
                    <th>Prato</th>
                    <th>Editar</th>
                    <th>Excluir</th>
                </tr>
            </thead>

            <tbody>
                @foreach($composicoes as $comp)
                    <tr>
                        <td>{{ $comp->quantidade }} {{ $comp->sigla }}</td>
                        <td>{{ $comp->descricao_ingrediente }}</td>
                        <td>{{ $comp->descricao_prato }}</td>

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
    </body>
</html>
