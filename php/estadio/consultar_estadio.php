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
                td {
                    padding: 20px;
                }
        </style>
    </head>
    <body>
        <table>
            <tr>
                <th>ID</th>
                <th>Descrição</th>
                <th>Localização</th>
                <th>Capacidade</th>
            <tr>
                <?php
                    include "../conecta_banco.php";
                    $procura = "SELECT * FROM estadio";
                    $result = mysqli_query($conexao, $procura);
                    while($row = mysqli_fetch_array($result)) {
                        echo "<tr>";
                        echo "<td>";
                        echo $row['idestadio'];
                        echo "</td>";
                        echo "<td>";
                        echo $row['descricao'];
                        echo "</td>";
                        echo "<td>";
                        echo $row['localizacao'];
                        echo "</td>";
                        echo "<td>";
                        echo $row['capacidade'];
                        echo "</td>";
                        echo "</tr>";
                    }
                ?>
        </table>
        <a href="../../index.html"><button>Voltar</button>
    </body>
</html>
