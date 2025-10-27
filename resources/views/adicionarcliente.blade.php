<!DOCTYPE html>
<html>
    <body>
        @include('partials.nav', ['x'=>0])
        @include('partials.formularios')
        <form action="/cliente/adicionar_bd" method="POST">
            @csrf
            <label>Nome</label>
            <input name="nome" type="text"></input>

            <label>CPF</label>
            <input name="cpf" type="text"></input>

            <label>Endereço</label>
            <input name="endereco" type="text"></input>

            <label>Telefone</label>
            <input name="telefone" type="text"></input>

            <label>Email</label>
            <input name="email" type="email"></input>

            <center><input class="enviar" type="submit"></input></center>
        </form>
    </body>
</html>
