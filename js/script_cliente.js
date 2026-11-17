const fundo = document.getElementById('modal-cadastro-cliente');
const botaoAbrir = document.getElementById('abrir-modal-cliente');
const botaoFechar = document.getElementById('fechar-modal-cliente');

function abrirModal() {
    fundo.classList.remove('oculto');
}

function fecharModal() {
    fundo.classList.add('oculto');
}

botaoAbrir.addEventListener('click', abrirModal);
botaoFechar.addEventListener('click', fecharModal);
fundo.addEventListener('click',function(event) {
    if (event.target === fundo) {
        fecharModal();
    }
});