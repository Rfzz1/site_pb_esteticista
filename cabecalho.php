<?php
// Nome do arquivo da página atual. Ex: "gerenciamento_de_clientes.php"
$paginaAtual = basename($_SERVER['PHP_SELF']);

// Função pequena: devolve " ativo" se o link é da página atual
function ativo($pagina, $paginaAtual) {
    return $pagina === $paginaAtual ? ' ativo' : '';
}
?>

<header>

    <nav class="nav-cabecalho">

        <section class="container-botoes">

             <?php if(!isset($_SESSION['usuario_id'])): ?>
                <a class="botao-menu" href='modal_login.php'>
                    Sign in
                </a>
            <?php else: ?>
            
                <section class="logo">
                    <p>
                        <span><img src="img/logo-bolinha.svg" alt="Logo" width="50" height="50" onclick="location.href=''"></span>    
                        <span class="texto-logo" onclick="location.href=''">Priscila Bressan</span>
                    </p>
                </section>

                <section class="navegacao">

                    <a class="botao-menu<?= ativo('', $paginaAtual) ?>" href="">
                        <i class="bi bi-house-door"></i>
                        Home
                    </a>           
                    <a class="botao-menu<?= ativo('gerenciamento_de_clientes.php', $paginaAtual) ?>" href="gerenciamento_de_clientes.php">
                        <i class="bi bi-person"></i>
                        Clientes
                    </a>
                    <a class="botao-menu<?= ativo('', $paginaAtual) ?>" href="">
                        <i class="bi bi-calendar-check"></i>
                        Atendimentos
                    </a>                                                                       
                    <a class="botao-menu<?= ativo('', $paginaAtual) ?>" href="">
                        <i class="bi bi-cash-coin"></i>
                        Finanças
                    </a>

                </section>

                <a class="botao-menu btn-logout" href='logout.php'>
                    <i class="bi bi-box-arrow-right"></i>
                    Logout
                </a>
            <?php endif ?>

        </section>
    </nav>

</header>