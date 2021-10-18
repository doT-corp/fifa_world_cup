<?php
    include "conecta_banco.php";
    $id = $_POST['id'];
    $descricao = $_POST['descricao'];
    $localizacao = $_POST['localizacao'];
    $capacidade = $_POST['capacidade'];
    $query = "UPDATE estadio SET descricao = '$descricao', localização = '$localizacao', capacidade = '$capacidade' WHERE idestadio = '$id';";
    if(mysqli_query($conexao, $query))
        echo "Senha alterada com sucesso!";
    else
        echo "Senha alterada com sucesso!";
    echo '<br><a href="index.html"><button>Voltar</button></a>'
?>