//========== Cadastro e Edicao Cliente ===============
const fundo = document.getElementById('modal-cadastro-cliente');
const botaoAbrirCadastro = document.getElementById('abrir-modal-cliente');
const botaoFecharCadastro = document.getElementById('fechar-modal-cliente');
let clienteSelecionado = null;

// ===== MODAL =====
const formCliente   = document.querySelector('#modal-cadastro-cliente form');
const tituloModal   = document.querySelector('#modal-cadastro-cliente .titulo-modal');
const campoId       = document.getElementById('editar-id');
const campoCpf      = document.getElementById('cpf');
const campoNasc     = document.getElementById('nascimento');
const campoSenha    = document.getElementById('senhaCadastro');
const grupoSenha    = document.getElementById('grupo-senha');
const botaoSalvar   = document.getElementById('botao-salvar-cliente');
const botaoEditar   = document.getElementById('botao-editar-cliente');
const nomeCliente = document.getElementById('nome');
const telefoneCliente = document.getElementById('telefone');
const emailCliente = document.getElementById('email');

function modoCadastro() {
    formCliente.reset();
    campoId.value = '';

    tituloModal.textContent = "CADASTRAR CLIENTE";
    campoCpf.removeAttribute('readonly');
    campoNasc.removeAttribute('readonly');
    campoSenha.removeAttribute('disabled');
    grupoSenha.classList.remove('oculto');
    
    botaoSalvar.setAttribute('name', 'cadastro');
    botaoSalvar.value = 'CADASTRAR';
}

function modoEdicao(dados) {

    tituloModal.textContent = "EDITAR CLIENTE";

    nomeCliente.value = dados.nome;
    telefoneCliente.value = dados.telefone;
    emailCliente.value = dados.email;
    campoNasc.value = dados.nascimento;
    campoCpf.value = dados.cpf;
    campoId.value = dados.id;

    campoCpf.setAttribute('readonly', '');
    campoNasc.setAttribute('readonly', '');
    campoSenha.setAttribute('disabled', '');
    grupoSenha.classList.add('oculto');

    botaoSalvar.setAttribute('name', 'editar');
    botaoSalvar.value = "SALVAR";
}

// ============= AGENDAR CLIENTE ===============

const botaoAbrirAgendamento = document.getElementById('botao-agendar-cliente');
const fundoAgendamento = document.getElementById('modal-atendimento');
const botaoFecharAgendamento = document.getElementById('fechar-modal-atendimento');
const formAgendamento = document.querySelector('#modal-atendimento form');

function abrirModalAgendamento() {
    formAgendamento.reset();
    fecharPainel();
    abrirModal(fundoAgendamento);
}

botaoAbrirAgendamento.addEventListener('click', function(event) {
    abrirModalAgendamento();
});

acaoModal(fundoAgendamento, botaoFecharAgendamento);


//======== Painel Cliente ===========
const painelFundo = document.getElementById('painel-fundo');
const painel = document.getElementById('dados-cliente');
const botaoFecharPainel = document.getElementById('fechar-painel');
const linhas = document.querySelectorAll('.linha-cliente');

// ===== Reabrir o painel depois de salvar =====
const parametros = new URLSearchParams(window.location.search);
const idParaAbrir = parametros.get('abrir');

if (idParaAbrir) {
    const linha = document.querySelector(`.linha-cliente[data-id="${idParaAbrir}"]`);

    if (linha != null) {
        abrirPainel(linha);
        history.replaceState(null, '', window.location.pathname);
    }
}

async function abrirPainel(linha) {
    const id = linha.dataset.id;

    try {

        const resposta = await fetch(`buscar_cliente.php?id=${id}`);

        if (!resposta.ok) {
            throw new Error(`Não foi possível buscar os dados do cliente: ${resposta.status}`);
        }

        const dados = await resposta.json();

        clienteSelecionado = dados;
        
        document.getElementById('painel-iniciais').textContent = dados.iniciais;
        document.getElementById('painel-nome').textContent = dados.nome;
        document.getElementById('painel-telefone').textContent = dados.telefone;
        document.getElementById('painel-email').textContent = dados.email;
        document.getElementById('painel-idade').textContent = dados.idade + " anos";

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

    linhas.forEach(linhaTabela => {
            linhaTabela.classList.remove('linha-selecionada');
        });
}

linhas.forEach(function (linha) {
    linha.addEventListener('click', function(event){
        abrirPainel(linha);
    });
});

botaoFecharPainel.addEventListener('click', fecharPainel);

painelFundo.addEventListener('click',function(event) {
    if (event.target === painelFundo) {
        fecharPainel();
    }
});

// ==== MODAL - EVENT LISTENER =====

botaoEditar.addEventListener('click', function(event) {

    modoEdicao(clienteSelecionado);
    fecharPainel();
    abrirModal(fundo);
})

botaoAbrirCadastro.addEventListener('click', function(event) {

    modoCadastro();
    abrirModal(fundo);
});

acaoModal(fundo, botaoFecharCadastro);