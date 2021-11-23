<?php
    // Começa/reinicia a seção
    session_start();

    // Se a variável de seção usuário não existir, reinicie a página
    if(!isset($_SESSION['usuario'])) echo '<script type="text/JavaScript"> location.reload(); </script>';

    // Se a variável de seção usuário retornar FALSE (não possui nenhum valor armazenado)
    if(!$_SESSION['usuario']) {
        $_SESSION['usuario'] = "Visitante"; // Coloca o usuário atual como visitante
        exit(); // Termina o script atual
    }
    include "php/conecta_banco.php"; // Inclui a conexão do banco
?>
<html lang="pt-br"> <!-- Muda a linguagem da webpage para português -->
<!-- Configuração do HEAD -->
<head>
    <meta charset="UTF-8"> <!-- Definição de caracteres -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- Configuração do HTTP -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Configuração para responsividade -->
    <title>FIFA 22</title> <!-- Titulo da página -->
    <link rel="stylesheet" href="./css/style.css"> <!-- Arquivo CSS -->
    <script src="./js/script.js"></script>
    <!-- Fontes utilizadas na home -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Geo&display=swap" rel="stylesheet">
    <link rel="icon" href="./assets/icon.png"> <!-- Ícone da aba do navegador -->
</head>
<body>
    <!-- JQuery no rolamento das páginas -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
    $(document).ready(function(){
    // Adicionar movimento suave a todos os componentes
    $("a").on('click', function(event) {

        // Verificar se this.hash tem valor
        if (this.hash !== "") {
        // Evento padrão do JQuery
        event.preventDefault();

        // Guardar hash
        var hash = this.hash;

        // jQuery animate()
        $('html, body').animate({
            scrollTop: $(hash).offset().top
        }, 800, function(){

            // Adicionar # ao acessar a tag
            window.location.hash = hash;
        });
        }
    });
    });
    </script>
    <!-- Header da página -->
    <header class="menu-top">
        <div class="header-1" id= "myHeader">
            <div class="logo">
                <img src="./assets/fifa_logo.jpg" alt="LOGO FIFA"> <!-- Logotipo -->
            </div>
               <nav class="menu-bar">
                   <ul>
                       <li>
                            <a href="#sobre"> <!-- ir para tag sobre -->
                                Sobre
                            </a>
                       </li>
                       <li>
                            <a href="#categorias"> <!-- ir para tag categorias -->
                                Categorias
                            </a>
                       </li>
                   </ul>
               </nav>
               <!-- div do ícone de perfil -->
               <div class="action">
                    <div class="profile" onclick = "menuToggle();"> <!-- Ativar menu quando clicar na DIV -->
                        <?php
                            if($_SESSION['usuario'] == "Visitante") // Se o usuário for um visitante
                                echo "<img src='./assets/profile.png'>"; // Exibe imagem padrão de visitante
                            else { // Se o usuário não for um visitante
                                // Executa a query SQL e pega o valor
                                $select = "SELECT foto FROM usuario WHERE nome_usuario = '".$_SESSION['usuario']."';";
                                $result = mysqli_query($conexao, $select) or die("Erro ao acessar perfil.");
                                $row = mysqli_fetch_array($result);

                                $r = $row['foto'];
                                if($r != NULL) // Se o perfil tem foto
                                    echo "<img id='perfil' src='photos/".$r."'>"; // Exibe foto
                                else // Se o perfil não tem foto
                                    echo "<img src='./assets/profile.png'>"; // Exibe foto padrão
                            }
                        ?>
                    </div>
                    <div class="menu">
                        <ul>
                            <!-- Exibe o nome da atual seção do usuário -->
                            <li><img src="./assets/002-gear.png" alt=""><a href="perfil.php"> Olá, <?php echo $_SESSION['usuario']; ?>! </a></li>
                            <li>
                                <?php
                                    // Se o usuário for visitante
                                    if($_SESSION['usuario'] == "Visitante") {
                                        // Disponibilizar login
                                        echo "<img src='./assets/login.png' alt=''>";
                                        echo "<a href='forms/login/login.html'> Login </a>";
                                    }
                                    else { // Se o usuário não for visitante
                                        // Disponibilizar logout
                                        echo "<img src='./assets/logout.png' alt=''>";
                                        echo "<a href='php/login/logout.php'> Sair </a>";
                                    }
                                ?>
                            </li>
                            <?php
                                // Se o usuário for visitante
                                if($_SESSION['usuario'] == "Visitante") {
                                    // Disponibilizar cadastro
                                    echo "<li><img src='./assets/cadastro.png' alt=''>";
                                    echo "<a href='forms/cadastro/cadastro.html'> Cadastrar </a></li>";
                                }
                            ?>
                        </ul>
                    </div>
               </div>
        </div>
    </header>
    <section>
        <!-- Sobre o site -->
        <article class="about">
            <div class="img_back">
                <img src="./assets/background.png" alt="imagem de fundo" width="100%">
            </div>
            <div class="title" id="sobre">
                <h1>Sobre</h1>
            </div>
            <div class="description">
                <h3>
                    Somos uma empresa contratada pela Fifa onde vamos ajudar o usuário a organizar partidas e o próprio campeonato.<br>
                    Temos o propósito de otimizar o tempo e concluir da melhor forma suas atividades básicas.<br>
                    Esse site, te mostrará partidas, gerenciamento de equipes e também resultados.<br>
                </h3>
            </div>
        </article>
        <article class="control">
            <div class="title2">
                <h1>Sobre as partidas!</h1>
            </div>
            <div class="description"id="categorias">
                <h3>
                    Nesta área há todos os jogos, jogadores e times que estão disputando o campeonato!<br>
                </h3>
            </div>
        </article>
        <article class="bottons"> <!--Conteúdo: Botões-->
            <div class="paises">
                <?php
                    // Se o usuário não for admin e visitante
                    if($_SESSION['usuario'] != "Visitante" && $_SESSION['usuario'] != "admin")
                        echo "<a href='php/pais/listar_pais.php'>"; // Abrir tela de opção de listar
                    else if($_SESSION['usuario'] == "admin") // Se o usuário for admin
                        echo "<a href='bottons-paises.html'>"; // Abrir tela de opção de CRUD
                    else // Se o usuário for visitante
                        echo "<a href='permissao.html'>"; // Abrir tela de permissão
                ?>
                    <img src="./assets/paises-btn.png" alt="" width="320px" class="image">
                </a>
            </div>
            <div class="estadio">
                <?php
                    // Se o usuário não for admin e visitante
                    if($_SESSION['usuario'] != "Visitante" && $_SESSION['usuario'] != "admin")
                        echo "<a href='php/estadio/listar_estadio.php'>"; // Abrir tela de opção de listar
                    else if($_SESSION['usuario'] == "admin") // Se o usuário for admin
                        echo "<a href='bottons-estadios.html'>"; // Abrir tela de opção de CRUD
                    else // Se o usuário for visitante
                        echo "<a href='permissao.html'>"; // Abrir tela de permissão 
                ?>
                    <img src="./assets/estadio-btn.png" alt="" width="320px" class="image">
                </a>
            </div>
            <?php if($_SESSION['usuario'] == "admin"): // Se o usuário for admin, habilitar botão CRUD de grupos?>
                <div class="grupo">
                    <a href='bottons-grupos.html'>
                        <img src="./assets/grupo-btn.png" alt="" width="320px" class="image">
                    </a>             
                </div>
            <?php endif; ?>
        </article>
        <article class="btn-down">
            <div class="jogadores">
                <?php
                    // Se o usuário não for admin e visitante
                    if($_SESSION['usuario'] != "Visitante" && $_SESSION['usuario'] != "admin")
                        echo "<a href='php/jogador/listar_jogador.php'>"; // Abrir tela de opção de listar
                    else if($_SESSION['usuario'] == "admin") // Se o usuário for admin
                        echo "<a href='bottons-jogadores.html'>"; // Abrir tela de opção de CRUD
                    else // Se o usuário for visitante
                        echo "<a href='permissao.html'>"; // Abrir tela de permissão  
                ?>
                    <img src="./assets/jogadores-btn.png" alt="" width="320px" class="image">
                </a>
            </div>
            <div class="jogos">
                <?php
                    // Se o usuário não for admin e visitante
                    if($_SESSION['usuario'] != "Visitante" && $_SESSION['usuario'] != "admin")
                        echo "<a href='php/jogo/listar_jogo.php'>"; // Abrir tela de opção de listar
                    else if($_SESSION['usuario'] == "admin") // Se o usuário for admin
                        echo "<a href='bottons-jogos.html'>"; // Abrir tela de opção de CRUD
                    else // Se o usuário for visitante
                        echo "<a href='permissao.html'>"; // Abrir tela de permissão  
                ?>
                    <img src="./assets/jogos-btn.png" alt="" width="320px" class="image">
                </a>
            </div>
            <?php if($_SESSION['usuario'] == "admin"): // Se o usuário for admin, habilitar botão CRUD de usuarios?>
                <div class="usuario">
                    <a href='bottons-usuarios.html'>
                        <img src="./assets/usuarios.png" alt="" width="320px" class="image">
                    </a>             
                </div>
            <?php endif; ?>
        </article>
        <div class="obs">
            <h3>
                A FIFA pretende armazenar todas as informações dos jogos, tais como jogadores escalados, reservas,
                substituições, cartões aplicados,<br> estádio, público presente e resultados.
            </h3>
        </div>
    </section>
    <!-- Footer -->
    <footer class="footer-distributed">
        <div class="footer-left">
            <img src="./assets/Logo_footer.png" width="12%">
                  <h3>Copa <span> FIFA 22</span></h3>
                  <p class="footer-links">
					<a href="#">Início</a>
					|
					<a href="#sobre">Sobre</a>
					|
					<a href="#categorias">Categorias</a>
					|
					<a>Contato</a>
				</p> 

				<p class="footer-company-name">© 2021 doT. Inc</p>
			</div>
            
			<div class="footer-right">
                <!-- Sobre a empresa -->
				<p class="footer-company-about">
					<span>Sobre a empresa</span>
					A doT. acredita que a criatividade capacita a transformação, pessoalmente e profissionalmente em todos os setores. Além de oferecermos resultados financeiros sólidos, também estamos impulsionando uma inovação incrível, acumulando vários de novos clientes, oferecendo bilhões de experiências em várias telas com os nossos softwares.
                    </p>
                <!-- Redes Sociais -->
				<div class="footer-icons">
					<a href="https://www.facebook.com"><img src="./assets/facebook.png"><i class="fa fa-facebook"></i></a>
					<a href="https://twitter.com/?lang=pt"><img src="./assets/twitter.png"><i class="fa fa-twitter"></i></a>
					<a href="https://www.instagram.com"><img src="./assets/instagram.png"><i class="fa fa-instagram"></i></a>
					<a href="https://www.linkedin.com/company/dot-inc."><img src="./assets/linkedin.png"><i class="fa fa-linkedin"></i></a>
				</div> 
			</div>
		</footer>
    </footer>
</body>
</html>