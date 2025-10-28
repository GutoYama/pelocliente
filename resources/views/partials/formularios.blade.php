<html>
<head>
    <style>
        body{
            display: flex;
            flex-direction: row;
            background-image: linear-gradient(190deg, #ebb644ff, #e9cc4bff);
        }

        form{
            border-radius: 7px;

            display: flex;
            flex-direction: column;

            width: 400px;
            height: 500px;

            position: absolute;
            left: 50%;
            top: 50%;
            transform:translate(-50%, -50%);

            padding: 20px;
            gap: 20px;

            background-color: #FFC823;
        }

        label{
            font-size: 20px;

            padding-left: 15px;
        }

        input, select, .adicionarComposicao{
            height: 25px;
            font-size: 20px;

            border-radius: 20px;
            border: none;

            padding-left: 10px;
        }

        .adicionarComposicao{
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: center;
            gap: 10px;
            transition: all 1s;
        }
        
        .valorCompra{
            display: flex;
            flex-direction: row;
            align-items: center;
            gap: 10px;
        }

        input:focus{
            background-image: linear-gradient(to left, #FFA626, #FF9633);
        }

        #quantidadeingrediente1{
            width: 100px;
        }

        .enviar{
            width: 100px;
            transition: all 0.5s;
        }

        .enviar:hover, .adicionarComposicao:hover{
            border: 1px solid black;
            background-color: #FFC823;
            cursor: pointer;
        }

        .adicionar{
            width: 10px;
            height: calc(width);
        }
    </style>
</head>
</html>