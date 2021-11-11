<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FIFA22</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link rel="icon" href="../../assets/fifa_icon.png">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
        <style>
    
    body{
        font-family: 'Montserrat', sans-serif;
        background-color: #171920;
        width: 98%;
        height:auto;
        text-align:center;
        color:rgb(214, 213, 212);
        margin-top: 3%;
    }
    h1{
        text-align: center;
    }
    form{
        text-align: center;
    }
    h1{
    text-align: center;
    font-size: 300%;
    margin-top: 2%;
    color: rgb(214, 213, 212);
}
form{
    text-align: center;
    color: rgb(214, 213, 212);
    font-height:200;
}
input{
    font-family: 'Montserrat', sans-serif;
    font-weight: 700;
    margin: 2%;
    color: rgb(214, 213, 212);
    border-radius: 30px;
    padding: 10px;
    padding-left: 20px;
    padding-right: 20px;
    font-size: 20px;
    border-color: transparent;
    background-color: #3765cf;
    box-shadow: 2px 10px 18px #000000 ;
}
input:hover{
    background-color: #284a99;
    transition: 0.2s;
}
#counter{
    color: rgb(214, 213, 212);
}
select{
    font-family: 'Montserrat', sans-serif;
    font-weight: 700;
    border-radius: 30px;
    padding: 2px;
    padding-left: 15px;
    padding-right: 15px;
    font-size: 20px;
    border-color: transparent;
    background-color:#3765cf;
    box-shadow: 2px 10px 18px #000000 ;
    color: rgb(214, 213, 212);
}
option{
    font-family: 'Montserrat', sans-serif;
    font-weight: 700;
    border-radius: 30px;
    padding: 10px;
    padding-left: 20px;
    padding-right: 20px;
    font-size: 20px;
    border-color: transparent;
    background-color: #9BAF59;
    box-shadow: 2px 10px 18px #000000 ;
    color: rgb(214, 213, 212);
}
a{
    text-decoration: none;
}
.search{
    align-items: center;
    text-align: center;
    padding-left: 10%;
    padding-right: 10%;
}

.btn{
    font-family: 'Montserrat', sans-serif;
    font-weight: 700;
    margin: 2%;
    color: rgb(214, 213, 212);
    border-radius: 30px;
    padding: 10px;
    padding-left: 20px;
    padding-right: 20px;
    font-size: 20px;
    border-color: transparent;
    background-color: #3765cf;
    box-shadow: 2px 10px 18px #000000 ;
    list-style-type:none;
}
.btn:hover{
    background-color: #284a99;
    transition: 0.2s;
}
.busca{
    text-align: center;
    list-style-type:none;
}
li{
    list-style-type: none;
}
select{
    margin-left:2%;
}
::-webkit-scrollbar {
    width: 10px;
}

/* Track */
::-webkit-scrollbar-track {
background: #f5f5f5;
}

/* Handle */
::-webkit-scrollbar-thumb {
background: #3765cf;
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
background: #1e3772;
} 
@media screen and (max-width: 600px){
    body{
        width: auto;
    }
    .center{
        margin-top: 3%;
    }
    h1{
        font-size: 200%;
        margin-left: 6%;
        margin-right:6%;
        margin-top: 6%;
    }
    input{
        inline-size: 86%;
    }
    form{
        margin-top:20%;
    }
    .search{
        align-items: center;
        text-align: center;
        padding-left: 3%;
        padding-right: 3%;

    }
    select{
        margin: 3%;
    }
    
}
h3{
    font-weight: 700;
}
.center {
  margin-left: auto;
  margin-right: auto;
  margin-top: 3%;
}
 td {
        padding: 20px;
}
#list{
    margin-top: 7%;
    padding: 10px;
}
#list th{
    margin-right: 10px;
    padding: 10px;
}
button{
        font-family: 'Montserrat', sans-serif;
        font-weight: 700;
        margin: 2%;
        color: rgb(214, 213, 212);
        border-radius: 30px;
        padding: 10px;
        padding-left: 20px;
        padding-right: 20px;
        font-size: 20px;
        border-color: transparent;
        background-color: #3765cf;
        box-shadow: 2px 10px 18px #000000 ;
       }
        button:hover{
            background-color: #284a99;
            transition: 0.2s;
        }
    </style> 
</head>
<body>
    <?php
    include "../conecta_banco.php";
    
    $id = 0;

    $data = $_POST['data'];
    $estadio = $_POST['estadio'];
    $pais_um = $_POST['pais_um'];
    $pais_dois = $_POST['pais_dois'];
    $publico = $_POST['publico'];
    $alterar_inserir = $_POST['alterar-inserir'];

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

    if($alterar_inserir == "alterar") {
        $id = $_POST["id"];
        $query = "UPDATE jogos SET data_hora = '$data', estadio_idestadio = '$estadio', pais_idpais_1 = '$pais_um', pais_idpais_2 = '$pais_dois', gols_idpais_1 = '$gols_um', gols_idpais_2 = '$gols_dois', publico = '$publico' WHERE idrodada = '$id';";
        $result = mysqli_query($conexao, $query) or die("Erro ao alterar jogo.");
    }
    else {
        $insere = "INSERT INTO jogos (data_hora, estadio_idestadio, pais_idpais_1, pais_idpais_2, gols_idpais_1, gols_idpais_2, publico) 
        VALUES ('$data', '$estadio', '$pais_um', '$pais_dois', '$gols_um', '$gols_dois', '$publico');";
        $result = mysqli_query($conexao, $insere) or die("Erro ao inserir jogo.");
        $select_id = "SELECT idrodada FROM jogos WHERE data_hora = '$data' AND estadio_idestadio = '$estadio' AND pais_idpais_1 = '$pais_um' AND pais_idpais_2 = '$pais_dois' AND gols_idpais_1 = '$gols_um' AND gols_idpais_2 = '$gols_dois' AND publico = '$publico';";
        $r_id = mysqli_query($conexao, $select_id) or die("Erro ao inserir jogo.");
        $myrow = mysqli_fetch_array($r_id);
        $id = $myrow['idrodada'];
    }

    if($gols_um != 0) 
    {
        for($i = 1; $i <= $gols_um; $i++) {
            $base = "".$_POST["t_gols_".$i."_m_um"].":".$_POST["t_gols_".$i."_s_um"]."";
            array_push($tempo, $base);
            array_push($jogador, $_POST["gol_jogador_".$i."_um"]);

            $g1 = $jogador[$i - 1];
            $g2 = $tempo[$i - 1];

            $insere = "INSERT INTO gols (jogos_idrodada, jogador_idjogador, tempo) 
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

            $insere = "INSERT INTO gols (jogos_idrodada, jogador_idjogador, tempo) 
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

    echo "Dados alterados no banco com sucesso!";
    echo '<br><a href="../../bottons-jogos.html"><button>Voltar</button></a>'
?>
</body>
</html>
