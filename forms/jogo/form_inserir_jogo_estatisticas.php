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
        <?php
            include "../../php/conecta_banco.php";
            $id = $_POST['id'];
            $data = $_POST['data'];
            $estadio = $_POST['estadio'];
            $pais_um = $_POST['pais_um'];
            $pais_dois = $_POST['pais_dois'];
            $gols_um = $_POST['gols_um'];
            $gols_dois = $_POST['gols_dois'];
            $publico = $_POST['publico'];
            if(isset($_POST['submit']))
            {
                $insere = "INSERT INTO jogos (idrodada, data_hora, estadio_idestadio, pais_idpais_1, pais_idpais_2, gols_idpais_1, gols_idpais_2, publico) 
                VALUES ('$id', '$data', '$estadio', '$pais_um', '$pais_dois', '$gols_um', '$gols_dois', '$publico');";
                $result = mysqli_query($conexao, $insere) or die("Erro ao inserir jogo.");
            }
        ?>
        <h1>Estatísticas do jogo</h1>
        <form action="../../php/jogo/inserir_estatisticas_jogo.php" method="post">
            <h2>Especificar Gols País 1</h2>
            <input type="submit" class="btn" value="Inserir"/>
            <input type="reset" class="btn" value="Redefinir"/> 
        </form>
    </body>
</html>