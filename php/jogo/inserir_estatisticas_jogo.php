<?php
    include "../conecta_banco.php";

    $id = $_POST["id"];

    $tempo_gol_um = array();
    $tempo_gol_dois = array();
    $jogador_gol_um = array();
    $jogador_gol_dois = array();
    $gols_um = $_POST["gols_um"];
    $gols_dois = $_POST["gols_dois"];
    $i = 0;

    for($i = 1; $i <= $gols_um; $i++) {
        $base = "".$_POST["t_gols_".$i."_m_um"].":".$_POST["t_gols_".$i."_s_um"]."";
        array_push($tempo_gol_um, $base);
        array_push($jogador_gol_um, $_POST["gol_jogador_".$i."_um"]);

        $g1 = $jogador_gol_um[$i - 1];
        $g2 = $tempo_gol_um[$i - 1];

        $insere = "INSERT INTO gols (jogo_idrodada, jogador_idjogador, tempo) 
        VALUES ('$id', '$g1', '$g2');";

        mysqli_query($conexao, $insere) or die("Não inseriu!");
    }

    for($i = 1; $i <= $gols_dois; $i++) {
        $base = "".$_POST["t_gols_".$i."_m_dois"].":".$_POST["t_gols_".$i."_s_dois"]."";
        array_push($tempo_gol_dois, $base);
        array_push($jogador_gol_dois, $_POST["gol_jogador_".$i."_dois"]);

        $g1 = $jogador_gol_dois[$i - 1];
        $g2 = $tempo_gol_dois[$i - 1];

        $insere = "INSERT INTO gols (jogo_idrodada, jogador_idjogador, tempo) 
        VALUES ('$id', '$g1', '$g2');";

        mysqli_query($conexao, $insere) or die("Não inseriu!");
    }

    echo "Dados inseridos no banco com sucesso!";
    echo '<br><a href="../../index.html"><button>Voltar</button></a>'
?>