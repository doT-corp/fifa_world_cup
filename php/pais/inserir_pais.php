<?php
    include "../conecta_banco.php";
    $insere = "INSERT INTO pais
    (idpais, selecao, continente, tecnico, pontos, vitorias, empates, derrotas, golspro, golscontra, grupo_idgrupo) VALUES
    ('$_POST[id]', '$_POST[nome]', '$_POST[continente]', '$_POST[tecnico]', 0, 0, 0, 0, 0, 0, '$_POST[grupo]')";

    mysqli_query($conexao, $insere) or die("Não inseriu!");
    echo "Dados inseridos no banco com sucesso!";
    echo '<br><a href="../../index.html"><button>Voltar</button></a>';
?>