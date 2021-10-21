<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Alterar País</title>
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
        </style>
    </head>
    <body>
        <h1>Formulário para alterar dados do país</h1>
        <form name="estadio" action="../../php/pais/alterar_pais.php" method="post">
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
                            $query = mysqli_query($conexao, "SELECT descricao FROM grupo");
                            while($dados = mysqli_fetch_assoc($query))
                            {
                                echo "<option value='".$dados['idgrupo']."'>".$dados['descricao']."</option>";
                            }
                        ?>
                </select> <br><br>
                <input type="submit" class="btn" value="Alterar"/>
                <input type="reset" class="btn" value="Redefinir"/>
        </form>
    </body>
</html>