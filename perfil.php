<?php
    // Reinicia a seção para a variável $_SESSION
    session_start();
    // Inclui a conexão do banco
    include "php/conecta_banco.php";
?>
<!DOCTYPE html>
    <html lang="pt-br"> <!-- Muda a linguagem da webpage para português -->
    <head>
        <!-- Configuração de HEAD da página-->
        <meta charset="UTF-8"> <!-- Definição de caracteres -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- Configuração do HTTP -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Configuração para responsividade -->
        <title>Perfil</title> <!-- Titulo da página -->
        <!-- Fontes utilizadas na home -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
        <link rel="icon" href="../../assets/fifa_icon.png"> <!-- Ícone da aba do navegador -->
        <!-- CSS -->
        <style>
    
    body{
        font-family: 'Montserrat', sans-serif;
        /*background-image: url('../../assets/backgorund.png');*/
        background-color: #171920;
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
    font-weight:200;
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
    .center{
        margin-top: 3%;
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
    .label-upload{
        
        inline-size: 86%;
    }
    input[type="file"]{
        inline-size: 86%;
    }
}
h3{
    font-weight: 700;
}
.center {
  margin-left: auto;
  margin-right: auto;
  margin-top: 3%;
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
button{
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
        button:hover{
            background-color: #284a99;
            transition: 0.2s;
        }
        img {
            width: 100%;
            max-width: 400px;
            height: auto;
            border-radius: 5%;
        }
        input[type="file"] {
            display:none;
        }
        .label-upload{
        margin-top:10%;
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
       .label-upload:hover{
            background-color: #284a99;
            transition: 0.2s;
        }
        
        
</style>
    </head>
    <body>
        <!-- Se o usuário estiver logado, exibe o perfil-->
        <?php if($_SESSION['usuario'] != "Visitante"): ?>
            <h1>Perfil</h1>
            <?php
                // Executa a query SQL e pega o valor
                $select = "SELECT foto FROM usuario WHERE nome_usuario = '".$_SESSION['usuario']."';";
                $result = mysqli_query($conexao, $select) or die("Erro ao acessar perfil.");
                $row = mysqli_fetch_array($result);
                $r = $row['foto'];
                if($r != NULL) // Se o usuário tiver foto de perfil / != NULL
                    echo "<img id='perfil' src='photos/".$r."'>"; // Mostra a foto
            ?>
            <h3>
                Nome Completo: 
                <?php
                    // Executa a query SQL e pega o valor
                    $select = "SELECT nome_completo FROM usuario WHERE nome_usuario = '".$_SESSION['usuario']."';";
                    $result = mysqli_query($conexao, $select) or die("Erro ao acessar perfil.");
                    $row = mysqli_fetch_array($result);
                    $r = $row['nome_completo'];
                    echo $r; // imprime na tela
                ?>
            </h3>
            <h3>
                Nome de Usuário: 
                <?php
                    echo $_SESSION['usuario']; // imprime na tela o nome de usuário de acordo com a seção
                ?>
            </h3>
            <h3>
                E-mail: 
                <?php
                    // Executa a query SQL e pega o valor
                    $select = "SELECT email FROM usuario WHERE nome_usuario = '".$_SESSION['usuario']."';";
                    $result = mysqli_query($conexao, $select) or die("Erro ao acessar perfil.");
                    $row = mysqli_fetch_array($result);
                    $r = $row['email'];
                    echo $r; // imprime na tela
                ?>
            </h3>
            <h3>
                Data e horário de cadastro: 
                <?php
                    // Executa a query SQL e pega o valor
                    $select = "SELECT data_registro FROM usuario WHERE nome_usuario = '".$_SESSION['usuario']."';";
                    $result = mysqli_query($conexao, $select) or die("Erro ao acessar perfil.");
                    $row = mysqli_fetch_array($result);
                    $r = $row['data_registro'];
                    echo $r; // imprime na tela
                ?>
            </h3>
            <!-- formulário para inserção de imagens -->
            <form method="POST" action="php/perfil/mudar_foto.php" enctype="multipart/form-data">
                <br><br>
                <label for="custom-file-input" class="label-upload">Procurar uma imagem   </label>
                <input id="custom-file-input" type="file" name="foto"><br>
                <br><br>
                <input type="submit" name="alterar" value="Alterar imagem">
                <?php
                    // Executa a query SQL e pega o valor
                    $select = "SELECT foto FROM usuario WHERE nome_usuario = '".$_SESSION['usuario']."';";
                    $result = mysqli_query($conexao, $select) or die("Erro ao acessar perfil.");
                    $row = mysqli_fetch_array($result);
                    $r = $row['foto'];
                    if($r != NULL) // Se o usuário tiver foto de perfil / != NULL
                        echo '<input type="submit" name="deletar" value="Deletar imagem">'; // Mostra a opção
                        
                ?>    
            </form><br>
            <a href="index.php">
                <input type="button" class="btn" value="Voltar"/>
            </a>
        <?php endif; ?>
        <!-- Se o usuário não estiver logado, mostrar mensagem de aviso -->
        <?php if($_SESSION['usuario'] == "Visitante"): ?>
            <h1>Ops!</h1>
            <h3>Para acessar o perfil, é necessário realizar login</h3>
            <a href="forms/login/login.html">
                <input type="button" class="btn" value="Login"/>
            </a>
            <a href="index.php">
                <input type="button" class="btn" value="Voltar"/>
            </a>
            <h3>Não possui conta? Cadastre-se!</h3>
            <a href="forms/cadastro/cadastro.html">
                <input type="button" class="btn" value="Cadastrar"/>
            </a>
        <?php endif; ?>
    </body>
</html>