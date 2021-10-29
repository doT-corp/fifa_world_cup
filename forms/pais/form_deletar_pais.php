<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Deletar País</title>
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
        <h1>Escolha o país e continente para deletar</h1>
        <input type="text" id="myInput" onkeyup="search('myInput', 'button');"/>
        <h3 id="counter">Número de países encontrados: 0</h3>
        <form method="post">
            <select name="continente" id="mySelect">
                <option value="selected">Qualquer</option>
                <option value="África">África</option>
                <option value="América">América</option>
                <option value="Ásia">Ásia</option>
                <option value="Europa">Europa</option>
                <option value="Oceania">Oceania</option>
            </select>
            <input type="text" name="id" id="secret" style="display: none"/>
            <input type="submit" value="Filtrar"/>
        </form>
        <form name="paises" action="../../php/pais/deletar_pais.php" id="myForm" method="post">
            <ul id="list-buttons">
                <?php
                    include "../../php/conecta_banco.php";
                    $sel_con = filter_input(INPUT_POST, 'continente', FILTER_SANITIZE_STRING);
                    $query = mysqli_query($conexao, "SELECT idpais, selecao, continente FROM pais");
                    if($sel_con != "selected")
                        $query = mysqli_query($conexao, "SELECT idpais, selecao, continente FROM pais WHERE continente = '$sel_con';");
                    while($dados = mysqli_fetch_assoc($query))
                    {
                        echo "<li><button class='btn' id='".$dados['idpais']."' onclick='getCupElement(".$dados['idpais'].");'>".$dados['selecao']."</button><p>ID: ".$dados['idpais']."<br>Contintente: ".$dados['continente']."</p><br><br><br><br></li>";
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
                counter.innerHTML = "Número de países encontrados: " + n_encontrados;
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