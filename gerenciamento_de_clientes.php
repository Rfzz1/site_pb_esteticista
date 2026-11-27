<?php 
session_start();
include 'conexao.php';
include 'funcoes.php';

$sql = $conexao -> prepare("SELECT * FROM tb_usuarios");
$sql -> execute();

$resultado = $sql -> get_result();

$sqlBuscarUsuariosCadastrados = $conexao -> prepare("SELECT COUNT(*) AS clientes FROM tb_usuarios");
$sqlBuscarUsuariosCadastrados -> execute();

$clientesTotal = $sqlBuscarUsuariosCadastrados -> get_result();

if ($clientesTotal) {
    $numero = $clientesTotal -> fetch_assoc();
} else {
    die ("Não encontrado");
}

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
    <link rel="stylesheet" href="css/painel_clientes.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

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

    <section class="conteudo-global">

        <section class="linha-titulo">

            <section>
                <h1 class="titulo">Clientes</h1>
                <p class="subtitulo-clientes"><?php echo htmlspecialchars(trim($numero['clientes']) ?? "") ?> Clientes Cadastrados</p>
            </section>

            <button type="button" id="abrir-modal-cliente" class="cadastro-cliente-button">
                <i class="bi bi-person-plus"></i>
                Cadastrar Cliente
            </button>
        </section>

        <section class="container-tabela">

            <table>
                <thead>
                <tr>
                    <th>CLIENTE</th>
                    <th>TELEFONE</th>
                    <th>CPF</th>
                    <th>PRÓXIMO ATENDIMENTO</th>
                </tr>
                </thead>
                <tbody>
                    <?php while ($cliente = $resultado -> fetch_assoc()): ?>

                        <tr class="linha-cliente" data-id="<?php echo (int) $cliente['id'] ?>">
                            <td>
                                <p><?php echo htmlspecialchars(trim($cliente['nome']) ?? "")?></p>
                                <p class="email-cliente"><?php echo htmlspecialchars(trim($cliente['email']) ?? "")?></p>
                            </td>
                            <td><p><?php echo htmlspecialchars(formatarTelefone($cliente['telefone']))?></p></td>
                            <td><p><?php echo htmlspecialchars(trim($cliente['cpf']) ?? "")?></p></td>
                            <td></td>
                        </tr>

                    <?php endwhile; ?>
                </tbody>
            </table>

        </section>

    </section>

</section>

<?php include 'painel_cliente.php'; ?>
<?php include 'modal_cliente.php'; ?>
<?php include 'modal_atendimento.php'; ?>
<script src="js/modal.js" defer></script>
<script src="js/script_cliente.js" defer></script>
<script src="js/script_mascaras.js" defer></script>
</body>
</html>