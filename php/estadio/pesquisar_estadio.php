<?php
    include "../conecta_banco.php";
    $nome = $_POST['nome'];
    $localizacao = $_POST['localizacao'];
    $capacidade = $_POST['capacidade'];

    $result_pesquisa = "SELECT * FROM estadio WHERE descricao LIKE '$nome'% AND localizacao LIKE '$localizacao'% AND capacidade >= ''";
?>