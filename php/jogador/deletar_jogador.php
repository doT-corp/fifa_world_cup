<?php
    include "../conecta_banco.php";
    $id = $_POST['id'];
    $query = "DELETE FROM jogador WHERE idjogador = '$id';";
    if(mysqli_query($conexao, $query))
        echo "Registro excluído com sucesso!";
    else
        echo "Falha na exclusão!";
    echo '<br><a href="../../bottons-jogadores.html"><button>Voltar</button></a>'
?>