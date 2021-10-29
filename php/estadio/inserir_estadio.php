<?php
    include "../conecta_banco.php";
    $insere = "INSERT INTO estadio 
    (idestadio, descricao, localizacao, capacidade) VALUES
    ('$_POST[id]', '$_POST[descricao]', '$_POST[localizacao]', '$_POST[capacidade]')";

    mysqli_query($conexao, $insere) or die("Não inseriu!");
    echo "Dados inseridos no banco com sucesso!";
    echo '<br><a href="../../index.html"><button>Voltar</button></a>'
?>