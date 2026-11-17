<header>

    <nav class="nav-cabecalho">

        <section class="container-botoes">

             <?php if(!isset($_SESSION['usuario_id'])): ?>
                <button onclick="location.href='modal_login.php'">
                    Sign in
                </button>
            <?php else: ?>
            
                <section class="logo">
                    <p>
                        <span><img src="img/logo-bolinha.svg" alt="Logo" width="50" height="50" onclick="location.href='index.php'"></span>    
                        <span class="texto-logo" onclick="location.href='index.php'">Priscila Bressan</span>
                    </p>
                </section>

                <section class="navegacao">

                    <button onclick="location.href='index.php'">
                        Home
                    </button>           
                    <button onclick="location.href='gerenciamento_de_clientes.php'">
                        Clientes
                    </button>
                    <button onclick="location.href='gerenciamento_de_clientes.php'">
                        Atendimentos
                    </button>                                                                       
                    <button onclick="location.href='cadastro_atividades.php'">
                        Finanças
                    </button>

                </section>

                <button class="btn-logout" onclick="location.href='logout.php'">
                    Logout
                </button>
            <?php endif ?>

        </section>
    </nav>

</header>