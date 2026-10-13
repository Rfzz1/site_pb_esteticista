<header>

    <nav>
        <button onclick="location.href='index.php'">
            Home
        </button>

        <?php if(!isset($_SESSION['usuario_id'])): ?>
            <button onclick="location.href='modal_login.php'">
                Sign in
            </button>
        <?php else: ?>
            <button onclick="location.href='logout.php'">
                Logout
            </button>
        <?php endif ?>
    </nav>

</header>