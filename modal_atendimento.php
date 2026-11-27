<?php
include_once 'conexao.php';
include_once 'funcoes.php';

//Buscar cliente
$sqlBuscaClientes = $conexao -> prepare("SELECT id,nome FROM tb_usuarios");
$sqlBuscaClientes -> execute();

$resultadoBuscaClientes = $sqlBuscaClientes -> get_result();

//Buscar Servico
$listaServico = listarServicos($conexao);
//Buscar Status
$listaStatus = listarStatus($conexao);
?>

<!-- ATENDIMENTOS -->
 <section class="modal-fundo oculto" id="modal-atendimento">

    <section class="modal" id="agendar-atendimento">

        <button type="button" id="fechar-modal-atendimento" class="botao-fechar" aria-label="Fechar">
            <i class="bi bi-x-lg"></i>
        </button>

        <h2 class="titulo-modal">AGENDAR ATENDIMENTO</h2>

        <section class="modal-overlay">

            <form action="action.php" method="post">

                <input type="hidden" id="editar-id" name="id_usuario">

                <label for="dataHora">Data e Hora</label><br>
                <input type="datetime-local" id="dataHora" name="dataHora" required>

                <label for="status">Status Atendimento</label><br>
                <select name="status" id="status">
                    <option value="">Selecione...</option>
                    <?php foreach($listaStatus as $status): ?>
                        <option value="<?php echo htmlspecialchars($status); ?>"><?php echo htmlspecialchars($status); ?></option>
                    <?php endforeach; ?>
                </select>

                <label for="servico">Serviço</label><br>
                <select name="servico" id="servico" required>
                    <option value="">Selecione...</option>
                    <?php foreach($listaServico as $servico): ?>
                        <option value="<?php echo htmlspecialchars($servico); ?>"><?php echo htmlspecialchars($servico); ?></option>                
                    <?php endforeach; ?>
                </select>

                <label for="id_cliente">Cliente</label><br>
                <select name="id_cliente" id="id_cliente">
                    <option value="">Selecione...</option>
                    <?php while ($cliente = $resultadoBuscaClientes -> fetch_assoc()): ?>
                            <option value="<?php echo htmlspecialchars($cliente['id'])?>"><?php echo htmlspecialchars($cliente['nome'])  ?></option>               
                    <?php endwhile; ?>
                </select>

                <input class="submit" id="botao-salvar-atendimento" type="submit" value="AGENDAR" name="agendar">
            </form>

        </section>

    </section>

</section>