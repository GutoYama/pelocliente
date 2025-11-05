<!DOCTYPE html>
<html>
    <head>
        <style>
            @font-face {
                font-family: "October Crow";
                src: url("/fonts/October_Crow.ttf") format("truetype");
                font-weight: normal;
                font-style: normal;
            }

            #excluirClienteNao{
                width: 800px;
                position: absolute;
                left: 50%;
                top: 50%;
                transform: translate(-50%, -50%);
                color: red;
                font-family: "October Crow", cursive;
                font-size: 100px;

                text-align: center;
            }
        </style>
    </head>
    <body>
        @include('partials.nav',['x' => 1])
        @include('partials.tabelas')
        @include('partials.img')
        @include('partials.add', ['link' => '/cliente/adicionar', 'icone' => 'https://cdn-icons-png.flaticon.com/128/3394/3394625.png', 'aba' => 'Cliente'])

        <div id="excluirClienteNao"></div>

        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>Endereço</th>
                    <th>Telefone</th>
                    <th>Email</th>
                    <th>Editar</th>
                    <th>Excluir</th>
                </tr>
            </thead>

            @foreach($clientes as $cliente)
                <tr>
                    <td>{{ $cliente->nome }}</td>
                    <td>{{ $cliente->cpf }}</td>
                    <td>{{ $cliente->endereco }}</td>
                    <td>{{ $cliente->telefone }}</td>
                    <td>{{ $cliente->email }}</td>

                    <td>
                        <a href="{{ route('clienteEditar', ['id'=>$cliente->cod_cliente]) }}"><img src="https://cdn-icons-png.flaticon.com/128/2951/2951128.png" alt=""></a>
                    </td>
                    <td>
                        <a onclick="msglenta()"><img src="https://cdn-icons-png.flaticon.com/128/1214/1214428.png" alt=""></a>
                    </td>
                </tr>
            @endforeach

        </table>
        <script>
            function msglenta(){
                let msg = document.getElementById("excluirClienteNao");
                setTimeout(function(){
                    msg.innerHTML= "VOCE";
                    setTimeout(function(){
                        msg.innerHTML="VOCE NAO";
                        setTimeout(function(){
                            msg.innerHTML="VOCE NAO VAI";
                            setTimeout(function(){
                                msg.innerHTML="VOCE NAO VAI EXCLUIR";
                                setTimeout(function(){
                                    msg.innerHTML="VOCE NAO VAI EXCLUIR O";
                                    setTimeout(function(){
                                        msg.innerHTML="VOCE NAO VAI EXCLUIR O MEU";
                                        setTimeout(function(){
                                            msg.innerHTML="VOCE NAO VAI EXCLUIR O MEU CLIENTE";
                                            setTimeout(function(){msg.innerHTML="";},1000);
                                        },600);
                                    },700);
                                },800);
                            }, 800);
                        },900);
                    },1000);
                },200);
            }
        </script>
    </body>
</html>
