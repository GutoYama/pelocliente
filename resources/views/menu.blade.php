<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Menu Pelo Cliente</title>
    <style>

        body{
            display: flex;
            flex-direction: column;
        }

        .centro{
            display: flex;
            flex-direction: row;
        }

        nav{
            border: 1px solid black;
            width: 200px;
            height: 100vh;
            display: flex;
            flex-direction: column;
            padding-right: 50px;
            background-image: linear-gradient(to left, #DB3E3A, #DB6142);
        }

        .menu{
            font-size: 40px;
            padding-top: 20px;
            padding-left: 50px;
            width: 200px;
            border-bottom: 1px solid black;
        }

        .menuopcao{
            padding-left: 50px;
            width: 130px;
        }

        main{
            border: 1px solid red;
            width: 100%;
            background-image: linear-gradient(190deg, #ebb644ff, #e9cc4bff)
        }

        a{
            text-decoration: none;
            color: #E5DD8F;
            // #E2D7D1
        }

        a:hover{
            text-decoration: underline;
        }

        footer{
            border: 2px solid green;
            display: flex;
            flex-direction: row;
            justify-content: space-around;
        }
    </style>

</head>

<body>
    <div class="centro">
        @include('partials.nav', ['x'=>0])
        @include ('partials.menu')
        @include('partials.falas')

        <main>
            <p class="vazio" id="falaGustavoUm"></p>
            <p class="vazio" id="falaGustavoDois"></p>
            <p class="vazio" id="falaGustavoTres"></p>
            <p class="vazio" id="falaGustavoQuatro"></p>

            <img class="peloCliente" src="./PeloCliente.jpg" alt="">
            <img class="pose1" src="GustavoPose1.webp" alt="">
            <img class="pose2" id="GustavoPose2" src="GustavoPose2.webp" alt="">
            <img class="pose3" src="GustavoPose3.webp" alt="">
            <img class="pose4" src="GustavoPose4.webp" alt="">
        </main>
    </div>
    <footer>
        <div class="parte1">
            <div class="teixeira">
                <img src="" alt="">
                <div class="info">
                    <h1>Nome: Eduardo José Teixeira Rosa</h1>
                    <h1>RA: 1050/24</h1>
                </div>
            </div>

            <div class="yamauti">
                <img src="" alt="">
                <div class="info">
                    <h1>Nome: Gustavo Noda Yamauti</h1>
                    <h1>RA: 0379/24</h1>
                </div>
            </div>
        </div>

        <div class="parte2">
            <div class="douglas">
                <img class="douglasimg" src="DouglasCoberto.jpg" alt="">
                <div class="info">
                    <h2>Nome: DOUGLAS FRANCISCO BONAFIM MAGNANI PEIXOTO</h2 >
                    <h1>RA: 0267/24</h1>
                </div>
            </div>

            <div class="lucena">
                <img src="" alt="">
                <div class="info">
                    <h1>Nome: Gabriel de Souza Lucena</h1>
                    <h1>RA: 0598/24</h1>
                </div>
            </div>
        </div>
    </footer>
</body>
    <script>
        function falarGustavoUm(){
            var elemento = document.getElementById('falaGustavoUm');

            setTimeout(function(){
                elemento.className = "falaGustavoUm";
                elemento.innerHTML = "Se não for pelo cliente eu nem faço";
            }, 1500);

            setTimeout(function(){
                elemento.innerHTML = "";
                elemento.className = "vazio";
            }, 5500);

            setTimeout(function(){
                falarGustavoUm();
            }, 3000);
        }

        function falarGustavoDois(){
            var elemento = document.getElementById('falaGustavoDois');
            
            setTimeout(function(){
                elemento.className = "falaGustavoDois";
                elemento.innerHTML = "VAI TRABALHAR DOUGLAS!!!";
            }, 2000);

            setTimeout(function(){
                elemento.innerHTML = "";
                elemento.className = "vazio";
            }, 5000);

            setTimeout(function(){
                falarGustavoDois();
            }, 8000);
        }

        function falarGustavoTres(){
            var elemento = document.getElementById('falaGustavoTres');

            setTimeout(function(){
                elemento.className = "falaGustavoTres";
                elemento.innerHTML = "Se virem um Douglas, não dê nem água";
            }, 1000);

            setTimeout(function(){
                elemento.innerHTML = "";
                elemento.className = "vazio";
            }, 4000);

            setTimeout(function(){
                falarGustavoTres();
            }, 5000);
        }

        function falarGustavoQuatro(){
            var elemento = document.getElementById('falaGustavoQuatro');

            setTimeout(function(){
                elemento.className = "falaGustavoQuatro";
                elemento.innerHTML = "Pelo CLIENTE eu tiro o salário do Douglas!";
            }, 600);

            setTimeout(function(){
                elemento.innerHTML = "";
                elemento.className = "vazio";
            }, 6000);

            setTimeout(function(){
                falarGustavoQuatro();
            }, 3400);
        }

        //falarGustavoUm();
        //falarGustavoDois();
        //falarGustavoTres();
        //falarGustavoQuatro();

        const imagem = document.getElementById("imagem");
        const sensibilidade = 40; // quanto mais alto, menos se move

        document.addEventListener("mousemove", (evento) => {
        const { innerWidth, innerHeight } = window;
        const x = (evento.clientX - innerWidth / 2) / sensibilidade;
        const y = (evento.clientY - innerHeight / 2) / sensibilidade;

        // Aplica leve rotação e translação
        imagem.style.transform = `
            translate(${x}px, ${y}px)
            rotateY(${x * 0.5}deg)
            rotateX(${-y * 0.5}deg)
        `;
        });

        // Retorna ao centro quando o mouse sai da tela
        document.addEventListener("mouseleave", () => {
            imagem.style.transform = "translate(0px, 0px) rotateY(0deg) rotateX(0deg)";
        });
    </script>
</html>