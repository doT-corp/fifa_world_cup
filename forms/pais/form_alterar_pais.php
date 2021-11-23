<!DOCTYPE html>
<html lang="pt-br"> <!-- Muda a linguagem da webpage para português -->
    <head>
        <!-- Configuração de HEAD da página-->
        <meta charset="UTF-8"> <!-- Definição de caracteres -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- Configuração do HTTP -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Configuração para responsividade -->
        <title>Alterar País</title> <!-- Titulo da página -->
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
        .tecnico{
            margin-top:1%;
            margin-bottom: 5%;
        }      
        </style>
    </head>
    <body>
        <h1>Formulário para alterar dados do país</h1>
        <form name="estadio" action="../../php/pais/alterar_pais.php" method="post">
                <!-- Mostra o ID -->
                ID: <?php
                        $myid = $_POST['id'];
                        echo $myid;
                    ?><br><br>
                <!-- Mostra o nome -->
                Nome Antigo: <?php
                    include "../../php/conecta_banco.php";
                    $query = mysqli_query($conexao, "SELECT selecao FROM pais WHERE idpais = '$myid';");
                    $row = mysqli_fetch_array($query);
                    echo $row['selecao'];
                ?><br>
                <!-- Entrada do novo nome -->        
                Nome Novo: <input class="input-text" type="text" name="nome"/> <br><br>
                <!-- Mostra o continente -->
                Continente Antigo: <?php
                    include "../../php/conecta_banco.php";
                    $query = mysqli_query($conexao, "SELECT continente FROM pais WHERE idpais = '$myid';");
                    $row = mysqli_fetch_array($query);
                    echo $row['continente'];
                ?><br><br>
                <!-- Entrada da novo continente -->  
                Continente Novo: <select name="continente">
                    <option value="África">África</option>
                    <option value="América">América</option>
                    <option value="Ásia">Ásia</option>
                    <option value="Europa">Europa</option>
                    <option value="Oceania">Oceania</option>
                </select> <br><br>
                <!-- Mostra o técnico -->
                <p class="tecnico">Técnico Antigo: <?php
                    include "../../php/conecta_banco.php";
                    $query = mysqli_query($conexao, "SELECT tecnico FROM pais WHERE idpais = '$myid';");
                    $row = mysqli_fetch_array($query);
                    echo $row['tecnico'];
                ?><br></p>
                <!-- Entrada do novo técnico -->
                Técnico Novo: <input class="input-text" type="text" name="tecnico"/> <br><br>
                <!-- Mostra o grupo -->
                Grupo Antigo: <?php
                    include "../../php/conecta_banco.php";
                    $query = mysqli_query($conexao, "SELECT grupo.descricao FROM grupo INNER JOIN pais ON pais.grupo_idgrupo = grupo.idgrupo WHERE pais.idpais = '$myid';");
                    $row = mysqli_fetch_array($query);
                    echo $row['descricao'];
                ?><br><br>
                <!-- Entrada do novo grupo -->
                Grupo Novo: <select name="grupo">
                        <?php
                            include "../../php/conecta_banco.php";
                            $query = mysqli_query($conexao, "SELECT idgrupo, descricao FROM grupo");
                            while($dados = mysqli_fetch_assoc($query))
                            {
                                echo "<option value='".$dados['idgrupo']."'>".$dados['descricao']."</option>";
                            }
                        ?>
                </select> <br><br>
                <?php
                    // input type=text escondido
                    echo "<input type='text' value='{$myid}' name='id' style='display: none'/>";
                ?>
                <input type="submit" class="btn" value="Alterar"/>
                <input type="reset" class="btn" value="Redefinir"/>
                <a href="../../bottons-paises.html"><input type="button" class="btn" value="Voltar"/></a>
        </form>
    </body>
</html>