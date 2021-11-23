<!DOCTYPE html>
<html lang="pt-br"> <!-- Muda a linguagem da webpage para português -->
    <head>
        <!-- Configuração de HEAD da página-->
        <meta charset="UTF-8"> <!-- Definição de caracteres -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- Configuração do HTTP -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Configuração para responsividade -->
        <title>Selecione um Jogo</title> <!-- Titulo da página -->
        <!-- Fontes utilizadas na home -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet"> 
        <link rel="icon" href="../../assets/fifa_icon.png"> <!-- Ícone da aba do navegador -->
        <!-- CSS -->
        <style>
            body{
                font-family: 'Montserrat', sans-serif;
                background-color: #171920;
                width: 98%;
                height:auto;
                text-align:center;
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
            font-weight: 300;
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
        /*Essa parte é do scroll bar lateral =)*/ 
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
  /*responsive =)*/ 
        @media screen and (max-width: 600px){
            body{
                width: auto;
            }
            h1{
                font-size: 200%;
                margin-left: 6%;
                margin-right:6%;
                margin-top: 6%;
            }
            input{
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
            #list-buttons{
                margin-left: -7%;
            }
        }
        </style>
    </head>
    <body>
        <h1>Escolha o jogo</h1>
        <input type="text" id="myInput" onkeyup="search('myInput', 'button');"/> <!-- Quando digitar, ativar a função de procura -->
        <a href="../../bottons-paises.html"><input type="button" class="btn" value="Voltar"/></a>
        <h3 id="counter">Número de jogos encontrados: 0</h3> <!-- Indica o número de elementos encontrados -->
        <form method="post">
            <select name="pais" id="mySelect">
                <?php
                    include "../../php/conecta_banco.php"; // Incluir conexão
                    echo "<option value='selected'>Qualquer</option>"; // opção qualquer
                    $query = mysqli_query($conexao, "SELECT idpais, selecao FROM pais ORDER BY selecao ASC"); // realiza a query
                    while($dados = mysqli_fetch_assoc($query)) { // enquanto a query retornar valores
                        echo "<option value='".$dados['idpais']."'>".$dados['selecao']."</option>"; // mostra a opção
                    }
                ?>
            </select>
            <!-- input-text escondido --> 
            <input type="text" name="id" id="secret" style="display: none"/>
            <input type="submit" value="Filtrar"/>
        </form>
        <form name="jogo" action="form_alterar_jogo.php" method="post">
        <ul id="list-buttons">
            <?php
                include "../../php/conecta_banco.php"; // Incluir conexão
                $sel_pais = filter_input(INPUT_POST, 'pais', FILTER_SANITIZE_STRING); // Pega o valor do option
                // Realização de query com algum país específico ou não
                $query = mysqli_query($conexao, "SELECT jogos.idrodada, p1.selecao as pa1, p2.selecao as pa2 FROM jogos INNER JOIN pais as p1 ON jogos.pais_idpais_1 = p1.idpais INNER JOIN pais as p2 ON jogos.pais_idpais_2 = p2.idpais;");
                if($sel_pais != "selected")
                    $query = mysqli_query($conexao, "SELECT jogos.idrodada, p1.selecao as pa1, p2.selecao as pa2 FROM jogos INNER JOIN pais as p1 ON jogos.pais_idpais_1 = p1.idpais INNER JOIN pais as p2 ON jogos.pais_idpais_2 = p2.idpais WHERE jogos.pais_idpais_1 = '$sel_pais' OR jogos.pais_idpais_2 = '$sel_pais';");
                while($dados = mysqli_fetch_assoc($query)) { // Enquanto encontrar resultados da query
                    // Mostra através de um botão
                    echo "<li><button class='btn' id='".$dados['idrodada']."' onclick='getCupElement(".$dados['idrodada'].");'>".$dados['pa1']." x ".$dados['pa2']."</button><p>ID Rodada: ".$dados['idrodada']."</p><br><br></li>";
                }
                ?>
            </ul>
            <!-- input-text escondido --> 
            <input type="text" name="id" id="secret2" style="display: none"/>
        </form>
        <script type="text/javascript">
            search('myInput', 'button');
            function search(myInput, myTag) { // Função de procura
                var input, filter, ul, li, a, i, txtValue, n_encontrados, counter; // declaração de variáveis
                input = document.getElementById(myInput); // Atribui o input
                filter = input.value.toUpperCase(); // Coloca todo o input em capslock, para facilitar na comparação
                ul = document.getElementById("list-buttons"); // Pega a lista
                li = ul.getElementsByTagName('li'); // Pega cada elemento da lista
                for (i = 0; i < li.length; i++) { // Para 0 até o tamanho da lista
                    btn = li[i].getElementsByTagName(myTag)[0]; // Pega o elemento atual
                    // console.log(btn.innerText); 
                    txtValue = btn.textContent || btn.innerText; // Atribui dois valores para txtValue
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        li[i].style.display = ""; // Exibe 
                    } else { // Senão
                        li[i].style.display = "none"; // Esconde
                    }
                }

                n_encontrados = li.length; // Atribui o tamanho da lista

                for (i = 0; i < li.length; i++) { // Para 0 até o tamanho da lista
                    if (li[i].style.display == "none") { // Se encontrar um elemento com display: none
                        n_encontrados--; // Diminui o número de elementos encontrados
                    }
                }

                counter = document.getElementById("counter"); // Pega o elemento que exibe o counter
                counter.innerHTML = "Número de jogos encontrados: " + n_encontrados; // Altera o valor de counter
            }       
            /*
            A função getCupElement serve para pegar o id e atribuir em um input type=text, 
            que será responsável por levar qual id foi selecionado
            */
            function getCupElement(myId) {
                var btn = document.getElementById(myId); // Pega o botão selecionado
                var secret = document.getElementById('secret2'); // Pega o input=text escondido
                secret.value = myId; // atribui o valor ao secreto
                var myForm = document.getElementById("myForm"); // pega o formulário
                myForm.submit(); // realiza um envio
            }
        </script>
    </body>
</html>