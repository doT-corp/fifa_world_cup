<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Deletar Jogador</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <style>
            body{
                font-size: large;
                font-family: 'Montserrat', sans-serif;
                margin-top: 350px;
            }
            h1{
                text-align: center;
            }
            form{
                text-align: center;
            }
            .input-text{
                font-size: large;
                padding: 10px;
                margin: 10px;
                border-radius: 10px;
                border-color: black;
            }
            .btn{
                font-size: large;
                padding: 10px;
                margin: 10px;
                border-radius: 10px;
                border-color: black;
                background-color: rgb(207, 98, 98);
               
            }
            
            .btn:hover {
                background: #f8b2ab;
                transition: all 0.3s;
            }
        </style>
    </head>
    <body>
        <h1>Formulário para deletar jogador</h1>
        <form name="jogador" action="../../php/jogador/deletar_jogador.php" method="post">
            ID: <select name="id">
                <?php
                    include "../../php/conecta_banco.php";
                    $query = mysqli_query($conexao, "SELECT idjogador, nome FROM jogador");
                    while($dados = mysqli_fetch_assoc($query))
                    {
                        echo "<option value='".$dados['idjogador']."'>".$dados['idjogador']." - ".$dados['nome']."</option>";
                    }
                ?>
            <input type="submit" class="btn" value="Deletar"/>
        </form>
    </body>
</html>