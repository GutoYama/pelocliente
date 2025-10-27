<!DOCTYPE html>
<html>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <body>
        @include('partials.nav', ['x'=>0])

        

        <form action='/composicaoEditar_bd' method='POST'>
            @csrf
            
            <input type='hidden' name='cod_prato' value='{{$composicoes[0]->cod_prato}}'>
            
            @php $contador = 0; @endphp

            @foreach($composicoes as $composicao)
                @php $contador += 1; @endphp
                <select name='cod_ingrediente[]'>
                    @foreach($ingredientes as $ingrediente)
                        <option value='{{$ingrediente->cod_ingrediente}}' {{ $composicao->cod_ingrediente == $ingrediente->cod_ingrediente ? 'selected' : '' }} >{{$ingrediente->descricao}}</option>
                    @endforeach
                </select>

                <input value='{{$composicao->quantidade}}' name='quantidade[]' type='number' step='0.01'>
                <p>{{$composicao->sigla}}</p>
            @endforeach

            <input type='submit' value='salvar'>
        </form>
    </body>

    <script>
        // ADICIONAR FORMA DE NÃO DEIXAR O USUÁRIO TENTAR ADD DUAS VEZES O MESMO INGREDIENTE!!!
    </script>
</html>