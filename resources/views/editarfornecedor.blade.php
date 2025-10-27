<!DOCTYPE html>
<html>
    <body>
        <form action="/fornecedorEditar_bd" method="GET">
            @csrf

            <input type="hidden" name="cod_fornecedor" value="{{$fornecedor[0]->cod_fornecedor}}">

            <label>Nome Fantasia</label>
            <input name="nome_fantasia" type="text" value="{{$fornecedor[0]->nome_fantasia}}"></input>

            <label>Endereço</label>
            <input name="endereco" type="text" value="{{$fornecedor[0]->endereco}}"></input>

            <label>CNPJ</label>
            <input name="cnpj" type="text" value="{{$fornecedor[0]->cnpj}}"></input>

            <label>Telefone</label>
            <input name="telefone" type="text" value="{{$fornecedor[0]->telefone}}"></input>

            <input type="submit" value="Salvar"></input>
        </form>
    </body>
</html>
