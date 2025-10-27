<!DOCTYPE html>
<html>
    <body>
        <form action="/clienteEditar_bd" method="GET">
            @csrf
            
            <input type='hidden' name='cod_cliente' value='{{$cliente[0]->cod_cliente}}'>
            <label>Nome</label>
            <input name="nome" type="text" value='{{$cliente[0]->nome}}'></input>

            <label>CPF</label>
            <input name="cpf" type="text" value='{{$cliente[0]->cpf}}'></input>

            <label>Endereço</label>
            <input name="endereco" type="text" value='{{$cliente[0]->endereco}}'></input>

            <label>Telefone</label>
            <input name="telefone" type="text" value='{{$cliente[0]->telefone}}'></input>

            <label>Email</label>
            <input name="email" type="email" value='{{$cliente[0]->email}}'></input>

            <input type="submit"></input>
        </form>
    </body>
</html>
