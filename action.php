<?php

include 'conexao.php';


//CADASTRO USUÁRIO

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cadastro'])) {

    $nome = htmlspecialchars(trim($_POST['nome']) ?? "");
    $cpf = htmlspecialchars(trim($_POST['cpf']) ?? "");
    $email = htmlspecialchars(trim($_POST['email']) ?? "");
    $telefone = htmlspecialchars(trim($_POST['telefone']) ?? "");
    $nascimento = htmlspecialchars(trim($_POST['nascimento']) ?? "");
    $senha = htmlspecialchars(trim($_POST['senha']) ?? "");

    $senhaHashada = password_hash($senha, PASSWORD_DEFAULT);

    $sqlCadastro = $conexao->prepare("INSERT INTO tb_usuarios (nome,cpf,email,telefone,nascimento,senha) VALUES (?,?,?,?,?,?)");

    $sqlCadastro->bind_param("ssssss", $nome, $cpf, $email, $telefone, $nascimento, $senhaHashada);
    $sqlCadastro->execute();

    header("Location: modal_login.php");
    exit;
}

//CADASTRO TAREFAS

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['tarefa'])) {

    $nome = htmlspecialchars(trim($_POST['nome']) ?? "");
    $descricao = htmlspecialchars(trim($_POST['descricao']) ?? "");
    $tempo = htmlspecialchars(trim($_POST['expiracao']) ?? "");
    $id_usuario = htmlspecialchars(trim($_POST['id']) ?? "");

    $sqlCadastro = $conexao->prepare("INSERT INTO tb_tarefas (nome,descricao,tempo,id_usuario) VALUES (?,?,?,?)");

    $sqlCadastro->bind_param("sssi", $nome, $descricao, $tempo, $id_usuario);
    $sqlCadastro->execute();

    header("Location: cadastro_atividades.php");
    exit;
}

//EXCLUIR TAREFAS

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['excluir_tarefa'])) {
    $id_tarefa = htmlspecialchars(trim($_POST['id']) ?? "");

    $sqlExclusao = $conexao -> prepare("DELETE FROM tb_tarefas WHERE id = ?");
    $sqlExclusao -> bind_param("i", $id_tarefa);
    $sqlExclusao -> execute();

    header("Location: cadastro_atividades.php");
    exit;
}
