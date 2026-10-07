<?php

session_start();
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $emailUsuario = htmlspecialchars(trim($_POST['email']));
    $senhaUsuario = htmlspecialchars(trim($_POST['senha']));

    $sqlBuscaUser = $conexao -> prepare("SELECT * from tb_usuarios where email = ?");
    $sqlBuscaUser -> bind_param("s", $emailUsuario);
    $sqlBuscaUser -> execute();

    $resultado = $sqlBuscaUser -> get_result();

    $usuario = $resultado->fetch_assoc();

    if ($usuario && password_verify($senhaUsuario, $usuario['senha'])) {

        $_SESSION['usuario_id'] = $usuario['id'];
        $_SESSION['usuario_email'] = $usuario['email'];

        header("Location: index.php");
        exit;

    } else {
        echo "Email ou senha incorretos";
    }

}

?>