<?php 

function formatarTelefone($telefone) {
    if (count($telefone) != 11) {
        return $telefone;
    } else if (count($telefone) <= 2) {
        $telefone = "(" . substr($telefone, 0, 2);
    } else if (count($telefone) <= 3) {
        $telefone = $telefone . ") " . substr($telefone, 2, 3);
    } else if (count($telefone) <= 7) {
        $telefone = $telefone . " " . substr($telefone, 3, 7);
    } else if (count($telefone) > 7) {
        $telefone = $telefone . "-" . substr($telefone, 7);
    }

    return $telefone;
}
?>