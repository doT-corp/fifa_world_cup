<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Alterar Grupo</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link rel="icon" href="../../assets/fifa_icon.png">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
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
        <h1>Formulário para alterar dados do estádio</h1>
        <form name="estadio" action="../../php/grupo/alterar_grupo.php" method="post">
                ID: <?php
                        $myid = $_POST['id'];
                        echo $myid;
                    ?><br><br>
                Descrição Antiga:
                <?php
                    include "../../php/conecta_banco.php";
                    $query = mysqli_query($conexao, "SELECT descricao FROM grupo WHERE idgrupo = '$myid';");
                    $row = mysqli_fetch_array($query);
                    echo $row['descricao'];
                ?><br>                
                Descrição Nova (máximo 3 caracteres): <input class="input-text" type="text" name="descricao" max="3"/> <br><br>
                <?php
                    echo "<input type='text' value='{$myid}' name='id' style='display: none'/>";
                ?>
                <input type="submit" class="btn" value="Alterar"/>
                <input type="reset" class="btn" value="Redefinir"/>
                <a href="../../bottons-grupos.html"><input type="button" class="btn" value="Voltar"/></a>
        </form>
    </body>
</html>