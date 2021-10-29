<?php
    include "../conecta_banco.php";
    $id = $_POST['id'];
    $query = "DELETE FROM pais WHERE idpais = '$id';";
    if(mysqli_query($conexao, $query))
        echo "Registro excluído com sucesso!";
    else
        echo "Falha na exclusão!";
    echo '<br><a href="../../index.html"><button>Voltar</button></a>'
?>