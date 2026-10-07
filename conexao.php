<?php

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'PB_esteticista');
define('DB_PORT', '3307');

$conexao = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME, DB_PORT);

if ($conexao -> connect_error) {
    die("Falha na conexão: " . mysqli_connect_error());
}

mysqli_set_charset($conexao, 'utf8mb4');

?>