<?php
    $servidor = 'localhost';
    $banco = 'aluno';
    $usuario = 'root';
    $senha = '';
    $conexao = mysqli_connect($servidor, $usuario, $senha);
    
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