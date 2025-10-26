<!DOCTYPE html>
<html>
    <body>
        @include('partials.nav', ['x' => 2])
        @include('partials.tabelas')
        @include('partials.img')
        @include('partials.pratos')
        
        <div class="listapratos">
            @foreach($composicoes as $composicao)
            <div class="pratos">
                <center><p>{{$composicao[0]->descricao_prato}}</p></center>
                <table>
                    <thead>
                        <tr>
                            <th>Quantidade</th>
                            <th>Ingrediente</th>
                            <th>Editar</th>
                            <th>Excluir</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach($composicao as $comp)
                            <tr>
                                <td>{{ $comp->quantidade }} {{ $comp->sigla }}</td>
                                <td>{{ $comp->descricao_ingrediente }}</td>

                                <td>
                                    <a href="{{ route('composicaoEditar', [$comp->cod_prato]) }}"><img src="https://cdn-icons-png.flaticon.com/128/2951/2951128.png" alt=""></a>
                                </td>
                                <td>
                                    <a href="{{ route('composicaoExcluir', [$comp->cod_prato]) }}"><img src="https://cdn-icons-png.flaticon.com/128/1214/1214428.png" alt=""></a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            @endforeach
        </div>
    </body>
</html>
