<?php
    session_start();
    include "../conecta_banco.php";

    $problems = array();
    $errors = "Foram detectados os seguintes problemas durante o cadastro:";

    $nome_completo = $_POST['nome_completo'];
    $nome_usuario = trim($_POST['nome_usuario']);
    $email = trim($_POST['email']);
    $senha = trim(md5($_POST['senha']));

    $sql = "SELECT COUNT(*) AS total FROM usuario WHERE nome_usuario = '$nome_usuario';";
    $query = mysqli_query($conexao, $sql) or die("Erro!");
    $row = mysqli_fetch_assoc($query);

    if($row['total'] >= 1) array_push($problems, "nome");

    $sql = "SELECT COUNT(*) AS total FROM usuario WHERE senha = MD5('".$senha."');";
    $query = mysqli_query($conexao, $sql) or die("Erro!");
    $row = mysqli_fetch_assoc($query);

    if($row['total'] >= 1) array_push($problems, "senha");
    
    $sql = "SELECT COUNT(*) AS total FROM usuario WHERE email = '$email';";
    $query = mysqli_query($conexao, $sql) or die("Erro!");
    $row = mysqli_fetch_assoc($query);

    if($row['total'] >= 1) array_push($problems, "email");

    if(in_array('nome', $problems, TRUE) or in_array('email', $problems, TRUE) or in_array('senha', $problems, TRUE))
        $_SESSION['usuario_existe'] = true;
    else
        $_SESSION['usuario_existe'] = false;

    if($_SESSION['usuario_existe'] == false)
    {
        $sql = "INSERT INTO usuario (nome_completo, nome_usuario, email, senha, data_registro) VALUES ('$nome_completo', '$nome_usuario', '$email', MD5('".$senha."'), NOW());";
        
        if($conexao->query($sql) === TRUE) {
            $_SESSION['status'] = 'cadastro_feito';
        }
        echo "<br>Usuário cadastrado com sucesso!<br>";
        $_SESSION['status_cadastro'] = true;
    }
    else 
    {
        if(in_array('nome', $problems, TRUE)) $errors .= "<br>Nome de usuário existente.";
        if(in_array('email', $problems, TRUE)) $errors .= "<br>E-mail existente.";
        if(in_array('senha', $problems, TRUE)) $errors .= "<br>Senha existente.";
        echo $errors;
    }

    $conexao->close();
    echo "<br><a href='../../index.php'><button>Voltar</button></a>";
?>