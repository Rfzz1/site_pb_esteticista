<?php

session_start();
if (!isset($_SESSION['usuario_id'])) {
    header('index.php');
    exit;
}
include 'conexao.php';


//CADASTRO USUÁRIO

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cadastro'])) {

    $nome = trim($_POST['nome'] ?? "");
    $cpf = preg_replace('/\D/', '', $_POST['cpf'] ?? "");
    $email = trim($_POST['email'] ?? "");
    $telefone = preg_replace('/\D/', '', $_POST['telefone'] ?? "");
    $nascimento = trim($_POST['nascimento'] ?? "");
    $senha = trim($_POST['senha'] ?? "");

    $senhaHashada = password_hash($senha, PASSWORD_DEFAULT);

    $sqlCadastro = $conexao->prepare("INSERT INTO tb_usuarios (nome,cpf,email,telefone,nascimento,senha) VALUES (?,?,?,?,?,?)");

    $sqlCadastro->bind_param("ssssss", $nome, $cpf, $email, $telefone, $nascimento, $senhaHashada);
    $sqlCadastro->execute();

    header("Location: gerenciamento_de_clientes.php");
    exit;
}

//EDIÇÃO USUÁRIO

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['editar'])) {
    $nome = trim($_POST['nome'] ?? "");
    $email = trim($_POST['email'] ?? "");
    $telefone = preg_replace('/\D/', '', $_POST['telefone'] ?? '');
    $id = filter_input(INPUT_POST, 'id_usuario', FILTER_VALIDATE_INT, ['options' => ['min_range' => 1]]);

    $sqlBuscaEmail = $conexao -> prepare("SELECT id FROM tb_usuarios WHERE email = ? AND id <> ?");
    $sqlBuscaEmail -> bind_param("si", $email, $id);
    $sqlBuscaEmail -> execute();
    $resultado = $sqlBuscaEmail -> get_result();

    $emailExistente = $resultado -> num_rows > 0;

    if ($emailExistente) {
        header("Location: gerenciamento_de_clientes.php");
        exit; 
    }

    $invalido = $id === null || $id === false
         || $nome === ''
         || !filter_var($email, FILTER_VALIDATE_EMAIL)
         || strlen($telefone) !== 11
         || $email == $emailExistente
         || mb_strlen($nome) > 100;

    if ($invalido) {
        header("Location: gerenciamento_de_clientes.php");
        exit;
    }

    $sqlEditar = $conexao -> prepare ("UPDATE tb_usuarios SET nome = ?, email = ?, telefone = ? WHERE id = ?");
    $sqlEditar -> bind_param("sssi", $nome, $email, $telefone, $id);
    $executou = $sqlEditar -> execute();

    header("Location: gerenciamento_de_clientes.php?abrir=" .$id);
    exit; 
}