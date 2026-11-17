<?php 
session_start();
include 'conexao.php';

$sql = $conexao -> prepare("SELECT * FROM tb_usuarios");
$sql -> execute();

$resultado = $sql -> get_result();
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
    <link rel="stylesheet" href="css/gerenciar_clientes.css">

    <link rel="icon" href="img/favicon.ico" sizes="any">
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon-32.png">
    <link rel="apple-touch-icon" href="img/apple-touch-icon.png">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Clarity+City:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <title>Clientes - Priscila Bressan</title>
</head>
<body>


<!-- CABECALHO -->

<section class="cabecalho-conteudo">

    <?php 

        if(isset($_SESSION['usuario_id'])) {
            include "cabecalho.php";
        }
    ?>

    <!-- TABELA -->

    <?php 
    //Para cada cliente, exibir em uma tabela: Nome, primeiros 6 dígitos do CPF, Email, Telefone, Próximo Atendimentos
    //Botao de Editar
    //Botao de Excluir com confirmação

    ?>

    <section class="conteudo-global">

        <section class="linha-titulo">
            <h1 class="titulo">Clientes</h1>
            <button class="cadastro-cliente-button" onclick="location.href='modal_cadastro_cliente.php'">Cadastrar Cliente</button>
        </section>

        <section class="container-tabela">

            <table>
                <thead>
                <tr>
                    <th>CLIENTE</th>
                    <th>TELEFONE</th>
                    <th>EMAIL</th>
                    <th>CPF</th>
                    <th>PRÓXIMO ATENDIMENTO</th>
                </tr>
                </thead>
                <tbody>
                    <?php while ($cliente = $resultado -> fetch_assoc()): ?>

                        <tr>
                            <td><?php echo htmlspecialchars(trim($cliente['nome']) ?? "")?></td>
                            <td><?php echo htmlspecialchars(trim($cliente['telefone']) ?? "")?></td>
                            <td><?php echo htmlspecialchars(trim($cliente['email']) ?? "")?></td>
                            <td><?php echo htmlspecialchars(trim($cliente['cpf']) ?? "")?></td>
                            <td></td>
                        </tr>

                    <?php endwhile; ?>
                </tbody>
            </table>

        </section>

    </section>

</section>
    
</body>
</html>