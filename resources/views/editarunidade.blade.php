<!DOCTYPE html>
<html>
    <body>
        <form action="/unidadeEditar_bd" method="GET">
            @csrf

            <input type="hidden" name="cod_unidade" value="{{$unidade[0]->cod_unidade}}">

            <label>Descrição</label>
            <input name="descricao" type="text" value="{{$unidade[0]->descricao}}"></input>

            <label>Sigla</label>
            <input name="sigla" type="text" value="{{$unidade[0]->sigla}}"></input>

            <input type="submit" value="Salvar"></input>
        </form>
    </body>
</html>
