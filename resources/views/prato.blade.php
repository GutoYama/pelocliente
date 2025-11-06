<!DOCTYPE html>
<html>
    <head>
        <style>
            main{    
                overflow-x: hidden;

                width: 70%;
                height: calc(100vh - 140px);

                display: flex;
                flex-direction: column;
                
                gap: 30px;
                padding-bottom: 20px;
                padding-right: 20px;
                padding-top: 20px;
                margin-left: auto;
                margin-right: auto;
            }
            
            main::-webkit-scrollbar{
                display: none;
            }
        </style>
    </head>
    <body>
        @include('partials.nav', ['x' => 8])
        @include('partials.tabelas')
        @include('partials.img')
        @include('partials.add', ['link' => '/prato/adicionar', 'icone' => 'https://cdn-icons-png.flaticon.com/128/54/54414.png', 'aba' => 'Prato'])
        <main>
            <table>
                <thead>
                    <tr>
                        <th>Descrição</th>
                        <th>Valor</th>
                        <th>Editar</th>
                        <th>Excluir</th>
                    </tr>
                </thead>

                @foreach($pratos as $prato)
                    <tr>
                        <td>{{ $prato->descricao }}</td>
                        <td>{{ $prato->valor }}</td>

                        <td>
                            <a href="{{ route('pratoEditar', ['id'=>$prato->cod_prato]) }}"><img src="https://cdn-icons-png.flaticon.com/128/2951/2951128.png" alt=""></a>
                        </td>
                        <td>
                            <a href="{{ route('pratoExcluir', ['id'=>$prato->cod_prato]) }}"><img src="https://cdn-icons-png.flaticon.com/128/1214/1214428.png" alt=""></a>
                        </td>
                    </tr>
                @endforeach

            </table>
        </main>
    </body>
</html>
