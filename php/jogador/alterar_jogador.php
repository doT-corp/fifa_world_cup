<?php
    include "../conecta_banco.php";
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $camisa = $_POST['camisa'];
    $posicao = $_POST['posicao'];
    $pais = $_POST['pais'];
    $idpais = $_POST['idpais'];
    $situacao = $_POST['situacao'];
    $query = "UPDATE jogador SET nome = '$nome', camisa = '$camisa', posicao = '$posicao', pais = '$pais', idpais = '$idpais', situacao = '$situacao' WHERE idjogador = '$id';";
    if(mysqli_query($conexao, $query))
        echo "Senha alterada com sucesso!";
    else
        echo "Senha alterada com sucesso!";
    echo '<br><a href="index.html"><button>Voltar</button></a>'
?>