<!-- CONTEÚDO PRINCIPAL -->

<!-- CADASTRO -->

<section class="modal-fundo oculto" id="modal-cadastro-cliente">

    <section class="modal">

        <button type="button" id="fechar-modal-cliente" class="botao-fechar" aria-label="Fechar">
            <i class="bi bi-x-lg"></i>
        </button>

        <h2 class="titulo-modal">CADASTRAR TAREFA</h2>

        <section class="modal-overlay">

            <form action="action.php" method="post">
                <label for="nome">Nome Completo</label><br>
                <input type="text" id="nome" name="nome" placeholder="Nome Completo" required>
                <br><br>
                <label for="cpf">CPF</label><br>
                <input type="text" id="cpf" name="cpf" placeholder="___.___.___-__" required>
                <br><br>
                <label for="emailCadastro">Email</label><br>
                <input type="email" id="emailCadastro" name="email" placeholder="E-mail" required>
                <br><br>
                <label for="telefone">Telefone</label><br>
                <input type="tel" id="telefone" name="telefone" placeholder="(00) 0 0000-0000" required>
                <br><br>
                <label for="nascimento">Nascimento</label><br>
                <input type="date" id="nascimento" name="nascimento" required>
                <br><br>
                <label for="senhaCadastro">Senha</label><br>
                <input type="password" id="senhaCadastro" name="senha" placeholder="Senha" required>
                <br><br>
                <input class="submit" type="submit" value="CADASTRAR" name="cadastro">
            </form>

        </section>

    </section>

</section>