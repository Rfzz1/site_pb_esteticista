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

<?php if(isset($_SESSION['usuario_id'])): ?>

    <?php 
    
    $sqlBuscarTodosUsers = $conexao -> prepare("SELECT * FROM tb_usuarios");
    $sqlBuscarTodosUsers -> execute();

    $resultado = $sqlBuscarTodosUsers -> get_result();

    ?>

    <section class="container-tabela">

        <h2 class="titulo">GERENCIAR USUÁRIOS</h2>

        <table>

            <thead>
                <tr>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>Email</th>
                    <th>Telefone</th>
                    <th>Nascimento</th>
                </tr>
            </thead>

            <tbody>
                <?php while($usuarios = $resultado -> fetch_assoc()): ?>
                <tr>
                    <td><?php echo htmlspecialchars(trim($usuarios['nome']) ?? "") ?></td>
                    <td><?php echo htmlspecialchars(trim($usuarios['cpf']) ?? "") ?></td>
                    <td><?php echo htmlspecialchars(trim($usuarios['email']) ?? "") ?></td>
                    <td><?php echo htmlspecialchars(trim($usuarios['telefone']) ?? "") ?></td>
                    <td><?php echo htmlspecialchars(trim($usuarios['nascimento']) ?? "") ?></td>
                </tr>
            </tbody>

            <?php endwhile; ?>

        </table>

    </section>


<?php else: ?>


<?php endif ?>

<!-- RODAPÉ -->

<footer>
</footer>
    
</body>
</html>