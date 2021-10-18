<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Consultar Estádios</title>
        <style>
                body{
                    font-size: large;
                    font-family: 'Montserrat', sans-serif;
                    margin-top: 350px;
                    text-align: center;
                }
                button{
                    font-size: large;
                    padding: 10px;
                    margin: 10px;
                    border-radius: 10px;
                    border-color: black;
                    background-color: rgb(207, 98, 98);     
                }
                button:hover {
                    background: #f8b2ab;
                    transition: all 0.3s;
                }
        </style>
    </head>
    <body>
        <?php
        include "conecta_banco.php";
        $procura = "SELECT * FROM estadio";
        $result = mysqli_query($conexao, $procura);
        while($row = mysqli_fetch_array($result)) {
            echo $row['idestadio'];
            echo "<br>";
            echo $row['descrição'];
            echo "<br>";
            echo $row['localização'];
            echo "<br>";
            echo $row['capacidade'];
            echo "<br>";
            echo "<br>";
            echo "<br>";
        }
        echo '<br><a href="index.html"><button>Voltar</button></a>'
    ?>
    </body>
</html>
