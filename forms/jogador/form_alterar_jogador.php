<!DOCTYPE html>
<html lang="pt-br"> <!-- Muda a linguagem da webpage para português -->
    <head>
        <!-- Configuração de HEAD da página-->
        <meta charset="UTF-8"> <!-- Definição de caracteres -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- Configuração do HTTP -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Configuração para responsividade -->
        <title>Alterar Jogador</title> <!-- Titulo da página -->
        <!-- Fontes utilizadas na home -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet"> 
        <link rel="icon" href="../../assets/fifa_icon.png"> <!-- Ícone da aba do navegador -->
        <!-- CSS -->
        <style>
            body{
                font-family: 'Montserrat', sans-serif;
                background-image: url('../../assets/backgorund.png');
                /*background-color: #171920;*/
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
            box-shadow: 2px 10px 18px #000000;
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
            box-shadow: 2px 10px 18px #000000;
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
        <!-- Formulário para alteração -->
        <h1>Formulário para alterar dados do jogador</h1>
        <form name="estadio" action="../../php/jogador/alterar_jogador.php" method="post">
                <!-- Mostra o ID -->
                ID: <?php
                        $myid = $_POST['id'];
                        echo $myid;
                    ?><br><br>
                <!-- Mostra o nome -->
                Nome Antigo: <?php
                    include "../../php/conecta_banco.php";
                    $query = mysqli_query($conexao, "SELECT nome FROM jogador WHERE idjogador = '$myid';");
                    $row = mysqli_fetch_array($query);
                    echo $row['nome'];
                ?><br>
                <!-- Entrada do novo nome -->   
                Nome Novo: <input class="input-text" type="text" name="nome"/> <br><br>
                <!-- Mostra a camisa -->
                Camisa Antiga: <?php
                    include "../../php/conecta_banco.php";
                    $query = mysqli_query($conexao, "SELECT camisa FROM jogador WHERE idjogador = '$myid';");
                    $row = mysqli_fetch_array($query);
                    echo $row['camisa'];
                ?><br>
                <!-- Entrada da nova camisa -->   
                Camisa Nova: <input class="input-text" type="number" name="camisa"/> <br><br>
                <!-- Mostra a posição -->
                Posição Antiga: <?php
                    include "../../php/conecta_banco.php";
                    $query = mysqli_query($conexao, "SELECT posicao FROM jogador WHERE idjogador = '$myid';");
                    $row = mysqli_fetch_array($query);
                    echo $row['posicao'];
                ?><br><br>
                <!-- Entrada da nova posição -->   
                Posição Nova: <select name="posicao">
                    <option value="Atacante">Atacante</option>
                    <option value="Central">Central</option>
                    <option value="Goleiro">Goleiro</option>
                    <option value="Lateral Direito">Lateral Direito</option>
                    <option value="Lateral Esquerdo">Lateral Esquerdo</option>
                    <option value="Meio Campo">Meio Campo</option>
                </select> <br><br>
                <!-- Mostra o país -->
                País Antigo: <?php
                    include "../../php/conecta_banco.php"; 
                    $query = mysqli_query($conexao, "SELECT pais.selecao FROM pais INNER JOIN jogador ON jogador.pais_idpais = pais.idpais WHERE jogador.idjogador = '$myid';");
                    $row = mysqli_fetch_array($query);
                    echo $row['selecao'];
                ?><br><br>
                <!-- Entrada do novo país -->   
                País Novo: <select name="idpais">
                        <?php
                            include "../../php/conecta_banco.php";
                            $query = mysqli_query($conexao, "SELECT idpais, selecao FROM pais");
                            while($dados = mysqli_fetch_array($query)) {
                                echo "<option value='".$dados['idpais']."'>".$dados['selecao']."</option>";
                            }
                        ?>
                </select><br><br>
                <!-- Mostra a situação -->
                Situação Antiga: <?php
                    include "../../php/conecta_banco.php";
                    $query = mysqli_query($conexao, "SELECT situacao FROM jogador WHERE idjogador = '$myid';");
                    $row = mysqli_fetch_array($query);
                    echo $row['situacao'];
                ?><br>
                <!-- Entrada da nova situação -->   
                Situação Nova: 
                <input type="radio" name="situacao" value="T"> Titular
                <input type="radio" name="situacao" value="R"> Reserva
                <br><br>
                <?php
                    // input-text escondido
                    echo "<input type='text' value='{$myid}' name='id' style='display: none'/>";
                ?>
                <input type="submit" class="btn" value="Alterar"/>
                <input type="reset" class="btn" value="Redefinir"/>
                <a href="../../bottons-jogadores.html"><input type="button" class="btn" value="Voltar"/></a>
        </form>
    </body>
</html>
