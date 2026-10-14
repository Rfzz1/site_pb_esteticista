<?php
session_start();
include 'conexao.php';

$id_usuario = $_SESSION['usuario_id'];

$sqlBuscaTarefa = $conexao -> prepare("SELECT * FROM tb_tarefas WHERE id_usuario = ?");
$sqlBuscaTarefa -> bind_param("i", $id_usuario);
$sqlBuscaTarefa -> execute();

$resultado = $sqlBuscaTarefa -> get_result();

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

        <h2 class="titulo">CADASTRO DE TAREFAS</h2>

        <table class="tarefas-tabela">
            <tr>
                <th>Nome</th>
                <th>Descricao</th>
                <th>Expira em</th>
                <th></th>
            </tr>

            <?php while($tarefa = $resultado -> fetch_assoc()): ?>

                <tr>
                    <td><?php echo htmlspecialchars(trim($tarefa['nome']) ?? "") ?></td>
                    <td><?php echo htmlspecialchars(trim($tarefa['descricao']) ?? "") ?></td>
                    <td><?php echo htmlspecialchars(trim($tarefa['tempo']) ?? "") ?></td>
                    <td>
                        <section class="botoes">
                            <button class="editar" onclick="location.href='modal_editar_tarefa.php'">EDITAR</button>

                            <form action="action.php" method="POST">
                                <input type="hidden" id='id' name='id' value="<?php echo htmlspecialchars($tarefa['id']) ?>">
                                <button class="excluir" name='excluir_tarefa' onclick="location.href='action.php'">EXCLUIR</button>
                            </form>

                        </section>
                    </td>
                </tr>

            <?php endwhile ?>

            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td>
                    <section class="botoes">
                        <button class="adicionar" onclick="location.href='modal_cadastro_tarefa.php'">ADICIONAR</button>
                    </section>
                </td>
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