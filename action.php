<?php

include 'conexao.php';


//CADASTRO

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nome = htmlspecialchars(trim($_POST['nome']) ?? "");
    $cpf = htmlspecialchars(trim($_POST['cpf']) ?? "");
    $email = htmlspecialchars(trim($_POST['email']) ?? "");
    $telefone = htmlspecialchars(trim($_POST['telefone']) ?? "");
    $nascimento = htmlspecialchars(trim($_POST['nascimento']) ?? "");
    $senha = htmlspecialchars(trim($_POST['senha']) ?? "");

    $senhaHashada = password_hash($senha, PASSWORD_DEFAULT);

    $sqlCadastro = $conexao->prepare("INSERT INTO tb_usuarios (nome,cpf,email,telefone,nascimento,senha) VALUES (?,?,?,?,?,?)");

    $sqlCadastro -> bind_param("ssssss", $nome, $cpf, $email, $telefone, $nascimento, $senhaHashada);
    $sqlCadastro -> execute();

    header("Location: index.php");
    exit;

}


?>