<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Alterar Jogo - Estatísticas</title>
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
        margin-top: 10%;
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
    button{
        margin-top: 6%;
        inline-size: 86%;
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
        box-shadow: 2px 10px 18px #000000;
        margin-bottom:-4%;
       }
        button:hover{
            background-color: #284a99;
            transition: 0.2s;

        }
        </style>      
    </head>
    <body>
        <?php
            include "../../php/conecta_banco.php";
            $id = $_POST['id'];
            $data = $_POST['data'];
            $estadio = $_POST['estadio'];
            $pais_um = $_POST['pais_um'];
            $pais_dois = $_POST['pais_dois'];
            $gols_um = $_POST['gols_um'];
            $gols_dois = $_POST['gols_dois'];
            $substituicoes_um = $_POST['substituicoes_um'];
            $substituicoes_dois = $_POST['substituicoes_dois'];
            $amarelo_um = $_POST['amarelo_um'];
            $amarelo_dois = $_POST['amarelo_dois'];
            $vermelho_um = $_POST['vermelho_um'];
            $vermelho_dois = $_POST['vermelho_dois'];
            $publico = $_POST['publico'];
            $query = "UPDATE jogos SET data_hora = '$data', estadio_idestadio = '$estadio', pais_idpais_1 = '$pais_um', pais_idpais_2 = '$pais_dois', gols_idpais_1 = '$gols_um', gols_idpais_2 = '$gols_dois', publico = '$publico' WHERE idrodada = '$id';";
            $result = mysqli_query($conexao, $query) or die("Erro ao alterar jogo.");
        
            $resetar = "DELETE FROM gols WHERE jogos_idrodada = '$id';";
            mysqli_query($conexao, $resetar) or die("Erro!");
            $resetar = "DELETE FROM substituicao WHERE jogos_idrodada = '$id';";
            mysqli_query($conexao, $resetar) or die("Erro!");
            $resetar = "DELETE FROM cartao WHERE jogos_idrodada = '$id';";
            mysqli_query($conexao, $resetar) or die("Erro!");
        
        ?>
        <h1>Estatísticas do jogo</h1>
        <form action="../../php/jogo/estatisticas_jogo.php" method="post">
            <h2>Especificar País 1</h2><br>
            <h2>Gols</h2>
            <?php
                $i = 1;
                if($gols_um != 0) {
                    for($i = 1; $i <= $gols_um; $i++) {
                        $query = mysqli_query($conexao, "SELECT idjogador, nome FROM jogador WHERE pais_idpais = $pais_um ORDER BY nome ASC");
                        echo "<select name='gol_jogador_".$i."_um'>";
                        while($dados = mysqli_fetch_assoc($query))
                        {
                            echo "<option value='".$dados['idjogador']."'>".$dados['nome']."</option>";
                        }
                        echo "</select><br>";
                        echo "Minutos: <input type='number' name='t_gols_".$i."_m_um' max='125'><br>";
                        echo "Segundos: <input type='number' name='t_gols_".$i."_s_um' max='60'><br><br>";
                    }
                }
                else echo "<h3>Não houve gols do time 1</h3>";
            ?>
            <h2>Substituições</h2>
            <?php
                $i = 1;
                if($substituicoes_um != 0) {
                    for($i = 1; $i <= $substituicoes_um; $i++) {
                        $query = mysqli_query($conexao, "SELECT idjogador, nome FROM jogador WHERE pais_idpais = $pais_um ORDER BY nome ASC");
                        echo "Jogador Substituído: <select name='sube_jogador_".$i."_um'>";
                        while($dados = mysqli_fetch_assoc($query))
                        {
                            echo "<option value='".$dados['idjogador']."'>".$dados['nome']."</option>";
                        }
                        echo "</select><br>";
                        $query = mysqli_query($conexao, "SELECT idjogador, nome FROM jogador WHERE pais_idpais = $pais_um ORDER BY nome ASC");
                        echo "Jogador que substituiu: <select name='subs_jogador_".$i."_um'>";
                        while($dados = mysqli_fetch_assoc($query))
                        {
                            echo "<option value='".$dados['idjogador']."'>".$dados['nome']."</option>";
                        }
                        echo "</select><br><br>";
                        echo "Minutos: <input type='number' name='t_sub_".$i."_m_um' max='125'><br>";
                        echo "Segundos: <input type='number' name='t_sub_".$i."_s_um' max='60'><br><br><br>";
                    }
                }
                else echo "<h3>Não houve substituições do time 1</h3>";
            ?>
            <h2>Cartões Amarelos</h2>
            <?php
                $i = 1;
                if($amarelo_um != 0) {
                    for($i = 1; $i <= $amarelo_um; $i++) {
                        $query = mysqli_query($conexao, "SELECT idjogador, nome FROM jogador WHERE pais_idpais = $pais_um ORDER BY nome ASC");
                        echo "<select name='amarelo_jogador_".$i."_um'>";
                        while($dados = mysqli_fetch_assoc($query))
                        {
                            echo "<option value='".$dados['idjogador']."'>".$dados['nome']."</option>";
                        }
                        echo "</select><br>";
                        echo "Minutos: <input type='number' name='t_amarelo_".$i."_m_um' max='125'><br>";
                        echo "Segundos: <input type='number' name='t_amarelo_".$i."_s_um' max='60'><br><br>";
                    }
                }
                else echo "<h3>Não houve cartões amarelos do time 1</h3>";
            ?>
            <h2>Cartões Vermelhos</h2>
            <?php
                $i = 1;
                if($vermelho_um != 0) {
                    for($i = 1; $i <= $vermelho_um; $i++) {
                        $query = mysqli_query($conexao, "SELECT idjogador, nome FROM jogador WHERE pais_idpais = $pais_um ORDER BY nome ASC");
                        echo "<select name='vermelho_jogador_".$i."_um'>";
                        while($dados = mysqli_fetch_assoc($query))
                        {
                            echo "<option value='".$dados['idjogador']."'>".$dados['nome']."</option>";
                        }
                        echo "</select><br>";
                        echo "Minutos: <input type='number' name='t_vermelho_".$i."_m_um' max='125'><br>";
                        echo "Segundos: <input type='number' name='t_vermelho_".$i."_s_um' max='60'><br><br>";
                    }
                }
                else echo "<h3>Não houve cartões vermelhos do time 1</h3>";
            ?>
            
            <!-- pais 2 !-->
            
            <br><br><br><h2>Especificar País 2</h2><br>
            <h2>Gols</h2>
            <?php
                $i = 1;
                if($gols_dois != 0) {
                    for($i = 1; $i <= $gols_dois; $i++) {
                        $query = mysqli_query($conexao, "SELECT idjogador, nome FROM jogador WHERE pais_idpais = $pais_dois ORDER BY nome ASC");
                        echo "<select name='gol_jogador_".$i."_dois'>";
                        while($dados = mysqli_fetch_assoc($query))
                        {
                            echo "<option value='".$dados['idjogador']."'>".$dados['nome']."</option>";
                        }
                        echo "</select><br>";
                        echo "Minutos: <input type='number' name='t_gols_".$i."_m_dois' max='125'><br>";
                        echo "Segundos: <input type='number' name='t_gols_".$i."_s_dois' max='60'><br><br>";
                    }
                }
                else echo "<h3>Não houve gols do time 2</h3>";
            ?>
            <h2>Substituições</h2>
            <?php
                $i = 1;
                if($substituicoes_dois != 0) {
                    for($i = 1; $i <= $substituicoes_dois; $i++) {
                        $query = mysqli_query($conexao, "SELECT idjogador, nome FROM jogador WHERE pais_idpais = $pais_dois ORDER BY nome ASC");
                        echo "Jogador Substituído: <select name='sube_jogador_".$i."_dois'>";
                        while($dados = mysqli_fetch_assoc($query))
                        {
                            echo "<option value='".$dados['idjogador']."'>".$dados['nome']."</option>";
                        }
                        echo "</select><br>";
                        $query = mysqli_query($conexao, "SELECT idjogador, nome FROM jogador WHERE pais_idpais = $pais_dois ORDER BY nome ASC");
                        echo "Jogador que substituiu: <select name='subs_jogador_".$i."_dois'>";
                        while($dados = mysqli_fetch_assoc($query))
                        {
                            echo "<option value='".$dados['idjogador']."'>".$dados['nome']."</option>";
                        }
                        echo "</select><br><br>";
                        echo "Minutos: <input type='number' name='t_sub_".$i."_m_dois' max='125'><br>";
                        echo "Segundos: <input type='number' name='t_sub_".$i."_s_dois' max='60'><br><br><br>";
                    }
                }
                else echo "<h3>Não houve substituições do time 2</h3>";
            ?>
            <h2>Cartões Amarelos</h2>
            <?php
                $i = 1;
                if($amarelo_dois != 0) {
                    for($i = 1; $i <= $amarelo_dois; $i++) {
                        $query = mysqli_query($conexao, "SELECT idjogador, nome FROM jogador WHERE pais_idpais = $pais_dois ORDER BY nome ASC");
                        echo "<select name='amarelo_jogador_".$i."_dois'>";
                        while($dados = mysqli_fetch_assoc($query))
                        {
                            echo "<option value='".$dados['idjogador']."'>".$dados['nome']."</option>";
                        }
                        echo "</select><br>";
                        echo "Minutos: <input type='number' name='t_amarelo_".$i."_m_dois' max='125'><br>";
                        echo "Segundos: <input type='number' name='t_amarelo_".$i."_s_dois' max='60'><br><br>";
                    }
                }
                else echo "<h3>Não houve cartões amarelos do time 2</h3>";
            ?>
            <h2>Cartões Vermelhos</h2>
            <?php
                $i = 1;
                if($vermelho_dois != 0) {
                    for($i = 1; $i <= $vermelho_dois; $i++) {
                        $query = mysqli_query($conexao, "SELECT idjogador, nome FROM jogador WHERE pais_idpais = $pais_dois ORDER BY nome ASC");
                        echo "<select name='vermelho_jogador_".$i."_dois'>";
                        while($dados = mysqli_fetch_assoc($query))
                        {
                            echo "<option value='".$dados['idjogador']."'>".$dados['nome']."</option>";
                        }
                        echo "</select><br>";
                        echo "Minutos: <input type='number' name='t_vermelho_".$i."_m_dois' max='125'><br>";
                        echo "Segundos: <input type='number' name='t_vermelho_".$i."_s_dois' max='60'><br><br>";
                    }
                }
                else echo "<h3>Não houve cartões vermelhos do time 2</h3>";
                
                echo "<input type='number' style='display: none;' name='id' value='".$id."'>";
                echo "<input type='number' style='display: none;' name='gols_um' value='".$gols_um."'>";
                echo "<input type='number' style='display: none;' name='gols_dois' value='".$gols_dois."'>";
                echo "<input type='number' style='display: none;' name='substituicoes_um' value='".$substituicoes_um."'>";
                echo "<input type='number' style='display: none;' name='substituicoes_dois' value='".$substituicoes_dois."'>";
                echo "<input type='number' style='display: none;' name='amarelo_um' value='".$amarelo_um."'>";
                echo "<input type='number' style='display: none;' name='amarelo_dois' value='".$amarelo_dois."'>";
                echo "<input type='number' style='display: none;' name='vermelho_um' value='".$vermelho_um."'>";
                echo "<input type='number' style='display: none;' name='vermelho_dois' value='".$vermelho_dois."'>";
            ?>
            <input type="submit" class="btn" value="Alterar"/>
            <input type="reset" class="btn" value="Redefinir"/> 
        </form>
    </body>
</html>