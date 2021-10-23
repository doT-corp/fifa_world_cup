<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Alterar Estádio</title>
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
        <h1>Formulário para alterar dados do estádio</h1>
        <form name="estadio" action="../../php/estadio/alterar_estadio.php" method="post">
                ID: <?php
                        $myid = $_POST['id'];
                        echo $myid;
                    ?><br><br>
                Descrição Antiga: 
                <?php
                    include "../../php/conecta_banco.php";
                    $query = mysqli_query($conexao, "SELECT descricao FROM estadio WHERE idestadio = '$myid';");
                    $row = mysqli_fetch_array($query);
                    echo $row['descricao'];
                ?><br>
                Descrição Nova:<input class="input-text" type="text" name="descricao"/> <br><br>

                Localização Antiga: 
                <?php
                    include "../../php/conecta_banco.php";
                    $query = mysqli_query($conexao, "SELECT localizacao FROM estadio WHERE idestadio = '$myid';");
                    $row = mysqli_fetch_array($query);
                    echo $row['localizacao'];
                ?><br>
                Localização Nova: <input class="input-text" type="text" name="localizacao"/> <br><br>

                Capacidade Antiga: 
                <?php
                    include "../../php/conecta_banco.php";
                    $query = mysqli_query($conexao, "SELECT capacidade FROM estadio WHERE idestadio = '$myid';");
                    $row = mysqli_fetch_array($query);
                    echo $row['capacidade'];
                ?><br>                
                Capacidade Nova: <input class="input-text" type="number" name="capacidade"/> <br><br>
                <?php
                    echo "<input type='text' value='{$myid}' name='id' style='display: none'/>";
                ?>
                <input type="submit" class="btn" value="Alterar"/>
                <input type="reset" class="btn" value="Redefinir"/>
        </form>
    </body>
</html>