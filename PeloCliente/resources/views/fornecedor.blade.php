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
                    <td>Botao Editar</td>
                    <td>Botao Excluir</td>
                </tr>
            @endforeach

        </table>
    </body>
</html>