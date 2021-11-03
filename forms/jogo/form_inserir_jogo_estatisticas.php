<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Inserir Jogo - Estatísticas</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <style>
            body{
                font-size: large;
                font-family: 'Montserrat', sans-serif;
                margin-top: 350px;
            }
            h1{
                text-align: center;
            }
            form{
                text-align: center;
            }
            .input-text{
                font-size: large;
                padding: 10px;
                margin: 10px;
                border-radius: 10px;
                border-color: black;
            }
            .btn{
                font-size: large;
                padding: 10px;
                margin: 10px;
                border-radius: 10px;
                border-color: black;
                background-color: rgb(207, 98, 98);
               
            }
            
            .btn:hover {
                background: #f8b2ab;
                transition: all 0.3s;
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
            $insere = "INSERT INTO jogos (idrodada, data_hora, estadio_idestadio, pais_idpais_1, pais_idpais_2, gols_idpais_1, gols_idpais_2, publico) 
            VALUES ('$id', '$data', '$estadio', '$pais_um', '$pais_dois', '$gols_um', '$gols_dois', '$publico');";
            $result = mysqli_query($conexao, $insere) or die("Erro ao inserir jogo.");
        ?>
        <h1>Estatísticas do jogo</h1>
        <form action="../../php/jogo/inserir_estatisticas_jogo.php" method="post">
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
                    for($i = 1; $i <= $amarelo_um; $i++) {
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
            ?>
            <input type="submit" class="btn" value="Inserir"/>
            <input type="reset" class="btn" value="Redefinir"/> 
        </form>
    </body>
</html>