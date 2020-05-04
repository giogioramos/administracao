<div name="endereco" class="endereco" id="<?php echo $indice; ?>">
    <div class="row">
        <div class="input-field col s9">
            <input id="rua<?php echo $indice; ?>" type="text" class="white-text rua" name="rua<?php echo $indice; ?>" maxlength="150"
                value="<?php echo $endereco->getRua(); ?>"
            >
            <label class="labelrua" for="rua<?php echo $indice; ?>">Rua</label>
        </div>
        <div class="input-field col s3">
            <input id="numero<?php echo $indice; ?>" type="text" class="white-text numero" name="numero<?php echo $indice; ?>" maxlength="5"
                value="<?php echo $endereco->getNumero(); ?>"
            >
            <label class="labelnumero" for="numero<?php echo $indice; ?>">Numero</label>
        </div>
    </div>
    <div class="row">
        <div class="input-field col s8">
            <input id="bairro<?php echo $indice; ?>" type="text" class="white-text bairro" name="bairro<?php echo $indice; ?>" maxlength="150"
                value="<?php echo $endereco->getBairro(); ?>"
            >
            <label class="labelbairro" for="bairro<?php echo $indice; ?>">Bairro</label>
        </div>
        <div class="input-field col s4">
            <input id="cep<?php echo $indice; ?>" type="number" class="white-text cep" name="cep<?php echo $indice; ?>" maxlength="8"
                value="<?php echo $endereco->getCep(); ?>"
                oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
            >
            <label class="labelcep" for="cep<?php echo $indice; ?>">CEP</label>
        </div>
    </div>
    <div class="row">
        <div class="input-field col s12">
            <input id="complemento<?php echo $indice; ?>" type="text" class="white-text complemento" name="complemento<?php echo $indice; ?>" maxlength="150"
                value="<?php echo $endereco->getComplemento(); ?>"
            >
            <label class="labelcomplemento" for="complemento<?php echo $indice; ?>">Complemento</label>
        </div>
        <div class="input-field col s10">
            <input id="cidade<?php echo $indice; ?>" type="text" class="white-text cidade" name="cidade<?php echo $indice; ?>" maxlength="150"
                value="<?php echo $endereco->getCidade(); ?>"
            >
            <label class="labelcidade" for="cidade<?php echo $indice; ?>">Cidade</label>
        </div>
        <div class="input-field col s2">
            <input id="estado<?php echo $indice; ?>" type="text" class="white-text estado" name="estado<?php echo $indice; ?>" maxlength="2"
                value="<?php echo $endereco->getEstado(); ?>"
            >
            <label class="labelestado" for="estado<?php echo $indice; ?>">Estado</label>
        </div>
    </div>
    <hr>
    <br>
    <a href="./?page=novocliente&editar=<?php echo $endereco->getIdCliente();?>&excluirEnd=<?php echo $endereco->getId();?>" 
        class="btn red darken-4">
        Remover
    </a>
    <hr>
</div>