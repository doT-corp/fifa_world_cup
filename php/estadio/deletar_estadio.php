<?php
    include "../conecta_banco.php";
    $id = $_POST['id'];
    $query = "DELETE FROM estadio WHERE idestadio = '$id';";
    $result = mysqli_query($conexao, $query);

    if($result) {
        /*
        if($total = mysqli_affected_rows($conexao))
            echo "Registro excluído com sucesso!";
        else
            echo "Nenhum registro foi encontrado. Verifique se digitou o id correto.";
        */
        echo "Registro excluído com sucesso!";
    }
    else
        echo "Falha na exclusão!";
    echo '<br><a href="../../index.html"><button>Voltar</button></a>';
?>