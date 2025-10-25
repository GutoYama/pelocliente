<!DOCTYPE html>
<html>
    <body>
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
                            <a href="{{ route('compraEditar', $compra->cod_compra) }}">Editar</a>
                        </td>
                        <td>
                            <a href="{{ route('compraExcluir', $compra->cod_compra) }}">Excluir</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </body>
</html>
