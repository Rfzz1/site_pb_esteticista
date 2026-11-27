function abrirModal(fundo) {
    fundo.classList.remove('oculto');
}

function fecharModal(fundo) {
    fundo.classList.add('oculto');
}

function acaoModal(fundo, botaoFechar) {
    fundo.addEventListener('click', function(event) {
        if (event.target === fundo) {
            fecharModal(fundo);
        }
    });

    botaoFechar.addEventListener('click', function(event) {
        fecharModal(fundo);
    });
}