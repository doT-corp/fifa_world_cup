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
        <form name="estadio" action="../../php/jogo/inserir_jogo.php" method="post">
                ID: <input class="input-text" type="number" name="id"/> <br><br>
                Dia: <input type="date" name="data"/> <br><br>
                Hora: <input type="time" name="hora"/> <br><br>
                Estadio: <select name="estadio">
                        <?php
                            include "../../php/conecta_banco.php";
                            $query = mysqli_query($conexao, "SELECT descricao FROM estadio");
                            while($dados = mysqli_fetch_assoc($query))
                            {
                                echo "<option value='".$dados['idestadio']."'>".$dados['descricao']."</option>";
                            }
                        ?>
                </select> <br><br>
                País 1: <select name="pais_um">
                        <?php
                            include "../../php/conecta_banco.php";
                            $query = mysqli_query($conexao, "SELECT selecao FROM pais");
                            while($dados = mysqli_fetch_assoc($query))
                            {
                                echo "<option value='".$dados['pais']."'>".$dados['selecao']."</option>";
                            }
                        ?>
                </select> <br><br>
                País 2: <select name="pais_dois">
                        <?php
                            include "../../php/conecta_banco.php";
                            $query = mysqli_query($conexao, "SELECT selecao FROM pais");
                            while($dados = mysqli_fetch_assoc($query))
                            {
                                echo "<option value='".$dados['pais']."'>".$dados['selecao']."</option>";
                            }
                        ?>
                </select> <br><br>
                Gols País 1: <input class="input-text" onkeyup="inputBox('gols_pais_um', 'qtd_gols_um', 'goal_one_');" type="number" name="gols_pais_um" id="gols_pais_um"/> <br><br>
                <div id="qtd_gols_um"></div>
                Gols País 2: <input class="input-text" onkeyup="inputBox('gols_pais_dois', 'qtd_gols_dois', 'goal_two_');" type="number" name="gols_pais_dois" id="gols_pais_dois"/> <br><br>
                <div id="qtd_gols_dois"></div>
                Cartão:
                Público: <input class="input-text" type="number" name="publico"/> <br><br>
                <input type="submit" class="btn" value="Enviar"/>
                <input type="reset" class="btn" value="Redefinir"/>      
        </form>
        <script type="text/javascript">
                function inputBox(inputClass, container, name) {
                    var count = document.getElementById(inputClass).value;
                    var container = document.getElementById(container);
                    var myhtml = '';
                    while(count--) {
                        myhtml += "
                        <input type='number' name='"+ name + count + "'><br><input type='number' name='time_"+ name + count + "'><br><br>";
                    }
                    container.innerHTML = myhtml;
                    //console.log(myhtml);
                }
        </script>
    </body>
</html>