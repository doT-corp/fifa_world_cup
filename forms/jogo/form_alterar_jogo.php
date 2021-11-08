<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Alterar Jogo</title>
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
        <h1>Formulário para alterar jogo</h1>
        <form name="jogo" action="form_alterar_jogo_estatisticas.php" method="post">
                ID: <?php
                        $myid = $_POST['id'];
                        echo $myid;
                    ?><br><br>
                Dia e Hora Antigos:
                <?php
                    include "../../php/conecta_banco.php";
                    $query = mysqli_query($conexao, "SELECT data_hora FROM jogos WHERE idrodada = '$myid';");
                    $row = mysqli_fetch_array($query);
                    echo $row['data_hora'];
                ?><br>
                Dia e Hora Novos: <input type="datetime-local" name="data"/> <br><br>
                Estadio Antigo:
                <?php
                    $query = mysqli_query($conexao, "SELECT estadio.descricao FROM estadio INNER JOIN jogos ON estadio.idestadio = jogos.estadio_idestadio WHERE idrodada = '$myid';");
                    $row = mysqli_fetch_array($query);
                    echo $row['descricao'];
                ?><br>                
                Estadio Novo: <select name="estadio">
                        <?php
                            $query = mysqli_query($conexao, "SELECT idestadio, descricao FROM estadio ORDER BY descricao ASC");
                            while($dados = mysqli_fetch_assoc($query))
                            {
                                echo "<option value='".$dados['idestadio']."'>".$dados['descricao']."</option>";
                            }
                        ?>
                </select> <br><br>
                País 1 Antigo:
                <?php
                    $query = mysqli_query($conexao, "SELECT pais.selecao FROM pais INNER JOIN jogos ON pais.idpais = jogos.pais_idpais_1 WHERE idrodada = '$myid';");
                    $row = mysqli_fetch_array($query);
                    echo $row['selecao'];
                ?><br>  
                País 1 Novo: <select name="pais_um">
                        <?php
                            $query = mysqli_query($conexao, "SELECT idpais, selecao FROM pais ORDER BY selecao ASC");
                            while($dados = mysqli_fetch_assoc($query))
                            {
                                echo "<option value='".$dados['idpais']."'>".$dados['selecao']."</option>";
                            }
                        ?>
                </select> <br><br>
                País 2 Antigo:
                <?php
                    $query = mysqli_query($conexao, "SELECT pais.selecao FROM pais INNER JOIN jogos ON pais.idpais = jogos.pais_idpais_2 WHERE idrodada = '$myid';");
                    $row = mysqli_fetch_array($query);
                    echo $row['selecao'];
                ?><br>                
                País 2 Novo: <select name="pais_dois">
                        <?php
                            $query = mysqli_query($conexao, "SELECT idpais, selecao FROM pais ORDER BY selecao ASC");
                            while($dados = mysqli_fetch_assoc($query))
                            {
                                echo "<option value='".$dados['idpais']."'>".$dados['selecao']."</option>";
                            }
                        ?>
                </select> <br><br>
                Quantidade de gols do país 1 antigo:
                <?php
                    $query = mysqli_query($conexao, "SELECT gols_idpais_1 FROM jogos WHERE idrodada = '$myid';");
                    $row = mysqli_fetch_array($query);
                    echo $row['gols_idpais_1'];
                ?><br> 
                Quantidade de gols do país 1 novo: <input class="input-text" type="number" name="gols_um"/> <br><br>
                Quantidade de gols do país 2 antigo:
                <?php
                    $query = mysqli_query($conexao, "SELECT gols_idpais_2 FROM jogos WHERE idrodada = '$myid';");
                    $row = mysqli_fetch_array($query);
                    echo $row['gols_idpais_2'];
                ?><br> 
                Quantidade de gols do país 2 novo: <input class="input-text" type="number" name="gols_dois"/> <br><br>

                <!-- amarelos pais 1 !-->
                Quantidade de cartões amarelos do país 1 antigo:
                <?php
                    $query = mysqli_query($conexao, "SELECT COUNT(cartao.amarelo) FROM cartao INNER JOIN jogos ON cartao.jogos_idrodada = jogos.idrodada INNER JOIN jogador ON cartao.jogador_idjogador = jogador.idjogador WHERE cartao.jogos_idrodada = '$myid' AND jogador.pais_idpais = jogos.pais_idpais_1 AND cartao.amarelo = 1;");
                    $row = mysqli_fetch_array($query);
                    echo $row['COUNT(cartao.amarelo)'];
                ?><br> 
                Quantidade de cartões amarelos do país 1 novo: <input class="input-text" type="number" name="amarelo_um"/> <br><br>  

                Quantidade de cartões vermelhos do país 1 antigo:
                <?php
                    $query = mysqli_query($conexao, "SELECT COUNT(cartao.vermelho) FROM cartao INNER JOIN jogos ON cartao.jogos_idrodada = jogos.idrodada INNER JOIN jogador ON cartao.jogador_idjogador = jogador.idjogador WHERE cartao.jogos_idrodada = '$myid' AND jogador.pais_idpais = jogos.pais_idpais_1 AND cartao.vermelho = 1;");
                    $row = mysqli_fetch_array($query);
                    echo $row['COUNT(cartao.vermelho)'];
                ?><br>  
                Quantidade de cartões vermelhos do país 1 novo: <input class="input-text" type="number" name="vermelho_um"/> <br><br>

                <!-- amarelos pais 2 !-->
                Quantidade de cartões amarelos do país 2 antigo:
                <?php
                    $query = mysqli_query($conexao, "SELECT COUNT(cartao.amarelo) FROM cartao INNER JOIN jogos ON cartao.jogos_idrodada = jogos.idrodada INNER JOIN jogador ON cartao.jogador_idjogador = jogador.idjogador WHERE cartao.jogos_idrodada = '$myid' AND jogador.pais_idpais = jogos.pais_idpais_2 AND cartao.amarelo = 1;");
                    $row = mysqli_fetch_array($query);
                    echo $row['COUNT(cartao.amarelo)'];
                ?><br>  
                Quantidade de cartões amarelos do país 2 novo: <input class="input-text" type="number" name="amarelo_dois"/> <br><br>
                
                Quantidade de cartões vermelhos do país 2 antigo:
                <?php
                    $query = mysqli_query($conexao, "SELECT COUNT(cartao.vermelho) FROM cartao INNER JOIN jogos ON cartao.jogos_idrodada = jogos.idrodada INNER JOIN jogador ON cartao.jogador_idjogador = jogador.idjogador WHERE cartao.jogos_idrodada = '$myid' AND jogador.pais_idpais = jogos.pais_idpais_2 AND cartao.vermelho = 1;");
                    $row = mysqli_fetch_array($query);
                    echo $row['COUNT(cartao.vermelho)'];
                ?><br>                
                Quantidade de cartões vermelhos do país 2 novo: <input class="input-text" type="number" name="vermelho_dois"/> <br><br>
                
                Quantidade de substituições do país 1 antigo:
                <?php
                    $query = mysqli_query($conexao, "SELECT COUNT(substituicao.jogos_idrodada) FROM substituicao INNER JOIN jogos ON substituicao.jogos_idrodada = jogos.idrodada INNER JOIN jogador ON substituicao.jogador_idjogador_sai = jogador.idjogador WHERE substituicao.jogos_idrodada = '$myid' AND jogador.pais_idpais = jogos.pais_idpais_1;");
                    $row = mysqli_fetch_array($query);
                    echo $row['COUNT(substituicao.jogos_idrodada)'];
                ?><br>  
                Quantidade de substituições do país 1 novo (máximo 3): <input class="input-text" type="number" name="substituicoes_um" max="3"/> <br><br>
                
                Quantidade de substituições do país 2 antigo:
                <?php
                    $query = mysqli_query($conexao, "SELECT COUNT(substituicao.jogos_idrodada) FROM substituicao INNER JOIN jogos ON substituicao.jogos_idrodada = jogos.idrodada INNER JOIN jogador ON substituicao.jogador_idjogador_sai = jogador.idjogador WHERE substituicao.jogos_idrodada = '$myid' AND jogador.pais_idpais = jogos.pais_idpais_2;");
                    $row = mysqli_fetch_array($query);
                    echo $row['COUNT(substituicao.jogos_idrodada)'];
                ?><br>  
                Quantidade de substituições do país 2 novo (máximo 3): <input class="input-text" type="number" name="substituicoes_dois" max="3"/> <br><br>
                
                Público Antigo:
                <?php
                    $query = mysqli_query($conexao, "SELECT publico FROM jogos WHERE idrodada = '$myid';");
                    $row = mysqli_fetch_array($query);
                    echo $row['publico'];
                ?><br>
                Público Novo: <input class="input-text" type="number" name="publico"/> <br><br>
                <?php
                    echo "<input type='text' value='{$myid}' name='id' style='display: none'/>";
                ?>
                <p>Atenção: após a confirmação, os gols, substituições e cartões serão excluidos para serem repostos por novos.</p>
                <input type="submit" name="submit" id="submit" class="btn" value="Continuar"/>
                <input type="reset" class="btn" value="Redefinir"/>
        </form>
    </body>
</html>