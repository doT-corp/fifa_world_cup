<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Listar Estádios</title>
        <style>
                body{
                    font-size: large;
                    font-family: 'Montserrat', sans-serif;
                    text-align: center;
                }
                button{
                    font-size: large;
                    padding: 10px;
                    margin: 10px;
                    border-radius: 10px;
                    border-color: black;
                    background-color: rgb(207, 98, 98);     
                }
                button:hover {
                    background: #f8b2ab;
                    transition: all 0.3s;
                }
                td {
                    padding: 20px;
                }
        </style>
    </head>
    <body>
        <h3 id="counter">Número de jogos encontrados: 0</h3>
        <form method="post">
            <select name="pais" id="mySelect">
                <?php
                    include "../../php/conecta_banco.php";
                    echo "<option value='selected'>Qualquer</option>";
                    $query = mysqli_query($conexao, "SELECT idpais, selecao FROM pais ORDER BY selecao ASC");
                    while($dados = mysqli_fetch_assoc($query))
                    {
                        echo "<option value='".$dados['idpais']."'>".$dados['selecao']."</option>";
                    }
                ?>
            </select>
            <input type="text" name="id" id="secret" style="display: none"/>
            <input type="submit" value="Filtrar" onclick="search();"/>
        </form>
        
        <table id="list">
            <tr>
                <th>ID</th>
                <th>Data e Hora</th>
                <th>Estadio</th>
                <th>País 1</th>
                <th>Gols País 1</th>
                <th>País 2</th>
                <th>Gols País 2</th>
                <th>Público</th>
            </tr>
                <?php
                    include "../conecta_banco.php";
                    $sel_pais = filter_input(INPUT_POST, 'pais', FILTER_SANITIZE_STRING);
                    $query = mysqli_query($conexao, "SELECT jogos.idrodada, estadio.descricao, jogos.data_hora, p1.selecao as pa1, p2.selecao as pa2, jogos.gols_idpais_1, jogos.gols_idpais_2, jogos.publico FROM jogos INNER JOIN estadio ON estadio.idestadio = jogos.estadio_idestadio INNER JOIN pais as p1 ON jogos.pais_idpais_1 = p1.idpais INNER JOIN pais as p2 ON jogos.pais_idpais_2 = p2.idpais;");
                    if($sel_pais != "selected")
                        $query = mysqli_query($conexao, "SELECT jogos.idrodada, estadio.descricao, jogos.data_hora, p1.selecao as pa1, p2.selecao as pa2, jogos.gols_idpais_1, jogos.gols_idpais_2, jogos.publico FROM jogos INNER JOIN estadio ON estadio.idestadio = jogos.estadio_idestadio INNER JOIN pais as p1 ON jogos.pais_idpais_1 = p1.idpais INNER JOIN pais as p2 ON jogos.pais_idpais_2 = p2.idpais WHERE jogos.pais_idpais_1 = '$sel_pais' OR jogos.pais_idpais_2 = '$sel_pais';");
                    while($row = mysqli_fetch_array($query)) {
                        echo "<tr>";
                        echo "<td>";
                        echo $row['idrodada'];
                        echo "</td>";
                        echo "<td>";
                        echo $row['data_hora'];
                        echo "</td>";
                        echo "<td>";
                        echo $row['descricao'];
                        echo "</td>";
                        echo "<td>";
                        echo $row['pa1'];
                        echo "</td>";
                        echo "<td>";
                        echo $row['gols_idpais_1'];
                        echo "</td>";
                        echo "<td>";
                        echo $row['pa2'];
                        echo "</td>";
                        echo "<td>";
                        echo $row['gols_idpais_2'];
                        echo "</td>";
                        echo "<td>";
                        echo $row['publico'];
                        echo "</td>";
                        echo "</tr>";
                        echo "<tr>";
                        $rodada = $row['idrodada'];
                        echo "<td colspan='8'>";
                        echo "<br>Gols: <br>";
                        $a_query = mysqli_query($conexao, "SELECT jogador.nome, pais.selecao, gols.tempo FROM jogador INNER JOIN gols ON gols.jogador_idjogador = jogador.idjogador INNER JOIN pais ON jogador.pais_idpais = pais.idpais WHERE gols.jogos_idrodada = $rodada;");
                        if(mysqli_num_rows($a_query) != 0) {
                            while($next_row = mysqli_fetch_array($a_query)) {
                                echo $next_row['nome']." (".$next_row['selecao'].") - ".$next_row['tempo']."<br>";
                            }
                        } else echo "Não houve registro de gols durante a partida.<br>";
                        echo "<br>Substituições: <br>";
                        $rodada = $row['idrodada'];
                        $a_query = mysqli_query($conexao, "SELECT j1.nome as jo1, j2.nome as jo2, pais.selecao, substituicao.tempo FROM substituicao INNER JOIN jogador as j1 ON substituicao.jogador_idjogador_sai = j1.idjogador INNER JOIN jogador as j2 ON substituicao.jogador_idjogador_entra = j2.idjogador INNER JOIN pais ON j1.pais_idpais = pais.idpais WHERE substituicao.jogos_idrodada = $rodada;");
                        if(mysqli_num_rows($a_query) != 0) {
                            while($next_row = mysqli_fetch_array($a_query)) {
                                echo $next_row['jo1']." -> ".$next_row['jo2']." - ".$next_row['tempo']." (".$next_row['selecao'].")<br>";
                            }
                        } else echo "Não houve registro de substituições durante a partida.<br>";
                        echo "<br>Cartões Amarelos: <br>";
                        $a_query = mysqli_query($conexao, "SELECT jogador.nome, pais.selecao, cartao.tempo FROM jogador INNER JOIN cartao ON cartao.jogador_idjogador = jogador.idjogador INNER JOIN pais ON jogador.pais_idpais = pais.idpais WHERE cartao.jogos_idrodada = $rodada && cartao.amarelo = 1;");
                        if(mysqli_num_rows($a_query) != 0) {
                            while($next_row = mysqli_fetch_array($a_query)) {
                                echo $next_row['nome']." (".$next_row['selecao'].") - ".$next_row['tempo']."<br>";
                            }
                        } else echo "Não houve registro de cartões amarelos durante a partida.<br>";
                        echo "<br>Cartões Vermelhos: <br>";
                        $a_query = mysqli_query($conexao, "SELECT jogador.nome, pais.selecao, cartao.tempo FROM jogador INNER JOIN cartao ON cartao.jogador_idjogador = jogador.idjogador INNER JOIN pais ON jogador.pais_idpais = pais.idpais WHERE cartao.jogos_idrodada = $rodada && cartao.vermelho = 1;");
                        if(mysqli_num_rows($a_query) != 0) {
                            while($next_row = mysqli_fetch_array($a_query)) {
                                echo $next_row['nome']." (".$next_row['selecao'].") - ".$next_row['tempo']."<br>";
                            }
                        } else echo "Não houve registro de cartões vermelhos durante a partida.<br>";
                        echo "<br>";
                        echo "<br>";
                        echo "<br>";
                        echo "<br>";
                        echo "</tr>";
                    }
                ?>
        </table>
        <a href="../../index.html"><button>Voltar</button>
    </body>
    <script type="text/javascript">
        search();
        function search() {
            var myList, tr, i, n_encontrados, counter;
            myList = document.getElementById("list");
            tr = myList.getElementsByTagName('tr');

            n_encontrados = tr.length;

            for (i = 0; i < tr.length; i++) {
                if (tr[i].style.display == "none") {
                    n_encontrados--;
                }
            }

            counter = document.getElementById("counter");
            counter.innerHTML = "Número de estádios encontrados: " + (n_encontrados - 1);
        }

    </script>
</html>