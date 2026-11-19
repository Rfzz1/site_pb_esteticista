<?php 
session_start();
include 'conexao.php';
include 'funcoes.php';

header('Content-Type: application/json; charset=utf-8');

if (!isset($_SESSION['usuario_id'])) {
    http_response_code(401);
    echo json_encode(['erro' => 'Não Autorizado']);
    exit;
}

$user_id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if (!isset($user_id) || $user_id == null) {
    http_response_code(400);
    echo json_encode(['erro' => 'Id Inválido ou Não encontrado']);
    exit;
}

$queryInfosUsuario = $conexao -> prepare("SELECT nome, cpf, telefone, email, nascimento FROM tb_usuarios WHERE id = ?");
$queryInfosUsuario -> bind_param("i", $user_id);
$queryInfosUsuario -> execute();

$dadosUserResultado = $queryInfosUsuario -> get_result();
$dadosUser = $dadosUserResultado -> fetch_assoc();

if (!$dadosUser) {
    http_response_code(404);
    echo json_encode(['erro' => 'Usuário inexistente ou não encntrado']);
    exit;
}

$idadeUser = (new DateTime($dadosUser['nascimento']))-> diff(new DateTime())->y;

$iniciaisUser = "";
$nomeCompleto = $dadosUser['nome'];
$partes = explode(" ", trim($nomeCompleto));

$partes = array_filter($partes);

$primeiroNome = $partes[0];
$ultimoNome = end($partes);

$iniciaisUser .= mb_strtoupper(mb_substr($primeiroNome, 0, 1, "UTF-8"), "UTF-8");

if (count($partes) > 1) {
    $iniciaisUser .= mb_strtoupper(mb_substr($ultimoNome, 0, 1, "UTF-8"), "UTF-8");
}


echo json_encode([
    'nome' => $dadosUser['nome'],
    'telefone' => formatarTelefone($dadosUser['telefone']),
    'email' => $dadosUser['email'],
    'idade' => $idadeUser,
    'iniciais' => $iniciaisUser
]);

?>