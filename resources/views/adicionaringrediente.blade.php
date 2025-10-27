<!DOCTYPE html>
<html>
    <body>
        @include('partials.nav', ['x'=>0])
        @include('partials.formularios')
        <form action="/ingrediente/adicionar_bd" method="POST">
            @csrf
            <label>Descrição</label>
            <input name="descricao" type="text"></input>

            <label>Quantidade em estoque</label>
            <input name="quantidade" type="text"></input>

            <label>Unidade Utilizada</label>
            <select name='unidade'>
                @foreach($unidades as $unidade)
                    <option value='{{$unidade->cod_unidade}}'>{{$unidade->descricao}}</option>
                @endforeach
            </select>

            <label>Valor Unitário</label>
            <input name="valor_unit" type="text"></input>

            <input type="submit"></input>
        </form>
    </body>
</html>
