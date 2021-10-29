<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Inserir Jogador</title>
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
        <h1>Formulário para inserir dados do jogador</h1>
        <form name="estadio" action="../../php/jogador/inserir_jogador.php" method="post">
                ID: <input class="input-text" type="number" name="id"/> <br><br>
                Nome: <input class="input-text" type="text" name="nome"/> <br><br>
                Camisa: <input class="input-text" type="text" name="camisa"/> <br><br>
                Posição: <select name="posicao">
                    <option value="Atacante">Atacante</option>
                    <option value="Central">Central</option>
                    <option value="Goleiro">Goleiro</option>
                    <option value="Lateral Direito">Lateral Direito</option>
                    <option value="Lateral Esquerdo">Lateral Esquerdo</option>
                    <option value="Meio Campo">Meio Campo</option>
                </select> <br><br>
                País: <select name="idpais">
                        <?php
                            include "../../php/conecta_banco.php";
                            $query = mysqli_query($conexao, "SELECT idpais, selecao FROM pais");
                            while($dados = mysqli_fetch_array($query))
                            {
                                echo "<option value='".$dados['idpais']."'>".$dados['selecao']."</option>";
                            }
                        ?>
                </select><br><br>
                Situação: 
                <input type="radio" name="situacao" value="T"> Titular
                <input type="radio" name="situacao" value="R"> Reserva
                <br><br>
                <input type="submit" class="btn" value="Enviar"/>
                <input type="reset" class="btn" value="Redefinir"/>
        </form>
    </body>
</html>