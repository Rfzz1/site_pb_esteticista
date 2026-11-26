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