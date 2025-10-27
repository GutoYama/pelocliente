<!DOCTYPE html>
<html>
    <body>
        @include('partials.nav', ['x'=>0])
        <form action="/fornecedor/adicionar_bd" method="POST">
            @csrf
            <label>Nome Fantasia</label>
            <input name="nome_fantasia" type="text"></input>
            <label>Endereco</label>
            <input name="endereco" type="text"></input>
            <label>CNPJ</label>
            <input name="cnpj" type="text"></input>
            <label>Telefone</label>
            <input name="telefone" type="text"></input>
            <input type="submit"></input>
        </form>
    </body>
</html>