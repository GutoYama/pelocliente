<html>
<head>
    <style>
        body{
            display: flex;
            flex-direction: row;
            background-image: linear-gradient(190deg, #ebb644ff, #F0996A);
        }

        form{
            border-radius: 7px;

            display: flex;
            flex-direction: column;

            width: 400px;
            min-height: 500px;
            max-height: 500px;
            overflow-y: auto;

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
            font-family: none;
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: center;
            gap: 10px;
            transition: all 0.5s;
        }

        .adicionarComposicao img{
            width: 13px;
            height: 13px;
            position: relative;
            top: 0;
            left: 0;
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

        .enviarcompra{
            transition: all 1s ease;
        }

        .enviarcompra:hover{
            border: 1px solid black;
            background-color: #FFC823;
            cursor: pointer;
        }

        .composicao{
            display: flex;
            flex-direction: row;
            gap: 10px;
        }

        .composicao input{
            width: 100px;
        }

        .composicao p{
            position: relative;
            left: -10%;
            top: -23%;
        }

        .composicao button{
            position: relative;
            right: 15px;
            border-radius: 15px;
            cursor: pointer;
        }

        .cpf, .endereco{
            display: flex;
            flex-direction: row;
            align-items: center;
            gap: 10px;
            font-size: 20px;
        }

        .enviarPedido{
            transition: all 1s ease;
        }

        .enviarPedido:hover{
            border: 1px solid black;
            background-color: #FFC823;
            cursor: pointer;
        }

        #itensDoPedido{
            display: flex;
            flex-direction: column;

            gap: 10px;
        }

        #item{
            display: flex;
            flex-direction: row;
            gap: 10px
        }

        form #PartePrato{
            display: flex;
            flex-direction: column;
            width: 200px;
        }

        form #ParteQuantidade{
            display: flex;
            flex-direction: column;
            width: 70px;
        }

        form #ParteQuantidade input{
            position: relative;
            left: 25px;
        }

        form img{
            border-radius: 7px;
            color: white;
            height: 25px;
            position: relative;
            left: 40px;
            top: 17px;
            scale: 1.5;
            padding: 3px;
        }

        .excluir:hover{
            cursor:pointer;
        }

        .excluirComposicao{
            cursor: pointer;
            top: -2px;
            left: 0;
        }

        .botaoPedido{
            background-color: white;

            font-size: 23px;

            height: 70px;
            
            border: none;
            border-radius: 20px;
        }
    </style>
</head>
</html>