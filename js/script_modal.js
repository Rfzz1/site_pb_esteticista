    function trocarModal(idEsconder, idMostrar) {
        const esconder = document.getElementById(idEsconder);
        const mostrar  = document.getElementById(idMostrar);

        // Se algum não existir (por exemplo, usuário já logado), não faz nada
        if (!esconder || !mostrar) return;

        esconder.classList.add('oculto');    // some
        mostrar.classList.remove('oculto');  // aparece
    }