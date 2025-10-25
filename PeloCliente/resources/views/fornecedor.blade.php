<!DOCTYPE html>
<html>
    <body>
        <table>
            <thead>
                <tr>
                    <th>Nome Fantasia</th>
                    <th>Endereço</th>
                    <th>CNPJ</th>
                    <th>Telefone</th>
                    <th>Editar</th>
                    <th>Excluir</th>
                </tr>
            </thead>

            @foreach($fornecedores as $fornecedor)
                <tr>
                    <td>{{$fornecedor->nome_fantasia}}</td>
                    <td>{{$fornecedor->endereco}}</td>
                    <td>{{$fornecedor->cnpj}}</td>
                    <td>{{$fornecedor->telefone}}</td>
                    
                    <td> <a href="{{ route('fornecedorEditar', $fornecedor->cod_fornecedor) }}">Editar</a> </td>
                    <td> <a href="{{ route('fornecedorExcluir', $fornecedor->cod_fornecedor) }}">Excluir</a> </td>
                </tr>
            @endforeach

        </table>
    </body>
</html>