<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Selecione um Jogo</title>
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

            li {
                list-style: none;
            }
        </style>
    </head>
    <body>
        <h1>Escolha o jogo</h1>
        <input type="text" id="myInput" onkeyup="search('myInput', 'button');"/>
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
            <input type="submit" value="Filtrar"/>
        </form>
        <form name="jogo" action="form_alterar_jogo.php" method="post">
        <ul id="list-buttons">
            <?php
                include "../../php/conecta_banco.php";
                $sel_pais = filter_input(INPUT_POST, 'pais', FILTER_SANITIZE_STRING);
                $query = mysqli_query($conexao, "SELECT jogos.idrodada, p1.selecao as pa1, p2.selecao as pa2 FROM jogos INNER JOIN pais as p1 ON jogos.pais_idpais_1 = p1.idpais INNER JOIN pais as p2 ON jogos.pais_idpais_2 = p2.idpais;");
                if($sel_pais != "selected")
                    $query = mysqli_query($conexao, "SELECT jogos.idrodada, p1.selecao as pa1, p2.selecao as pa2 FROM jogos INNER JOIN pais as p1 ON jogos.pais_idpais_1 = p1.idpais INNER JOIN pais as p2 ON jogos.pais_idpais_2 = p2.idpais WHERE jogos.pais_idpais_1 = '$sel_pais' OR jogos.pais_idpais_2 = '$sel_pais';");
                while($dados = mysqli_fetch_assoc($query))
                {
                    echo "<li><button class='btn' id='".$dados['idrodada']."' onclick='getCupElement(".$dados['idrodada'].");'>".$dados['pa1']." x ".$dados['pa2']."</button></li>";
                }
                ?>
            </ul>
            <input type="text" name="id" id="secret2" style="display: none"/>
        </form>
        <script type="text/javascript">
            search('myInput', 'button');
            function search(myInput, myTag) {
                var input, filter, ul, li, a, i, txtValue, n_encontrados, counter;
                input = document.getElementById(myInput);
                filter = input.value.toUpperCase();
                ul = document.getElementById("list-buttons");
                li = ul.getElementsByTagName('li');
                for (i = 0; i < li.length; i++) {
                    btn = li[i].getElementsByTagName(myTag)[0];
                    console.log(btn.innerText);
                    txtValue = btn.textContent || btn.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        li[i].style.display = "";
                    } else {
                        li[i].style.display = "none";
                    }
                }

                n_encontrados = li.length;

                for (i = 0; i < li.length; i++) {
                    if (li[i].style.display == "none") {
                        n_encontrados--;
                    }
                }

                counter = document.getElementById("counter");
                counter.innerHTML = "Número de jogos encontrados: " + n_encontrados;
            }       

            function getCupElement(myId) {
                var btn = document.getElementById(myId);
                var secret = document.getElementById('secret2');
                secret.value = myId;
                var myForm = document.getElementById("myForm").
                myForm.submit();
            }

        </script>
    </body>
</html>