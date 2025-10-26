<html>
    <head>
        <style>
            footer{
                width: calc(100% - 250px);
                height: 50px;
                
                position: absolute;
                bottom: 0;
                right: 0;
                
                border-top: 1px solid black;
                background-image: linear-gradient(to right, #DB3E3A, #FF5B26);

                display: flex;
                justify-content: flex-end;
                align-items: center;
            }
            button{
                background-color: #FF8A26;
                
                border: 1px solid orange;
                border-radius: 7px;
                
                height: 35px;

                margin-right: 10px;
            }
            button:hover{
                cursor: pointer;
            }
        </style>
    </head>
    <body>
        <footer>
            <button>Adicionar Cliente</button>
        </footer>    
    </body>
</html>