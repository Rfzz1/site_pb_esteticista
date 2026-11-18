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

//Painel Cliente
const painelFundo = document.getElementById('painel-fundo');
const painel = document.getElementById('dados-cliente');
const botaoFecharPainel = document.getElementById('fechar-painel');
const linhas = document.querySelectorAll('.linha-cliente');

async function abrirPainel(linha) {
    const id = linha.dataset.id;

    try {

        const resposta = await fetch(`buscar_cliente.php?id=${id}`);

        if (!resposta.ok) {
            throw new Error(`Não foi possível buscar os dados do cliente: ${resposta.status}`);
        }

        const dados = await resposta.json();
        
        document.getElementById('painel-iniciais').textContent = dados.iniciais;
        document.getElementById('painel-nome').textContent = dados.nome;
        document.getElementById('painel-telefone').textContent = dados.telefone;
        document.getElementById('painel-email').textContent = dados.email;
        document.getElementById('painel-idade').textContent = dados.idade, " anos";

        linhas.forEach(linhaTabela => {
            linhaTabela.classList.remove('linha-selecionada');
        });

        linha.classList.add('linha-selecionada');
        painelFundo.classList.remove('oculto');
        painel.classList.remove('oculto');
         

    } catch (erro) {
        console.error(erro);
        alert('Não foi possível abrir a cliente');
    }
}

function fecharPainel() {
    painelFundo.classList.add('oculto');
    painel.classList.add('oculto');

}

linhas.forEach(function (linha) {
    linha.addEventListener('click', abrirPainel);
});

botaoFecharPainel.addEventListener('click', fecharPainel);

painelFundo.addEventListener('click',function(event) {
    if (event.target === painelFundo) {
        fecharPainel();
    }
});