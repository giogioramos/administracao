<?php

verificarValidadeSessao();

if (isset($_GET['editar'])) {
    $busca = new STMT();
    $sql = 'SELECT nome, datanascimento, cpf, rg, telefone FROM cliente where id = ?';
    $params = [$_GET['editar']];
    $resultado = $busca->executarQuery($sql, $params);

    if (!empty($resultado)) {
        $cliente = new Cliente(
            $resultado[0]['nome'],
            $resultado[0]['datanascimento'],
            $resultado[0]['cpf'],
            $resultado[0]['rg'], 
            $resultado[0]['telefone']
        );
    } else {
        unset($_GET['editar']);
    }
}

if (!empty($_POST['btnNovoCliente'])) {
    if (empty($_POST['nome'])) {
        header('Location: ./?page=novocliente&status=nomeVazio');
    } else if (!ctype_alpha(str_replace(' ', '', $_POST['nome']))) {
        header('Location: ./?page=novocliente&status=nomeInvalido');
    } else if (empty($_POST['cpf'])) {
        header('Location: ./?page=novocliente&status=cpfVazio');
    } else if (empty($_POST['dataNasc'])) {
        header('Location: ./?page=novocliente&status=dataNascVazia');
    } else if (!ctype_digit($_POST['cpf'])) {
        header('Location: ./?page=novocliente&status=cpfInvalido');
    } else if (empty($_POST['rg'])) {
        header('Location: ./?page=novocliente&status=rgVazio');
    } else if (!ctype_digit($_POST['rg'])) {
        header('Location: ./?page=novocliente&status=rgInvalido');
    } else if (empty($_POST['telefone'])) {
        header('Location: ./?page=novocliente&status=telefoneVazio');
    } else if (!ctype_digit($_POST['telefone'])) {
        header('Location: ./?page=novocliente&status=telefoneInvalido');
    } else {
        $cliente = new Cliente(
            $_POST['nome'],
            $_POST['dataNasc'],
            $_POST['cpf'],
            $_POST['rg'],
            $_POST['telefone']
        );
        if ((isset($_GET['editar']) && $cliente->atualizar($_GET['editar'])) || $cliente->inserir()) {
            header('Location: ./?page=lista');
        } else {
            header('Location: ./?page=novocliente&status=novoClienteInvalido');
        }
    }
}

require_once('core/template/novocliente.php');
