<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Alterar País</title>
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
        <h1>Formulário para alterar dados do país</h1>
        <form name="estadio" action="../../php/pais/alterar_pais.php" method="post">
                ID: <?php
                        $myid = $_POST['id'];
                        echo $myid;
                    ?><br><br>
                Nome Antigo: <?php
                    include "../../php/conecta_banco.php";
                    $query = mysqli_query($conexao, "SELECT selecao FROM pais WHERE idpais = '$myid';");
                    $row = mysqli_fetch_array($query);
                    echo $row['selecao'];
                ?><br>                
                Nome Novo: <input class="input-text" type="text" name="nome"/> <br><br>
                Continente Antigo: <?php
                    include "../../php/conecta_banco.php";
                    $query = mysqli_query($conexao, "SELECT continente FROM pais WHERE idpais = '$myid';");
                    $row = mysqli_fetch_array($query);
                    echo $row['continente'];
                ?><br>  
                Continente Novo: <select name="continente">
                    <option value="África">África</option>
                    <option value="América">América</option>
                    <option value="Ásia">Ásia</option>
                    <option value="Europa">Europa</option>
                    <option value="Oceania">Oceania</option>
                </select> <br><br>
                Técnico Antigo: <?php
                    include "../../php/conecta_banco.php";
                    $query = mysqli_query($conexao, "SELECT tecnico FROM pais WHERE idpais = '$myid';");
                    $row = mysqli_fetch_array($query);
                    echo $row['tecnico'];
                ?><br>  
                Técnico Novo: <input class="input-text" type="text" name="tecnico"/> <br><br>
                Grupo Antigo: <?php
                    include "../../php/conecta_banco.php";
                    $query = mysqli_query($conexao, "SELECT grupo.descricao FROM grupo INNER JOIN pais ON pais.grupo_idgrupo = grupo.idgrupo WHERE pais.idpais = '$myid';");
                    $row = mysqli_fetch_array($query);
                    echo $row['descricao'];
                ?><br>
                Grupo Novo: <select name="grupo">
                        <?php
                            include "../../php/conecta_banco.php";
                            $query = mysqli_query($conexao, "SELECT idgrupo, descricao FROM grupo");
                            while($dados = mysqli_fetch_assoc($query))
                            {
                                echo "<option value='".$dados['idgrupo']."'>".$dados['descricao']."</option>";
                            }
                        ?>
                </select> <br><br>
                <?php
                    echo "<input type='text' value='{$myid}' name='id' style='display: none'/>";
                ?>
                <input type="submit" class="btn" value="Alterar"/>
                <input type="reset" class="btn" value="Redefinir"/>
        </form>
    </body>
</html>