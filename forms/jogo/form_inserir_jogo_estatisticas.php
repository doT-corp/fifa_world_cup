<?php
    include "../../php/conecta_banco.php";
    $insere = "INSERT INTO jogos
    (idrodada, data_hora, estadio_idestadio, pais_idpais1, pais_idpais2, gols_idpais1, gols_idpais2, publico) VALUES
    ('$_POST[id]', '2020-11-21 20:00:00', '$_POST[estadio]', '$_POST[pais_um]', '$_POST[pais_dois]', '$_POST[gols_um]', '$_POST[gols_dois]', '$_POST[publico]')";

    mysqli_query($conexao, $insere) or die("Erro ao inserir jogo.");
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Inserir Jogo - Estatísticas</title>
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
        <h1>Estatísticas do jogo</h1>
        <form action="../../php/jogo/inserir_estatisticas_jogo.php" method="post">
            
            <input type="submit" class="btn" value="Inserir"/>
            <input type="reset" class="btn" value="Redefinir"/> 
        </form>
    </body>
</html>