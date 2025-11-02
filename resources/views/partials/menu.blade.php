<html>
    <head>
        <style>
            .peloCliente{
                position: absolute;
                left: 54%;
                top: 30%;
                transform: translateX(-50%);

                border-radius: 10px;
            }

            .pose1, .pose2, .pose3, .pose4{
                position: absolute;
                top: 40%;
                transform: translateY(-50%);
            }

            .pose1{
                left: 10%;
                filter:drop-shadow(5px 5px 2px red);
            }
            
            .pose2{
                left: 23%;
                filter:drop-shadow(5px 5px 2px red);
            }

            .pose3{
                right: 15%;
                filter:drop-shadow(5px 5px 2px red);
            }

            .pose4{
                right: 0;
                filter:drop-shadow(5px 5px 2px red);
            }

            .douglas{
                display: flex;
                flex-direction: row;
                align-items: center;
                gap: 15px;
            }
            .douglasimg{
                border-radius: 50%;
                border: 1px solid black;
                width: 100px;
                height: 100px;
            }
        </style>
    </head>
</html>