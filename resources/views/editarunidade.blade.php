<!DOCTYPE html>
<html>
    <body>
        @include('partials.nav', ['x' => 0])
        @include('partials.formularios')
        <form action="/unidadeEditar_bd" method="GET">
            @csrf

            <input type="hidden" name="cod_unidade" value="{{$unidade[0]->cod_unidade}}">

            <label>Descrição</label>
            <input name="descricao" type="text" value="{{$unidade[0]->descricao}}"></input>

            <label>Sigla</label>
            <input name="sigla" type="text" value="{{$unidade[0]->sigla}}"></input>

            <center><input class="enviar" type="submit" value="Salvar"></input></center>
        </form>
    </body>
</html>
