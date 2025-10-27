<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        
        h2{
            /*border: 1px solid black;*/
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

        <main>

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
                <img src="Gustavo.jpeg" alt="">
                <div class="info">
                    <h1>Nome: Gustavo Noda Yamauti</h1>
                    <h1>RA: 0379/24</h1>
                </div>
            </div>
        </div>

        <div class="parte2">
            <div class="douglas">
                <img src="" alt="">
                <div class="info">
                    <h2>Nome: DOUGLAS FRANCISCO BONAFIM MAGNANI PEIXOTO</h2 >
                    <h1>RA: /24</h1>
                </div>
            </div>

            <div class="lucena">
                <img src="" alt="">
                <div class="info">
                    <h1>Nome: Gabriel</h1>
                    <h1>RA: /24</h1>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>