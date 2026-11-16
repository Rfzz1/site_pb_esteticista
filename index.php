<?php
session_start();
include 'conexao.php';


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/tabela.css">
    <link rel="stylesheet" href="css/cabecalho.css">
    <link rel="stylesheet" href="css/modal.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Clarity+City:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <title>Priscila Bressan - Esteticista</title>
</head>
<body>

<!-- CABECALHO -->

<?php 
    if(isset($_SESSION['usuario_id'])) {
        include "cabecalho.php";
    }
?>

<!-- CONTAINER GLOBAL INDEX -->
<section class="container-global">


    <!-- CONTAINER LATERAL -->

    <section class="container-lateral">
        <div class="logo">
            <p>
                <span><img src="img/logo-bolinha.svg" alt="Logo" width="50" height="50"></span>    
                <span class="texto-logo">Priscila Bressan</span>
            </p>
        </div>
        <section class="texto-pg-inicial">
            <h1 class="titulo-pg-inicial">Respeite sua Identidade</h1>
            <p class="subtitulo-pg-inicial">Gerenciamento de Clientes e Finanças</p>
        </section>
        <p class="texto-inferior">Priscila Bressan - Esteticista</p>
    </section>

    <!-- LOGIN -->

    <?php if (!isset($_SESSION['usuario_id'])): ?>

        <section class="container-modal">

            <section class = "modal" id="login">

                <h2 class="titulo-modal">ENTRAR</h2>

                <section class = "modal-overlay">

                    <form action="login.php" method="post">
                        <!-- Campos do formulário -->

                        <label for="email">Email</label><br>
                        <input type="email" id="email" name="email" placeholder="E-mail" required>
                        <br><br>
                        <label for="senha">Senha</label><br>
                        <input type="password" id="senha" name="senha" placeholder="Senha" required>
                        <br><br>
                        <section class="container-mensagens">
                            <?php if(isset($_SESSION['mensagem'])): ?>

                                <p class="texto-mensagem"> <?php echo $_SESSION['mensagem'] ?> </p>
                                <?php unset($_SESSION['mensagem']) ?>

                            <?php endif ?>
                        </section>
                        <input class="submit" type="submit" value="LOGIN">
                        <section class="container-links">
                            <p>Não possui uma conta? <a href="modal_cadastro.php">Criar Conta</a></p>
                        </section>
                    </form>

                </section>

            </section>

        </section>

    <?php else: ?>

        <h1>LOGADO</h1>

        <h3>Faça Logout: <a href="logout.php">Sair</a></h3>

    <?php endif ?>

</section>

<!-- RODAPÉ -->

<footer>
</footer>
    
</body>
</html>