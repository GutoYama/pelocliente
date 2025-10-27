<!DOCTYPE html>
<html>
    <body>
        @include('partials.nav', ['x'=>0])
        @include('partials.formularios')
        <form action="/prato/adicionar_bd" method="POST">
            @csrf
            <label>Descrição</label>
            <input name="descricao" type="text"></input>

            <label>Valor</label>
            <input name="valor" type="text"></input>

            <input type="submit"></input>
        </form>
    </body>
</html>
