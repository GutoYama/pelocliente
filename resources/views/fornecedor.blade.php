<!DOCTYPE html>
<html>
    <body>
        @include('partials.nav', ['x' => 4])
        @include('partials.tabelas')
        @include('partials.img')
        @include('partials.add', ['link' => '/fornecedor/adicionar', 'icone' => 'https://cdn-icons-png.flaticon.com/128/54/54414.png'])
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
                    
                    <td> <a href="{{ route('fornecedorEditar', $fornecedor->cod_fornecedor) }}"><img src="https://cdn-icons-png.flaticon.com/128/2951/2951128.png" alt=""></a> </td>
                    <td> <a href="{{ route('fornecedorExcluir', $fornecedor->cod_fornecedor) }}"><img src="https://cdn-icons-png.flaticon.com/128/1214/1214428.png" alt=""></a> </td>
                </tr>
            @endforeach

        </table>
    </body>
</html>