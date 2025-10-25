<!DOCTYPE html>
<html>
    <body>
        @include('partials.nav', ['x' => 9])
        @include('partials.tabelas')
        <table>
            <thead>
                <tr>
                    <th>Descrição</th>
                    <th>Valor</th>
                    <th>Editar</th>
                    <th>Excluir</th>
                </tr>
            </thead>

            @foreach($pratos as $prato)
                <tr>
                    <td>{{ $prato->descricao }}</td>
                    <td>{{ $prato->valor }}</td>

                    <td>
                        <a href="{{ route('pratoEditar', $prato->cod_prato) }}">Editar</a>
                    </td>
                    <td>
                        <a href="{{ route('pratoExcluir', $prato->cod_prato) }}">Excluir</a>
                    </td>
                </tr>
            @endforeach

        </table>
    </body>
</html>
