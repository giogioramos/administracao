<div class="fundo fundo-main row">
    <div class="col s10 l4 offset-s1 offset-l4 painel-bordado">
        <h6 class="center white-text">Criar novo cliente</h6>
        <form method="POST" action="">
            <div class="input-field">
                <input id="nome" type="text" class="white-text" name="nome" maxlength="150"
                    value="<?php echo (isset($_GET['editar'])?$cliente->getNome():''); ?>"
                >
                <label for="nome">Nome</label>
                <?php
                    if (isset($_GET['status']) && $_GET['status'] == 'nomeVazio') {
                        dicaInput("O campo Nome deve ser preenchido!");
                    } else if (isset($_GET['status']) && $_GET['status'] == 'nomeInvalido') {
                        dicaInput("O nome não deve conter caracteres especiais ou números!");
                    } 
                ?>
            </div> 
            <br>
            <div class="input-field">
                <input id="dataNasc" type="date" class="white-text" name="dataNasc"
                    value="<?php echo (isset($_GET['editar'])?$cliente->getDataNascimento():''); ?>"
                >
                <label for="dataNasc">Data de nascimento</label>
                <?php
                    if (isset($_GET['status']) && $_GET['status'] == 'dataNascVazia') {
                        dicaInput("O campo Data de nascimento deve ser preenchido!");
                    } 
                ?>
            </div> 
            <br>
            <div class="input-field">
                <input id="cpf" type="number" class="white-text" name="cpf" maxlength="11"
                    oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                    value="<?php echo (isset($_GET['editar'])?$cliente->getCpf():''); ?>"
                >
                <label for="cpf">CPF</label>
                <?php
                    if (isset($_GET['status']) && $_GET['status'] == 'cpfVazio') {
                        dicaInput("O campo CPF deve ser preenchido!");
                    } else if (isset($_GET['status']) && $_GET['status'] == 'cpfInvalido') {
                        dicaInput("O CPF não deve conter caracteres especiais ou letras!");
                    } 
                ?>
            </div> 
            <br>
            <div class="input-field">
                <input id="rg" type="number" class="white-text" name="rg" maxlength="20"
                    oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                    value="<?php echo (isset($_GET['editar'])?$cliente->getRg():''); ?>"
                >
                <label for="rg">RG</label>
                <?php
                    if (isset($_GET['status']) && $_GET['status'] == 'rgVazio') {
                        dicaInput("O campo RG deve ser preenchido!");
                    } else if (isset($_GET['status']) && $_GET['status'] == 'rgInvalido') {
                        dicaInput("O RG não deve conter caracteres especiais ou letras!");
                    } 
                ?>
            </div> 
            <br>
            <div class="input-field">
                <input id="telefone" type="number" class="white-text" name="telefone" maxlength="10"
                    oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                    value="<?php echo (isset($_GET['editar'])?$cliente->getTelefone():''); ?>"
                >
                <label for="telefone">Telefone</label>
                <?php
                    if (isset($_GET['status']) && $_GET['status'] == 'telefoneVazio') {
                        dicaInput("O campo Telefone deve ser preenchido!");
                    } else if (isset($_GET['status']) && $_GET['status'] == 'telefoneInvalido') {
                        dicaInput("O telefone não deve conter caracteres especiais ou letras!");
                    } 
                ?>
            </div> 
            <br>
            <div class="form-bar">
                <a class="col s4 btn red darken-4" href="./?page=lista">Voltar</a>
                <input value="Confirmar" class="btn col s4 offset-s4 green darken-3" type="submit" name="btnNovoCliente"> <br>
            </div>
        </form>
    </div>
</div>