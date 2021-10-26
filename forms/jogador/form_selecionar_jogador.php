<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Selecione um Jogador</title>
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
        <h1>Escolha o país e jogador</h1>
        <input type="text" id="myInput" onkeyup="search('myInput', 'button');"/>
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
            <input type="submit" value="Pesquisar"/>
        </form>
        <form name="jogador" action="form_alterar_jogador.php" method="post">
        <ul id="list-buttons">
                <?php
                    include "../../php/conecta_banco.php";
                    $sel_pais = filter_input(INPUT_POST, 'pais', FILTER_SANITIZE_STRING);
                    $query = mysqli_query($conexao, "SELECT jogador.idjogador, jogador.nome, pais.selecao FROM jogador INNER JOIN pais ON jogador.pais_idpais = pais.idpais;");
                    if($sel_pais != "selected")
                        $query = mysqli_query($conexao, "SELECT jogador.idjogador, jogador.nome, pais.selecao FROM jogador INNER JOIN pais ON jogador.pais_idpais = pais.idpais WHERE jogador.pais_idpais = '$sel_pais';");
                    while($dados = mysqli_fetch_assoc($query))
                    {
                        echo "<li><button class='btn' id='".$dados['idjogador']."' onclick='getCupElement(".$dados['idjogador'].");'>".$dados['nome']."</button><p>ID: ".$dados['idjogador']."<br>País: ".$dados['selecao']."</p><br><br><br><br></li>";
                    }
                ?>
            </ul>
            <input type="text" name="id" id="secret" style="display: none"/>
        </form>
        <script type="text/javascript">
            function search(myInput, myTag) {
                var input, filter, ul, li, a, i, txtValue;
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
            }       

            function getCupElement(myId) {
                var btn = document.getElementById(myId);
                var secret = document.getElementById('secret');
                secret.value = myId;
                var myForm = document.getElementById("myForm").
                myForm.submit();
            }

        </script>
    </body>
</html>