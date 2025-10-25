<!DOCTYPE html>
<html>
    <body>
        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>Endereço</th>
                    <th>Telefone</th>
                    <th>Email</th>
                    <th>Editar</th>
                    <th>Excluir</th>
                </tr>
            </thead>

            @foreach($clientes as $cliente)
                <tr>
                    <td>{{ $cliente->nome }}</td>
                    <td>{{ $cliente->cpf }}</td>
                    <td>{{ $cliente->endereco }}</td>
                    <td>{{ $cliente->telefone }}</td>
                    <td>{{ $cliente->email }}</td>

                    <td>
                        <a href="{{ route('clienteEditar', $cliente->cod_cliente) }}">Editar</a>
                    </td>
                    <td>
                        <a href="{{ route('clienteExcluir', $cliente->cod_cliente) }}">Excluir</a>
                    </td>
                </tr>
            @endforeach

        </table>
    </body>
</html>
