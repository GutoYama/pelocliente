<!DOCTYPE html>
<html>
    <body>
        @include('partials.nav', ['x' => 0])
        @include('partials.formularios')
        <form action="/pratoEditar_bd" method="GET">
            @csrf

            <input type="hidden" name="cod_prato" value="{{$prato[0]->cod_prato}}">

            <label>Descrição</label>
            <input name="descricao" type="text" value="{{$prato[0]->descricao}}"></input>

            <label>Valor</label>
            <input name="valor" type="number" step="0.01" value="{{$prato[0]->valor}}"></input>

            <center><input class="enviar" type="submit" value="Salvar"></input></center>
        </form>
    </body>
</html>
