<!DOCTYPE html>
<html>
    <body>
        @include('partials.nav', ['x' => 9])
        @include('partials.tabelas')
        @include('partials.img')
        @include('partials.add', ['link' => '/prato/adicionar', 'icone' => 'https://cdn-icons-png.flaticon.com/128/54/54414.png'])
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
                        <a href="{{ route('pratoEditar', $prato->cod_prato) }}"><img src="https://cdn-icons-png.flaticon.com/128/2951/2951128.png" alt=""></a>
                    </td>
                    <td>
                        <a href="{{ route('pratoExcluir', $prato->cod_prato) }}"><img src="https://cdn-icons-png.flaticon.com/128/1214/1214428.png" alt=""></a>
                    </td>
                </tr>
            @endforeach

        </table>
    </body>
</html>
