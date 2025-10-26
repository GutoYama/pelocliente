<!DOCTYPE html>
<html>
    <body>
        <table>
            @include('partials.nav', ['x' => 5])
            @include('partials.tabelas')
            @include('partials.img')
            @include('partials.add', ['link' => '/ingrediente/adicionar', 'icone' => 'https://cdn-icons-png.flaticon.com/128/54/54414.png', 'aba' => 'Ingrediente'])
            <thead>
                <tr>
                    <th>Descrição</th>
                    <th>Quantidade</th>
                    <th>Unidade</th>
                    <th>Valor Unitário</th>
                    <th>Editar</th>
                    <th>Excluir</th>
                </tr>
            </thead>

            <tbody>
                @foreach($ingredientes as $ingrediente)
                    <tr>
                        <td>{{ $ingrediente->descricao }}</td>
                        <td>{{ $ingrediente->quantidade }}</td>
                        <td>{{ $ingrediente->sigla }}</td>
                        <td>R$ {{ number_format($ingrediente->valor_unit, 2, ',', '.') }}</td>

                        <td>
                            <a href="{{ route('ingredienteEditar', $ingrediente->cod_ingrediente) }}"><img src="https://cdn-icons-png.flaticon.com/128/2951/2951128.png" alt=""></a>
                        </td>
                        <td>
                            <a href="{{ route('ingredienteExcluir', $ingrediente->cod_ingrediente) }}"><img src="https://cdn-icons-png.flaticon.com/128/1214/1214428.png" alt=""></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </body>
</html>
