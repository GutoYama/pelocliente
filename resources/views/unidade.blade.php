<!DOCTYPE html>
<html>
    <body>
        @include('partials.nav', ['x' => 6])
        @include('partials.tabelas')
        @include('partials.img')
        @include('partials.add', ['link' => '/unidade/adicionar', 'icone' => 'https://cdn-icons-png.flaticon.com/128/54/54414.png', 'aba' => 'Unidade'])
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
                            <a href="{{ route('unidadeEditar', ['id'=>$unidade->cod_unidade]) }}"><img src="https://cdn-icons-png.flaticon.com/128/2951/2951128.png" alt=""></a>
                        </td>
                        <td>
                            <a href="{{ route('unidadeExcluir', ['id'=>$unidade->cod_unidade]) }}"><img src="https://cdn-icons-png.flaticon.com/128/1214/1214428.png" alt=""></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </body>
</html>
