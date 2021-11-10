<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Inserir Jogo</title>
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
        <h1>Formulário para inserir jogo</h1>
        <form name="jogo" action="form_inserir_jogo_estatisticas.php" method="post">
                Dia e Hora: <input type="datetime-local" name="data"/> <br><br>
                Estadio: <select name="estadio">
                        <?php
                            include "../../php/conecta_banco.php";
                            $query = mysqli_query($conexao, "SELECT idestadio, descricao FROM estadio ORDER BY descricao ASC");
                            while($dados = mysqli_fetch_assoc($query))
                            {
                                echo "<option value='".$dados['idestadio']."'>".$dados['descricao']."</option>";
                            }
                        ?>
                </select> <br><br>
                País 1: <select name="pais_um">
                        <?php
                            include "../../php/conecta_banco.php";
                            $query = mysqli_query($conexao, "SELECT idpais, selecao FROM pais ORDER BY selecao ASC");
                            while($dados = mysqli_fetch_assoc($query))
                            {
                                echo "<option value='".$dados['idpais']."'>".$dados['selecao']."</option>";
                            }
                        ?>
                </select> <br><br>
                País 2: <select name="pais_dois">
                        <?php
                            include "../../php/conecta_banco.php";
                            $query = mysqli_query($conexao, "SELECT idpais, selecao FROM pais ORDER BY selecao ASC");
                            while($dados = mysqli_fetch_assoc($query))
                            {
                                echo "<option value='".$dados['idpais']."'>".$dados['selecao']."</option>";
                            }
                        ?>
                </select> <br><br>
                Quantidade de gols do país 1: <input class="input-text" type="number" name="gols_um"/> <br><br>
                Quantidade de gols do país 2: <input class="input-text" type="number" name="gols_dois"/> <br><br>
                Quantidade de cartões amarelos do país 1: <input class="input-text" type="number" name="amarelo_um"/> <br><br>
                Quantidade de cartões vermelhos do país 1: <input class="input-text" type="number" name="vermelho_um"/> <br><br>
                Quantidade de cartões amarelos do país 2: <input class="input-text" type="number" name="amarelo_dois"/> <br><br>
                Quantidade de cartões vermelhos do país 2: <input class="input-text" type="number" name="vermelho_dois"/> <br><br>
                Quantidade de substituições do país 1 (máximo 3): <input class="input-text" type="number" name="substituicoes_um" max="3"/> <br><br>
                Quantidade de substituições do país 2 (máximo 3): <input class="input-text" type="number" name="substituicoes_dois" max="3"/> <br><br>
                Público: <input class="input-text" type="number" name="publico"/> <br><br>
                <input type="submit" name="submit" id="submit" class="btn" value="Continuar"/>
                <input type="reset" class="btn" value="Redefinir"/>
                <a href="../../bottons-paises.html"><input type="button" class="btn" value="Voltar"/></a>
        </form>
    </body>
</html>