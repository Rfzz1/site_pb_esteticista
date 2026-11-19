<!-- CONTEÚDO PRINCIPAL -->

<!-- CADASTRO -->

<section class="modal-fundo oculto" id="modal-cadastro-cliente">

    <section class="modal" id="cadastro-cliente">

        <button type="button" id="fechar-modal-cliente" class="botao-fechar" aria-label="Fechar">
            <i class="bi bi-x-lg"></i>
        </button>

        <h2 class="titulo-modal">CADASTRAR CLIENTE</h2>

        <section class="modal-overlay">

            <form action="action.php" method="post">
                <label for="nome">Nome Completo</label><br>
                <input type="text" id="nome" name="nome" placeholder="Nome Completo" required>

                <label for="cpf">CPF</label><br>
                <input type="text" id="cpf" name="cpf" placeholder="___.___.___-__" inputmode="numeric" pattern="\d{3}\.\d{3}\.\d{3}-\d{2}" maxlength="14" required>

                <label for="emailCadastro">Email</label><br>
                <input type="email" id="emailCadastro" name="email" placeholder="E-mail" maxlength="120" required>

                <label for="telefone">Telefone</label><br>
                <input type="tel" id="telefone" name="telefone" placeholder="(00) 0 0000-0000" pattern="\(\d{2}\) \d{1} \d{4}-\d{4}" maxlength="16" required>

                <label for="nascimento">Nascimento</label><br>
                <input type="date" id="nascimento" name="nascimento" required>

                <label for="senhaCadastro">Senha</label><br>
                <input type="password" id="senhaCadastro" name="senha" placeholder="Senha" maxlength="30" required>
                
                <input class="submit" type="submit" value="CADASTRAR" name="cadastro">
            </form>

        </section>

    </section>

</section>