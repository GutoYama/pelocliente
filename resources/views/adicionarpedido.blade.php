<!DOCTYPE html>
<html>
    <body>
        @include('partials.nav', ['x'=>0])
        @include('partials.formularios')
        <form action="/fornecedor/adicionar_bd" method="POST">
            @csrf
            <label>Cliente</label>
            <select name='cliente'>
                <option></option>
                
                @foreach($clientes as $cliente)
                    <option value='{{$cliente->cod_cliente}}'>{{$cliente->nome}}</option>
                @endforeach
            </select>
        </form>
    </body>
</html>