<!DOCTYPE html>
<html>
    <body>
        @include('partials.nav', ['x'=>0])
        <form action="/unidade/adicionar_bd" method="POST">
            @csrf
            <label>Descrição</label>
            <input name="descricao" type="text"></input>

            <label>Sigla</label>
            <input name="sigla" type="text"></input>

            <input type="submit"></input>
        </form>
    </body>
</html>
