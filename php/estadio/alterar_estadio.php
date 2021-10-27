<?php
    include "../conecta_banco.php";
    $id = $_POST['id'];
    $descricao = $_POST['descricao'];
    $localizacao = $_POST['localizacao'];
    $capacidade = $_POST['capacidade'];
    $query = "UPDATE estadio SET descricao = '$descricao', localizacao = '$localizacao', capacidade = '$capacidade' WHERE idestadio = '$id';";
    if(mysqli_query($conexao, $query))
        echo "Estadio alterado com sucesso!";
    else
        echo "Erro ao alterar estádio.";
    echo '<br><a href="../../index.html"><button>Voltar</button></a>'
?>