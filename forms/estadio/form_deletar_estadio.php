<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Deletar Estádio</title>
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
            li {
                list-style: none;
            }
            .btn:hover {
                background: #f8b2ab;
                transition: all 0.3s;
            }
        </style>
    </head>
    <body>
        <h1>Escolha o estádio para deletar</h1>
        <input type="text" id="myInput" onkeyup="search()"/>
            <form name="estadio" action="../../php/estadio/deletar_estadio.php" id="myForm" method="post">
                <ul id="list-buttons">
                    <?php
                        include "../../php/conecta_banco.php";
                        $query = mysqli_query($conexao, "SELECT idestadio, descricao FROM estadio");
                        while($dados = mysqli_fetch_assoc($query))
                        {
                            echo "<li><button class='btn' id='".$dados['idestadio']."' onclick='getCupElement(".$dados['idestadio'].");'>".$dados['idestadio']." - ".$dados['descricao']."</button></li>";
                        }
                    ?>
                </ul>
                <input type="text" name="id" id="secret" style="display: none"/>
            </form>
    </body>
    <script type="text/javascript">
        function search() {
            var input, filter, ul, li, a, i, txtValue;
            input = document.getElementById('myInput');
            filter = input.value.toUpperCase();
            ul = document.getElementById("list-buttons");
            li = ul.getElementsByTagName('li');

            for (i = 0; i < li.length; i++) {
                btn = li[i].getElementsByTagName("button")[0];
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
</html>