<?php
    session_start();
    include "php/conecta_banco.php";
?>
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Perfil</title>
    </head>
    <body>
        <?php if($_SESSION['usuario'] != "Visitante"): ?>
            <h1>Perfil</h1>
            <h3>
                Nome Completo: 
                <?php
                    $select = "SELECT nome_completo FROM usuario WHERE nome_usuario = '".$_SESSION['usuario']."';";
                    $result = mysqli_query($conexao, $select) or die("Erro ao acessar perfil.");
                    $row = mysqli_fetch_array($result);
                    $r = $row['nome_completo'];
                    echo $r;
                ?>
            </h3>
            <h3>
                Nome de Usuário: 
                <?php
                    echo $_SESSION['usuario'];
                ?>
            </h3>
            <h3>
                E-mail: 
                <?php
                    $select = "SELECT email FROM usuario WHERE nome_usuario = '".$_SESSION['usuario']."';";
                    $result = mysqli_query($conexao, $select) or die("Erro ao acessar perfil.");
                    $row = mysqli_fetch_array($result);
                    $r = $row['email'];
                    echo $r;
                ?>
            </h3>
            <h3>
                Data e horário de cadastro: 
                <?php
                    $select = "SELECT data_registro FROM usuario WHERE nome_usuario = '".$_SESSION['usuario']."';";
                    $result = mysqli_query($conexao, $select) or die("Erro ao acessar perfil.");
                    $row = mysqli_fetch_array($result);
                    $r = $row['data_registro'];
                    echo $r;
                ?>
            </h3>
            <a href="index.php">
                <input type="button" class="btn" value="Voltar"/>
            </a>
        <?php endif; ?>
        <?php if($_SESSION['usuario'] == "Visitante"): ?>
            <h1>Ops!</h1>
            <h3>Para acessar o perfil, é necessário realizar login</h3>
            <a href="forms/login/login.html">
                <input type="button" class="btn" value="Login"/>
            </a>
            <a href="index.php">
                <input type="button" class="btn" value="Voltar"/>
            </a>
        <?php endif; ?>
    </body>
</html>