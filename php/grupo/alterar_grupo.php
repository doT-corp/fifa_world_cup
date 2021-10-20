<?php
    include "conecta_banco.php";
    $id = $_POST['id'];
    $descricao = $_POST['descricao'];
    $query = "UPDATE grupo SET descricao = '$descricao' WHERE idgrupo = '$id';";
    if(mysqli_query($conexao, $query))
        echo "Senha alterada com sucesso!";
    else
        echo "Senha alterada com sucesso!";
    echo '<br><a href="index.html"><button>Voltar</button></a>'
?>