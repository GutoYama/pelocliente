<!DOCTYPE html>
<html>
    <body>
        <form action="/pratoEditar_bd" method="GET">
            @csrf

            <input type="hidden" name="cod_prato" value="{{$prato[0]->cod_prato}}">

            <label>Descrição</label>
            <input name="descricao" type="text" value="{{$prato[0]->descricao}}"></input>

            <label>Valor</label>
            <input name="valor" type="number" step="0.01" value="{{$prato[0]->valor}}"></input>

            <input type="submit" value="Salvar"></input>
        </form>
    </body>
</html>
