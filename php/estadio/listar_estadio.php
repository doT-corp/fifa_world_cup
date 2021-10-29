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
        Pesquisar por nome: <input type="text" id="myInput" onkeyup="search();"/>
        <h3 id="counter">Número de estádios encontrados: 0</h3>
        <table id="list-stadiums">
            <tr>
                <th>ID</th>
                <th>Descrição</th>
                <th>Localização</th>
                <th>Capacidade</th>
            </tr>
                <?php
                    include "../conecta_banco.php";
                    $procura = "SELECT * FROM estadio";
                    $result = mysqli_query($conexao, $procura);
                    while($row = mysqli_fetch_array($result)) {
                    echo "<tr>";
                    echo "<td>";
                    echo $row['idestadio'];
                    echo "</td>";
                    echo "<td class='nome'>";
                    echo $row['descricao'];
                    echo "</td>";
                    echo "<td>";
                    echo $row['localizacao'];
                    echo "</td>";
                    echo "<td>";
                    echo $row['capacidade'];
                    echo "</td>";
                    echo "</tr>";
                }
            ?>
        </table>
        <a href="../../index.html"><button>Voltar</button>
    </body>
    <script type="text/javascript">
        search();
        function search() {
            var input, filter, myList, tr, tdNames, i, txtValue, n_encontrados, counter;
            input = document.getElementById('myInput');
            filter = input.value.toUpperCase();
            myList = document.getElementById("list-stadiums");
            tr = myList.getElementsByTagName('tr');

            for (i = 1; i < tr.length; i++) {
                tdNames = tr[i].getElementsByClassName("nome")[0];
                txtValue = tdNames.textContent || tdNames.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }

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