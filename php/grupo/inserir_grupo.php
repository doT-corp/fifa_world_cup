<?php
    include "../conecta_banco.php";
    $insere = "INSERT INTO grupo 
    (idgrupo, descrição) VALUES
    ('$_POST[id]', '$_POST[descricao]')";

    mysqli_query($conexao, $insere) or die("Não inseriu!");
    echo "Dados inseridos no banco com sucesso!";
    echo '<br><a href="index.html"><button>Voltar</button></a>'
?>