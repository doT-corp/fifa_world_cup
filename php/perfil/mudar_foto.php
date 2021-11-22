<?php
    session_start();
    include "../conecta_banco.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
        #perfil {
            width: 10%;
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
    <?php
    

    if(isset($_POST['alterar'])) {
        $nome_arquivo = '';
        $confirm = 0;
        if($_FILES['foto']['type'] == 'image/png' && isset($_FILES['foto'])) {
            $nome_arquivo = md5($_FILES['foto']['name'].rand(1,999)).'.png';
            move_uploaded_file($_FILES['foto']['tmp_name'], '../../photos/'.$nome_arquivo);
            $confirm = 1;
        }
        else if($_FILES['foto']['type'] == 'image/jpeg' && isset($_FILES['foto'])) {
            $nome_arquivo = md5($_FILES['foto']['name'].rand(1,999)).'.jpg';
            move_uploaded_file($_FILES['foto']['tmp_name'], '../../photos/'.$nome_arquivo);  
            $confirm = 1;
        }
        else
            echo "Imagem inválida! Envie por outra forma de arquivo!";

        if($confirm == 1) {
            $select = "SELECT foto FROM usuario WHERE nome_usuario = '".$_SESSION['usuario']."';";
            $result = mysqli_query($conexao, $select) or die("Erro.");
            $row = mysqli_fetch_array($result);
            $file = $row['foto'];
            if($file != NULL) {
                $file_pointer = "../../photos/".$file;
                if (!unlink($file_pointer))
                    echo ("Erro ao alterar imagem de perfil"); 
                else {
                    echo "Imagem de perfil enviada com sucesso!";
                    $query = "UPDATE usuario SET foto = '".$nome_arquivo."' WHERE nome_usuario = '".$_SESSION['usuario']."';";
                    $result = mysqli_query($conexao, $query);
                }
            }
            else {
                echo "Imagem de perfil enviada com sucesso!";
                $query = "UPDATE usuario SET foto = '".$nome_arquivo."' WHERE nome_usuario = '".$_SESSION['usuario']."';";
                $result = mysqli_query($conexao, $query);    
            }
        }
    }
    else {
        $select = "SELECT foto FROM usuario WHERE nome_usuario = '".$_SESSION['usuario']."';";
        $result = mysqli_query($conexao, $select) or die("Erro.");
        $row = mysqli_fetch_array($result);
        $file = $row['foto'];
        $file_pointer = "../../photos/".$file;
        if (!unlink($file_pointer))
            echo ("Erro ao deletar imagem de perfil."); 
        else {
            echo ("A imagem de perfil foi deletada.");
            $query = "UPDATE usuario SET foto = null WHERE nome_usuario = '".$_SESSION['usuario']."';";
            $result = mysqli_query($conexao, $query) or die("Erro");
        }
    }
?>
<br>
<a href="../../perfil.php"><button>Voltar</button></a>
</body>
</html>
