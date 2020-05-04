<script src="js/enderecoForm.js" type="text/javascript"></script>

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
                    if (isset($_GET['status']) && $_GET['status'] == 'dataNascVazio') {
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
            <?php
                if (isset($_GET['status']) && $_GET['status'] == 'enderecoInvalido') {
                    dicaInput("Todos os campos dos endereços são obrigatórios! Não insira caractéres especiais!");
                }
            ?>
            <h6 class="white-text">Endereço</h6>
            <div id="enderecos">
                <input type="hidden" value="<?php echo (empty($enderecos)? 1 : count($enderecos)); ?>" id="enderecoCont" name="enderecoCont">
                <div name="endereco" class="endereco" id="1">
                    <div class="row">
                        <div class="input-field col s9">
                            <input id="rua1" type="text" class="white-text rua" name="rua1" maxlength="150"
                                value="<?php echo (isset($_GET['editar'])?$cliente->getEnderecos()[0]->getRua():''); ?>"
                            >
                            <label class="labelrua" for="rua1">Rua</label>
                        </div>
                        <div class="input-field col s3">
                            <input id="numero1" type="text" class="white-text numero" name="numero1" maxlength="5"
                                value="<?php echo (isset($_GET['editar'])?$cliente->getEnderecos()[0]->getNumero():''); ?>"
                            >
                            <label class="labelnumero" for="numero1">Numero</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s8">
                            <input id="bairro1" type="text" class="white-text bairro" name="bairro1" maxlength="150"
                                value="<?php echo (isset($_GET['editar'])?$cliente->getEnderecos()[0]->getBairro():''); ?>"
                            >
                            <label class="labelbairro" for="bairro1">Bairro</label>
                        </div>
                        <div class="input-field col s4">
                            <input id="cep1" type="number" class="white-text cep" name="cep1" maxlength="8"
                                value="<?php echo (isset($_GET['editar'])?$cliente->getEnderecos()[0]->getCep():''); ?>"
                                oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                            >
                            <label class="labelcep" for="cep1">CEP</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="complemento1" type="text" class="white-text complemento" name="complemento1" maxlength="150"
                                value="<?php echo (isset($_GET['editar'])?$cliente->getEnderecos()[0]->getComplemento():''); ?>"
                            >
                            <label class="labelcomplemento" for="complemento1">Complemento</label>
                        </div>
                        <div class="input-field col s10">
                            <input id="cidade1" type="text" class="white-text cidade" name="cidade1" maxlength="150"
                                value="<?php echo (isset($_GET['editar'])?$cliente->getEnderecos()[0]->getCidade():''); ?>"
                            >
                            <label class="labelcidade" for="cidade1">Cidade</label>
                        </div>
                        <div class="input-field col s2">
                            <input id="estado1" type="text" class="white-text estado" name="estado1" maxlength="2"
                                value="<?php echo (isset($_GET['editar'])?$cliente->getEnderecos()[0]->getEstado():''); ?>"
                            >
                            <label class="labelestado" for="estado1">Estado</label>
                        </div>
                    </div>
                    <hr>
                    <br>
                </div>
                <?php 
                    if (!empty($enderecos)){
                        foreach ($enderecos as $indice => $endereco) {
                            if ($indice != 0) {
                                enderecoForm($endereco, $indice + 1);
                            }
                        }
                    }
                ?>
            </div>
            <div onclick="gerarEnderecoForm()" class="btn light-blue darken-4 col s6 offset-s6">Adicionar Endereco</div>
            <br><br><br>
            <div class="form-bar">
                <a class="col s4 btn red darken-4" href="./?page=lista">Voltar</a>
                <input value="Confirmar" class="btn col s4 offset-s4 green darken-3" type="submit" name="btnNovoCliente"> <br>
            </div>
        </form>
    </div>
</div>
