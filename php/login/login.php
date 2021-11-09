<?php
    session_start();
    include "../conecta_banco.php";

    $nome = $_POST['nome'];
    $senha = md5($_POST['senha']);

    $sql = "SELECT * FROM usuario WHERE nome_usuario = '$nome' AND senha = md5('$senha')";
    $query = mysqli_query($conexao, $sql) or die("Erro!");
    $row = mysqli_num_rows($query);

    if($row == 1) {
        $_SESSION['usuario'] = $nome;
        echo "deu certo";
        exit();
    }
    else
    {
        $_SESSION['nao-autenticado'] = true;
        echo "ñ deu certo";
        exit();
    }
?>