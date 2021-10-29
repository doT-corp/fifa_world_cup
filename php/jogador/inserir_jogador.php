<?php
    include "../conecta_banco.php";
    $insere = "INSERT INTO jogador 
    (idjogador, nome, camisa, posicao, pais_idpais, situacao) VALUES
    ('$_POST[id]', '$_POST[nome]', '$_POST[camisa]', '$_POST[posicao]', '$_POST[idpais]', '$_POST[situacao]')";

    mysqli_query($conexao, $insere) or die("Não inseriu!");
    echo "Dados inseridos no banco com sucesso!";
    echo '<br><a href="../../index.html"><button>Voltar</button></a>';
?>