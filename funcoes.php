<?php 

function formatarTelefone($telefone) {
    if (strlen($telefone) != 11) {
        return $telefone;
    }
    
    $telefone = "(" . substr($telefone, 0, 2) . ") " . substr($telefone, 2, 1) . " " . substr($telefone, 3, 4) . "-" . substr($telefone, 7);

    return $telefone;
}

function mascararCPF($cpf) {
    
    if (strlen($cpf) != 11) {
        return $cpf;
    }

    $cpf = "***.***.***-" . substr($cpf, 9); 

    return $cpf;
}

function listarServicos($conexao) {
    //Buscar Servico
    $sqlBuscaServicos = $conexao -> query("SHOW COLUMNS FROM tb_atendimentos LIKE 'servicos'");

    $linha = $sqlBuscaServicos -> fetch_assoc();

    if ($linha == null) {
        return [];
    }

    preg_match_all("/'([^']*)'/", $linha['Type'], $servico);
    
    
    return $servico[1];
}

function listarStatus($conexao) {
    $sqlBuscaStatus = $conexao -> query ("SHOW COLUMNS FROM tb_atendimentos LIKE 'status'");
    $linha = $sqlBuscaStatus -> fetch_assoc();

    if ($linha == null) {
        return [];
    }

    preg_match_all("/'([^']*)'/", $linha['Type'], $status);
    return $status[1];
}