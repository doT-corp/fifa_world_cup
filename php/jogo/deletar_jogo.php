<?php
    include "../conecta_banco.php";
    $id = $_POST['id'];

    $resetar = "DELETE FROM gols WHERE jogos_idrodada = '$id';";
    mysqli_query($conexao, $resetar) or die("Erro!");
    $resetar = "DELETE FROM substituicao WHERE jogos_idrodada = '$id';";
    mysqli_query($conexao, $resetar) or die("Erro!");
    $resetar = "DELETE FROM cartao WHERE jogos_idrodada = '$id';";
    mysqli_query($conexao, $resetar) or die("Erro!");

    $query = "DELETE FROM jogos WHERE idrodada = '$id';";
    if(mysqli_query($conexao, $query))
        echo "Registro excluído com sucesso!";
    else
        echo "Falha na exclusão!";
    echo '<br><a href="../../index.html"><button>Voltar</button></a>'
?>