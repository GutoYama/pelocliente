<!DOCTYPE html>
<html>
    
    <body>
        @include('partials.nav',['x' => 1])
        @include('partials.tabelas')
        @include('partials.img')
        @include('partials.add', ['link' => '/cliente/adicionar', 'icone' => 'https://cdn-icons-png.flaticon.com/128/3394/3394625.png', 'aba' => 'Cliente'])

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
                        <a href="{{ route('clienteEditar', ['id'=>$cliente->cod_cliente]) }}"><img src="https://cdn-icons-png.flaticon.com/128/2951/2951128.png" alt=""></a>
                    </td>
                    <td>
                        <a href="{{ route('clienteExcluir', ['id'=>$cliente->cod_cliente]) }}"><img src="https://cdn-icons-png.flaticon.com/128/1214/1214428.png" alt=""></a>
                    </td>
                </tr>
            @endforeach

        </table>
    </body>
</html>
