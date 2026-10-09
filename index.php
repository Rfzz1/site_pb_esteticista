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
    <link rel="stylesheet" href="css/modal.css">
    <link rel="stylesheet" href="css/cabecalho.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Clarity+City:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <title>Priscila Bressan - Esteticista</title>
</head>
<body>

<!-- CABEÇALHO -->
<header>

</header>

<!-- CONTEÚDO PRINCIPAL -->

<!-- CADASTRO -->

<section class="container">

    <section class="modal" id="cadastro">

        <h2 class="titulo-modal">CRIAR CONTA</h2>

        <section class = "modal-overlay">

            <form action="action.php" method="post">
                <!-- Campos do formulário -->
                <label for="nome">Nome Completo</label><br>
                <input type="text" id="nome" name="nome" placeholder="Nome Completo" required>
                <br><br>
                <label for="cpf">CPF</label><br>
                <input type="text" id="cpf" name="cpf" placeholder="___.___.___-__" required>
                <br><br>
                <label for="email">Email</label><br>
                <input type="email" id="email" name="email" placeholder="E-mail" required>
                <br><br>
                <label for="telefone">Telefone</label><br>
                <input type="tel" id="telefone" name="telefone" placeholder="(00) 0 0000-0000" required>
                <br><br>
                <label for="nascimento">Nascimento</label><br>
                <input type="date" id="nascimento" name="nascimento" required>
                <br><br>
                <label for="senha">Senha</label><br>
                <input type="password" id="senha" name="senha" placeholder="Senha" required>
                <br><br>
                <input class="submit" type="submit" value="CADASTRAR">
            </form>

        </section>

    </section>

</section>

<!-- LOGIN -->

<?php if (!isset($_SESSION['usuario_id'])): ?>

    <section class="container">

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
                    <input class="submit" type="submit" value="LOGIN">
                </form>

            </section>

        </section>

    </section>

<?php else: ?>

    <h1>LOGADO</h1>

    <h3>Faça Logout: <a href="logout.php">Sair</a></h3>

<?php endif ?>

<!-- RODAPÉ -->

<footer>
</footer>
    
</body>
</html>