<?php

include 'conexao.php';


//CADASTRO USUÁRIO

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cadastro'])) {

    $nome = trim($_POST['nome']) ?? "";
    $cpf = preg_replace('/\D/', '', $_POST['cpf'] ?? "");
    $email = trim($_POST['email']) ?? "";
    $telefone = preg_replace('/\D/', '', $_POST['telefone'] ?? "");
    $nascimento = trim($_POST['nascimento']) ?? "";
    $senha = trim($_POST['senha']) ?? "";

    $senhaHashada = password_hash($senha, PASSWORD_DEFAULT);

    $sqlCadastro = $conexao->prepare("INSERT INTO tb_usuarios (nome,cpf,email,telefone,nascimento,senha) VALUES (?,?,?,?,?,?)");

    $sqlCadastro->bind_param("ssssss", $nome, $cpf, $email, $telefone, $nascimento, $senhaHashada);
    $sqlCadastro->execute();

    header("Location: gerenciamento_de_clientes.php");
    exit;
}
