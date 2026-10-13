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

    <section class="container-tabela">

        <table class="tarefas-tabela">
            <tr>
                <th>Nome</th>
                <th>Descricao</th>
                <th>Tempo</th>
                <th></th>
                <th></th>
            </tr>

            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td class="botoes"><button class="editar" onclick="location.href='action.php'">EDITAR</button></td>
                <td class="botoes"><button class="excluir" onclick="location.href='action.php'">EXCLUIR</button></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td class="botoes"><button class="adicionar" onclick="location.href='action.php'">ADICIONAR</button></td>
            </tr>
        </table>

    </section>


<?php else: ?>


<?php endif ?>

<!-- RODAPÉ -->

<footer>
</footer>
    
</body>
</html>