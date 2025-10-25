<!DOCTYPE html>
<html>
    <body>
        @include('partials.nav', ['x' => 6])
        @include('partials.tabelas')
        <table>
            <thead>
                <tr>
                    <th>Descrição</th>
                    <th>Sigla</th>
                    <th>Editar</th>
                    <th>Excluir</th>
                </tr>
            </thead>

            <tbody>
                @foreach($unidades as $unidade)
                    <tr>
                        <td>{{ $unidade->descricao }}</td>
                        <td>{{ $unidade->sigla }}</td>

                        <td>
                            <a href="{{ route('unidadeEditar', $unidade->cod_unidade) }}">Editar</a>
                        </td>
                        <td>
                            <a href="{{ route('unidadeExcluir', $unidade->cod_unidade) }}">Excluir</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </body>
</html>
