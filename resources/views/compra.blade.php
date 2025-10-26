<!DOCTYPE html>
<html>
    <body>
        @include('partials.nav', ['x' => 3])
        @include('partials.tabelas')
        @include('partials.img')
        @include('partials.add', ['link' => '/compra/adicionar', 'icone' => 'https://cdn-icons-png.flaticon.com/128/54/54414.png'])
        <table>
            <thead>
                <tr>
                    <th>Código da Compra</th>
                    <th>Quantidade</th>
                    <th>Ingrediente</th>
                    <th>Fornecedor</th>
                    <th>Editar</th>
                    <th>Excluir</th>
                </tr>
            </thead>

            <tbody>
                @foreach($compras as $compra)
                    <tr>
                        <td>{{ $compra->cod_compra }}</td>
                        <td>{{ $compra->quantidade }} {{ $compra->sigla }}</td>
                        <td>{{ $compra->descricao_ingrediente }}</td>
                        <td>{{ $compra->nome_fantasia }}</td>

                        <td>
                            <a href="{{ route('compraEditar', $compra->cod_compra) }}"><img src="https://cdn-icons-png.flaticon.com/128/2951/2951128.png" alt=""></a>
                        </td>
                        <td>
                            <a href="{{ route('compraExcluir', $compra->cod_compra) }}"><img src="https://cdn-icons-png.flaticon.com/128/1214/1214428.png" alt=""></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </body>
</html>
