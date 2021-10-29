<?php
    $servidor = 'localhost';
    $banco = 'copa_mundo';
    $usuario = 'root';
    $senha = '';
    $conexao = mysqli_connect($servidor, $usuario, $senha);
    
    mysqli_set_charset($conexao, "utf8");

    if(!($conexao)) {
        echo "Não foi possível estabelecer uma conexão com o MySQL.";
        exit;
    }
    $servidor = mysqli_select_db($conexao, $banco);
    if(!($servidor)) {
        echo "Não foi possível selecionar o gerenciador MySQL.";
        exit;
    }    
?>