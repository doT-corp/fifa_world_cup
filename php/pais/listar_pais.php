<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Listar País</title>           
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
        align-itens: center;
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
       
        table {
            border-collapse: collapse;
            border-spacing: 0;
            width: 95%;
            border: 1px solid #ddd;
        }

th, td {
  text-align: center;
  padding: 8px;
}

tr:nth-child(even){background-color: #21242e}     
</style>
    </head>
    <body>
        <H1>Lista dos países presentes</H1>
        Pesquisar por nome: <input type="text" id="myInput" onkeyup="search();"/>
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
        <?php
            if($_SESSION['usuario'] != "admin")
                echo "<a href='../../index.php'><button>Voltar</button></a>";
            else
                echo "<a href='../../bottons-paises.html'><button>Voltar</button></a>";
        ?>
            <div style="overflow-x:auto;" class="divs">
                <table id="list" class="center">
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Continente</th>
                        <th>Técnico</th>
                        <th>Pontos</th>
                        <th>Vitorias</th>
                        <th>Empates</th>
                        <th>Derrotas</th>
                        <th>Gols Pró</th>
                        <th>Gols Contra</th>
                        <th>Grupo</th>
                    </tr>
                    <?php
                        include "../conecta_banco.php";
                        $sel_con = filter_input(INPUT_POST, 'continente', FILTER_SANITIZE_STRING);
                        $query = mysqli_query($conexao, "SELECT pais.idpais, pais.selecao, pais.continente, pais.tecnico, pais.pontos, pais.vitorias, pais.empates, pais.derrotas, pais.golspro, pais.golscontra, grupo.descricao FROM pais INNER JOIN grupo ON pais.grupo_idgrupo = grupo.idgrupo;");
                        if($sel_con != "selected")
                            $query = mysqli_query($conexao, "SELECT pais.idpais, pais.selecao, pais.continente, pais.tecnico, pais.pontos, pais.vitorias, pais.empates, pais.derrotas, pais.golspro, pais.golscontra, grupo.descricao FROM pais INNER JOIN grupo ON pais.grupo_idgrupo = grupo.idgrupo WHERE continente = '$sel_con';");
                        while($row = mysqli_fetch_array($query)) {
                            echo "<tr'>";
                            echo "<td>";
                            echo $row['idpais'];
                            echo "</td>";
                            echo "<td class='nome'>";
                            echo $row['selecao'];
                            echo "</td>";
                            echo "<td>";
                            echo $row['continente'];
                            echo "</td>";
                            echo "<td>";
                            echo $row['tecnico'];
                            echo "</td>";
                            echo "<td>";
                            echo $row['pontos'];
                            echo "</td>";
                            echo "<td>";
                            echo $row['vitorias'];
                            echo "</td>";
                            echo "<td>";
                            echo $row['empates'];
                            echo "</td>";
                            echo "<td>";
                            echo $row['derrotas'];
                            echo "</td>";
                            echo "<td>";
                            echo $row['golspro'];
                            echo "</td>";
                            echo "<td>";
                            echo $row['golscontra'];
                            echo "</td>";
                            echo "<td>";
                            echo $row['descricao'];
                            echo "</td>";
                            echo "</tr>";
                        }
                    ?>
                </table>
        </div>
    </body>
    <script type="text/javascript">
        search();
        function search() {
            var input, filter, myList, tr, tdNames, i, txtValue, n_encontrados, counter;
            input = document.getElementById('myInput');
            filter = input.value.toUpperCase();
            myList = document.getElementById("list");
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