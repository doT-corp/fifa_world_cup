<?php
    include "../conecta_banco.php";

    $id = $_POST["id"];

    $tempo = array();
    $jogador = array();
    $jogador_2 = array();
    $gols_um = $_POST["gols_um"];
    $gols_dois = $_POST["gols_dois"];
    $substituicoes_um = $_POST['substituicoes_um'];
    $substituicoes_dois = $_POST['substituicoes_dois'];
    $amarelo_um = $_POST['amarelo_um'];
    $amarelo_dois = $_POST['amarelo_dois'];
    $vermelho_um = $_POST['vermelho_um'];
    $vermelho_dois = $_POST['vermelho_dois'];
    $i = 0;

    if($gols_um != 0) 
    {
        for($i = 1; $i <= $gols_um; $i++) {
            $base = "".$_POST["t_gols_".$i."_m_um"].":".$_POST["t_gols_".$i."_s_um"]."";
            array_push($tempo, $base);
            array_push($jogador, $_POST["gol_jogador_".$i."_um"]);

            $g1 = $jogador[$i - 1];
            $g2 = $tempo[$i - 1];

            $insere = "INSERT INTO gols (jogo_idrodada, jogador_idjogador, tempo) 
            VALUES ('$id', '$g1', '$g2');";

            mysqli_query($conexao, $insere) or die("Não inseriu!");
        }
    }

    $tempo = array();
    $jogador = array();    

    if($gols_dois != 0) 
    {
        for($i = 1; $i <= $gols_dois; $i++) {
            $base = "".$_POST["t_gols_".$i."_m_dois"].":".$_POST["t_gols_".$i."_s_dois"]."";
            array_push($tempo, $base);
            array_push($jogador, $_POST["gol_jogador_".$i."_dois"]);

            $g1 = $jogador[$i - 1];
            $g2 = $tempo[$i - 1];

            $insere = "INSERT INTO gols (jogo_idrodada, jogador_idjogador, tempo) 
            VALUES ('$id', '$g1', '$g2');";

            mysqli_query($conexao, $insere) or die("Não inseriu!");
        }
    }

    $tempo = array();
    $jogador = array();

    if($substituicoes_um != 0) 
    {
        for($i = 1; $i <= $substituicoes_um; $i++)
        {
            $base = "".$_POST["t_sub_".$i."_m_um"].":".$_POST["t_sub_".$i."_s_um"]."";
            array_push($tempo, $base);
            array_push($jogador, $_POST["sube_jogador_".$i."_um"]);
            array_push($jogador_2, $_POST["subs_jogador_".$i."_um"]);

            $g1 = $jogador[$i - 1];
            $g2 = $jogador_2[$i - 1];
            $g3 = $tempo[$i - 1];

            $insere = "INSERT INTO substituicao (jogos_idrodada, jogador_idjogador_sai, jogador_idjogador_entra, tempo)
            VALUES ('$id', '$g1', '$g2', '$g3');";

            mysqli_query($conexao, $insere) or die("Não inseriu!");
        }
    }

    $tempo = array();
    $jogador = array();
    $jogador_2 = array();

    if($substituicoes_dois != 0) 
    {
        for($i = 1; $i <= $substituicoes_dois; $i++)
        {
            $base = "".$_POST["t_sub_".$i."_m_dois"].":".$_POST["t_sub_".$i."_s_dois"]."";
            array_push($tempo, $base);
            array_push($jogador, $_POST["sube_jogador_".$i."_dois"]);
            array_push($jogador_2, $_POST["subs_jogador_".$i."_dois"]);

            $g1 = $jogador[$i - 1];
            $g2 = $jogador_2[$i - 1];
            $g3 = $tempo[$i - 1];

            $insere = "INSERT INTO substituicao (jogos_idrodada, jogador_idjogador_sai, jogador_idjogador_entra, tempo)
            VALUES ('$id', '$g1', '$g2', '$g3');";

            mysqli_query($conexao, $insere) or die("Não inseriu!");
        }
    }

    if($amarelo_um != 0) 
    {
        for($i = 1; $i <= $amarelo_um; $i++)
        {
            $base = "".$_POST["t_amarelo_".$i."_m_um"].":".$_POST["t_amarelo_".$i."_s_um"]."";
            array_push($tempo, $base);
            array_push($jogador, $_POST["amarelo_jogador_".$i."_um"]);

            $g1 = $jogador[$i - 1];
            $g2 = $tempo[$i - 1];

            $insere = "INSERT INTO cartao (jogos_idrodada, jogador_idjogador, amarelo, vermelho, tempo)
            VALUES ('$id', '$g1', 1, 0, '$g2');";

            mysqli_query($conexao, $insere) or die("Não inseriu!");
        }
    }

    $tempo = array();
    $jogador = array();

    if($amarelo_dois != 0) 
    {
        for($i = 1; $i <= $amarelo_dois; $i++)
        {
            $base = "".$_POST["t_amarelo_".$i."_m_dois"].":".$_POST["t_amarelo_".$i."_s_dois"]."";
            array_push($tempo, $base);
            array_push($jogador, $_POST["amarelo_jogador_".$i."_dois"]);

            $g1 = $jogador[$i - 1];
            $g2 = $tempo[$i - 1];

            $insere = "INSERT INTO cartao (jogos_idrodada, jogador_idjogador, amarelo, vermelho, tempo)
            VALUES ('$id', '$g1', 1, 0, '$g2');";

            mysqli_query($conexao, $insere) or die("Não inseriu!");
        }
    }

    $tempo = array();
    $jogador = array();
    
    if($vermelho_um != 0) 
    {
        for($i = 1; $i <= $vermelho_um; $i++)
        {
            $base = "".$_POST["t_vermelho_".$i."_m_um"].":".$_POST["t_vermelho_".$i."_s_um"]."";
            array_push($tempo, $base);
            array_push($jogador, $_POST["vermelho_jogador_".$i."_um"]);

            $g1 = $jogador[$i - 1];
            $g2 = $tempo[$i - 1];

            $insere = "INSERT INTO cartao (jogos_idrodada, jogador_idjogador, amarelo, vermelho, tempo)
            VALUES ('$id', '$g1', 0, 1, '$g2');";

            mysqli_query($conexao, $insere) or die("Não inseriu!");
        }
    }

    $tempo = array();
    $jogador = array();
    
    if($vermelho_dois != 0) 
    {
        for($i = 1; $i <= $vermelho_dois; $i++)
        {
            $base = "".$_POST["t_vermelho_".$i."_m_dois"].":".$_POST["t_vermelho_".$i."_s_dois"]."";
            array_push($tempo, $base);
            array_push($jogador, $_POST["vermelho_jogador_".$i."_dois"]);

            $g1 = $jogador[$i - 1];
            $g2 = $tempo[$i - 1];

            $insere = "INSERT INTO cartao (jogos_idrodada, jogador_idjogador, amarelo, vermelho, tempo)
            VALUES ('$id', '$g1', 0, 1, '$g2');";

            mysqli_query($conexao, $insere) or die("Não inseriu!");
        }
    }

    $tempo = array();
    $jogador = array();

    echo "Dados inseridos no banco com sucesso!";
    echo '<br><a href="../../index.html"><button>Voltar</button></a>'
?>