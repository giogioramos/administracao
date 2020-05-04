function alterarElementosDinamicos(nome) {
    let enderecoLista = document.getElementById('enderecos');

    let arrayInput = enderecoLista.getElementsByClassName(nome);
    let arrayLabel = enderecoLista.getElementsByClassName('label'+nome);

    let ultimoElemento = arrayInput[arrayInput.length-1];
    let ultimoElementoLabel = arrayLabel[arrayLabel.length-1];
    let tamanhoElemento = arrayInput.length;

    ultimoElemento.id = nome + tamanhoElemento;
    ultimoElemento.name = nome + tamanhoElemento;
    ultimoElemento.value = '';

    ultimoElementoLabel.setAttribute("for", nome + tamanhoElemento);
}

function removerEndereco(id){
    let enderecoLista = document.getElementById('enderecos');
    let enderecos = enderecoLista.getElementsByClassName('endereco');

    for (let i = 0; i < enderecos.length; i++) {
        if (enderecos[i].id == id){
            enderecos[i].remove();
        }
    }
}

function gerarEnderecoForm() {
    let enderecoLista = document.getElementById('enderecos');
    let enderecoForm = document.getElementsByName('endereco')[0];
    let id = parseInt(enderecoLista.getElementsByClassName('endereco')[
        enderecoLista.getElementsByClassName('endereco').length -1 
    ].id) + 1;

    document.getElementById('enderecoCont').value = parseInt(document.getElementById('enderecoCont').value) + 1;
    let enderecoClone = enderecoForm.cloneNode(true);
    let btnRemover = document.createElement('div');
    btnRemover.onclick = function() { removerEndereco(id) };
    btnRemover.innerHTML = 'Remover';
    btnRemover.className = 'btn red darken-4';
    enderecoClone.append(btnRemover);
    let hr = document.createElement('hr');
    enderecoClone.append(hr);
    enderecoClone.id = id;

    enderecoLista.append(enderecoClone);

    alterarElementosDinamicos('rua');
    alterarElementosDinamicos('numero');
    alterarElementosDinamicos('bairro');
    alterarElementosDinamicos('complemento');
    alterarElementosDinamicos('cep');
    alterarElementosDinamicos('cidade');
    alterarElementosDinamicos('estado');
}

function carregarEnderecoForm(cont){
    for (let i = 0; i < cont-1; i++) {
        gerarEnderecoForm();
    }
}