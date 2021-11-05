<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Inserir País</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link rel="icon" href="../../assets/fifa_icon.png">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
        <style>
            body{
                font-family: 'Montserrat', sans-serif;
                background-image: url('../../assets/backgorund.png');
                width: 98%;
                height:auto;
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
        @media screen and (max-width: 600px){
            body{
                width: auto;
            }
            h1{
                font-size: 200%;
                margin-left: 6%;
                margin-right:6%;
            }
            input{
                inline-size: 86%;
            }
            form{
                margin-top:20%;
            }
        }
        </style>
    </head>
    <body>
        <h1>Formulário para inserir dados do país</h1>
        <form name="estadio" action="../../php/pais/inserir_pais.php" method="post">
                ID: <input class="input-text" type="number" name="id"/> <br><br>
                Nome: <input class="input-text" type="text" name="nome"/> <br><br>
                Continente: <select name="continente">
                    <option value="África">África</option>
                    <option value="América">América</option>
                    <option value="Ásia">Ásia</option>
                    <option value="Europa">Europa</option>
                    <option value="Oceania">Oceania</option>
                </select> <br><br>
                Técnico: <input class="input-text" type="text" name="tecnico"/> <br><br>
                Grupo: <select name="grupo">
                        <?php
                            include "../../php/conecta_banco.php";
                            $query = mysqli_query($conexao, "SELECT idgrupo, descricao FROM grupo");
                            while($dados = mysqli_fetch_assoc($query))
                            {
                                echo "<option value='".$dados['idgrupo']."'>".$dados['descricao']."</option>";
                            }
                        ?>
                </select> <br><br>
                <input type="submit" class="btn" value="Enviar"/>
                <input type="reset" class="btn" value="Redefinir"/>
        </form>
    </body>
</html>