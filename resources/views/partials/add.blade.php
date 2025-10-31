<html>
    <head>
        <style>
            footer{
                width: calc(100% - 250px);
                height: 100px;
                
                position: absolute;
                bottom: 0;
                right: 0;
                
                border-top: 1px solid black;
                //background-image: linear-gradient(to right, #DB3E3A, #FF5B26);

                display: flex;
                justify-content: flex-end;
                align-items: center;
            }
            .cadastrar{
                background-color: #FF8A26;
                
                border: 1px solid orange;
                border-radius: 7px;
                
                height: 50%;

                margin-right: 30px;
                padding: 5px;

                display: flex;
                align-items: center;
                gap: 5px;
                
                color: black;
                text-decoration: none;
            }
            button:hover{
                cursor: pointer;
            }
        </style>
    </head>
    <body>
        <footer>
            <a class = "cadastrar" href = {{ $link }}>
            <img src = {{ $icone }} alt="">
            Cadastrar {{ $aba }}
            </a>
        </footer>    
    </body>
</html>