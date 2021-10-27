<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Inserir Jogador</title>
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
        <h1>Formulário para alterar dados do jogador</h1>
        <form name="estadio" action="../../php/jogador/alterar_jogador.php" method="post">
                ID: <?php
                        $myid = $_POST['id'];
                        echo $myid;
                    ?><br><br>
                Nome Antigo: <?php
                    include "../../php/conecta_banco.php";
                    $query = mysqli_query($conexao, "SELECT nome FROM jogador WHERE idjogador = '$myid';");
                    $row = mysqli_fetch_array($query);
                    echo $row['nome'];
                ?><br>
                Nome Novo: <input class="input-text" type="text" name="nome"/> <br><br>
                Camisa Antiga: <?php
                    include "../../php/conecta_banco.php";
                    $query = mysqli_query($conexao, "SELECT camisa FROM jogador WHERE idjogador = '$myid';");
                    $row = mysqli_fetch_array($query);
                    echo $row['camisa'];
                ?><br>
                Camisa Nova: <input class="input-text" type="text" name="camisa"/> <br><br>
                Posição Antiga: <?php
                    include "../../php/conecta_banco.php";
                    $query = mysqli_query($conexao, "SELECT posicao FROM jogador WHERE idjogador = '$myid';");
                    $row = mysqli_fetch_array($query);
                    echo $row['posicao'];
                ?><br>
                Posição Nova: <select name="posicao">
                    <option value="Atacante">Atacante</option>
                    <option value="Central">Central</option>
                    <option value="Goleiro">Goleiro</option>
                    <option value="Lateral Direito">Lateral Direito</option>
                    <option value="Lateral Esquerdo">Lateral Esquerdo</option>
                    <option value="Meio Campo">Meio Campo</option>
                </select> <br><br>
                País Antigo: <?php
                    include "../../php/conecta_banco.php";
                    $query = mysqli_query($conexao, "SELECT pais.selecao FROM pais INNER JOIN jogador ON jogador.pais_idpais = pais.idpais WHERE jogador.idjogador = '$myid';");
                    $row = mysqli_fetch_array($query);
                    echo $row['selecao'];
                ?><br>
                País Novo: <select name="idpais">
                        <?php
                            include "../../php/conecta_banco.php";
                            $query = mysqli_query($conexao, "SELECT idpais, selecao FROM pais");
                            while($dados = mysqli_fetch_array($query))
                            {
                                echo "<option value='".$dados['idpais']."'>".$dados['selecao']."</option>";
                            }
                        ?>
                </select><br><br>
                Situação Antiga: <?php
                    include "../../php/conecta_banco.php";
                    $query = mysqli_query($conexao, "SELECT situacao FROM jogador WHERE idjogador = '$myid';");
                    $row = mysqli_fetch_array($query);
                    echo $row['situacao'];
                ?><br>
                Situação Nova: 
                <input type="radio" name="situacao" value="T"> Titular
                <input type="radio" name="situacao" value="R"> Reserva
                <br><br>
                <?php
                    echo "<input type='text' value='{$myid}' name='id' style='display: none'/>";
                ?>
                <input type="submit" class="btn" value="Alterar"/>
                <input type="reset" class="btn" value="Redefinir"/>
        </form>
    </body>
</html>