<?php
    include "../conecta_banco.php";
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $continente = $_POST['continente'];
    $tecnico = $_POST['tecnico'];
    $grupo = $_POST['grupo'];
    $query = "UPDATE pais SET selecao = '$nome', continente = '$continente', tecnico = '$tecnico', grupo_idgrupo = '$grupo' WHERE idpais = '$id';";
    if(mysqli_query($conexao, $query))
        echo "País alterado com sucesso!";
    else
        echo "Erro ao alterar país";
    echo '<br><a href="../../index.html"><button>Voltar</button></a>'
?>