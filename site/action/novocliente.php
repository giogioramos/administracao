<?php

verificarValidadeSessao();

if (isset($_GET['editar'])) {
    $busca = new STMT();

    if (isset($_GET['excluirEnd'])) {
        $sql = 'DELETE FROM endereco where id = ?';
        $params = [$_GET['excluirEnd']];
        $resultado = $busca->executarQuery($sql, $params);
    }
    
    $sql = 'SELECT id, rua, numero, bairro, cep, complemento, cidade, estado FROM endereco where id_cliente = ?';
    $params = [$_GET['editar']];
    $resultado = $busca->executarQuery($sql, $params);

    $enderecos = array();

    foreach ($resultado as $endereco) {
        $enderecos[] = new Endereco(
            $endereco['rua'],
            $endereco['numero'],
            $endereco['bairro'],
            $endereco['cep'],
            $endereco['complemento'],
            $endereco['cidade'],
            $endereco['estado'],  
            $endereco['id']   
        );
        end($enderecos)->setIdCliente($_GET['editar']);
    }

    $sql = 'SELECT nome, data_nascimento, cpf, rg, telefone FROM cliente where id = ?';
    $params = [$_GET['editar']];
    $resultado = $busca->executarQuery($sql, $params);

    if (!empty($resultado)) {
        $cliente = new Cliente(
            $resultado[0]['nome'],
            $resultado[0]['data_nascimento'],
            $resultado[0]['cpf'],
            $resultado[0]['rg'], 
            $resultado[0]['telefone'],
            $enderecos
        );
    } else {
        unset($_GET['editar']);
    }
}

if (!empty($_POST['btnNovoCliente'])) {
    
    if (empty($enderecos)){
        $enderecos = array();
    }

    for ($i=count($enderecos); $i < $_POST['enderecoCont']; $i++) { 
        $enderecos[] = new Endereco(
            $_POST['rua'.($i + 1)],
            $_POST['numero'.($i + 1)],
            $_POST['bairro'.($i + 1)],
            $_POST['cep'.($i + 1)],
            $_POST['complemento'.($i + 1)],
            $_POST['cidade'.($i + 1)],
            $_POST['estado'.($i + 1)],
            0   
        );
    }

    foreach ($enderecos as $i => $endereco) {
        if ($endereco->getId() != 0) {
            $endereco->setRua($_POST['rua'.($i + 1)]);
            $endereco->setNumero($_POST['numero'.($i + 1)]);
            $endereco->setBairro($_POST['bairro'.($i + 1)]);
            $endereco->setCep($_POST['cep'.($i + 1)]);
            $endereco->setComplemento($_POST['complemento'.($i + 1)]);
            $endereco->setCidade($_POST['cidade'.($i + 1)]);
            $endereco->setEstado($_POST['estado'.($i + 1)]);
        }
    }

    $retorno = validarCamposCliente([
        array(['nome'], 'alfanumerico'),
        array(['dataNasc'], 'livre'),
        array(['cpf','rg','telefone'], 'numerico'),
        array($enderecos, 'enderecos')
    ]); 
    
    if ($retorno != 'ok') {
        header('Location: ./?page=novocliente&status='.$retorno.(isset($_GET['editar'])?'&editar='.$_GET['editar']:''));
    } else {
        $cliente = new Cliente(
            $_POST['nome'],
            $_POST['dataNasc'],
            $_POST['cpf'],
            $_POST['rg'],
            $_POST['telefone'],
            $enderecos
        );
        if ((isset($_GET['editar']) && $cliente->atualizar($_GET['editar'])) || $cliente->inserir()) {
            header('Location: ./?page=lista');
        } else {
            header('Location: ./?page=novocliente&status=novoClienteInvalido');
        }
    }
}

require_once('core/template/novocliente.php');
