<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Inserir Jogo</title>
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
        <h1>Formulário para inserir jogo</h1>
        <form action="form_inserir_jogo_estatisticas.php" method="post">
                ID: <input class="input-text" type="number" name="id"/> <br><br>
                Dia e Hora: <input type="datetime-local" name="data"/> <br><br>
                Estadio: <select name="estadio">
                        <?php
                            include "../../php/conecta_banco.php";
                            $query = mysqli_query($conexao, "SELECT descricao FROM estadio ORDER BY descricao ASC");
                            while($dados = mysqli_fetch_assoc($query))
                            {
                                echo "<option value='".$dados['idestadio']."'>".$dados['descricao']."</option>";
                            }
                        ?>
                </select> <br><br>
                País 1: <select name="pais_um">
                        <?php
                            include "../../php/conecta_banco.php";
                            $query = mysqli_query($conexao, "SELECT selecao FROM pais ORDER BY selecao ASC");
                            while($dados = mysqli_fetch_assoc($query))
                            {
                                echo "<option value='".$dados['pais']."'>".$dados['selecao']."</option>";
                            }
                        ?>
                </select> <br><br>
                País 2: <select name="pais_dois">
                        <?php
                            include "../../php/conecta_banco.php";
                            $query = mysqli_query($conexao, "SELECT selecao FROM pais ORDER BY selecao ASC");
                            while($dados = mysqli_fetch_assoc($query))
                            {
                                echo "<option value='".$dados['pais']."'>".$dados['selecao']."</option>";
                            }
                        ?>
                </select> <br><br>
                Quantidade de gols do país 1: <input class="input-text" type="number" name="gols_um"/> <br><br>
                Quantidade de gols do país 2: <input class="input-text" type="number" name="gols_dois"/> <br><br>
                Quantidade de cartões amarelos: <input class="input-text" type="number" name="amarelo"/> <br><br>
                Quantidade de cartões vermelhos: <input class="input-text" type="number" name="vermelhos"/> <br><br>
                Quantidade de substituições (máximo 6): <input class="input-text" type="number" name="substituições" max="6"/> <br><br>
                Público: <input class="input-text" type="number" name="publico"/> <br><br>
                <input type="submit" class="btn" value="Continuar"/>
                <input type="reset" class="btn" value="Redefinir"/>      
        </form>
    </body>
</html>