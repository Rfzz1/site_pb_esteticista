<header>

    <nav>
        <button onclick="location.href='index.php'">
            Home
        </button>

        <section class="container-botoes">

            <?php if(!isset($_SESSION['usuario_id'])): ?>
                <button onclick="location.href='modal_login.php'">
                    Sign in
                </button>
            <?php else: ?>
                <button onclick="location.href='cadastro_atividades.php'">
                    Tarefas
                </button>
                <button onclick="location.href='logout.php'">
                    Logout
                </button>
            <?php endif ?>

        </section>
    </nav>

</header>