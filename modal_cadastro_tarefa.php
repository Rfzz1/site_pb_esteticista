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
    <link rel="stylesheet" href="css/modal.css">
    <link rel="stylesheet" href="css/cabecalho.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Clarity+City:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <title>Priscila Bressan - Esteticista</title>
</head>
<body>

<!-- CABEÇALHO -->
<?php
include 'cabecalho.php';
?>

<!-- CONTEÚDO PRINCIPAL -->

<!-- CADASTRO -->

<section class="container">

    <section class="modal">

        <h2 class="titulo-modal">CADASTRAR TAREFA</h2>

        <section class = "modal-overlay">

            <form action="action.php" method="post">
                <!-- Campos do formulário -->
                <label for="nome">Título</label><br>
                <input type="text" id="nome" name="nome" placeholder="Título" required>
                <br><br>
                <label for="descricao">Descricao</label><br>
                <input type="text" id="descricao" name="descricao" placeholder="Descreva a tarefa" required>
                <br><br>
                <label for="expiracao">Data de Expiração</label><br>
                <input type="date" id="expiracao" name="expiracao" placeholder="Data de Expiração" required>
                <br><br>
                <input type="hidden" id="id" name="id" value="<?php echo htmlspecialchars($_SESSION['usuario_id']) ?>">
                <input class="submit" type="submit" value="CADASTRAR" name="tarefa">
                <section class="container-links">
                        <p>Voltar para Tarefas? <a href="cadastro_atividades.php">Voltar</a></p>
                </section>
            </form>

        </section>

    </section>

</section>

<!-- RODAPÉ -->

<footer>
</footer>
    
</body>
</html>