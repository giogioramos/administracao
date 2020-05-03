<?php

verificarValidadeSessao(false, 'lista');

if (!empty($_POST['btnNovoUsuario'])) {
    if (empty($_POST['login'])) {
        header('Location: ./?page=novousuario&status=loginVazio');
    } else if (restringirAlfanumerico($_POST['login'])) {
        header('Location: ./?page=novousuario&status=loginInvalido');
    } else if (empty($_POST['senha'])) {
        header('Location: ./?page=novousuario&status=senhaVazia');
    } else if ($_POST['senha'] !== $_POST['senhaconf']) {
        header('Location: ./?page=novousuario&status=senhaDifere');
    } else {
        $usuario = new Usuario($_POST['login'], $_POST['senha'], '');
        if ($usuario->inserir()) {
            header('Location: ./');
        } else {
            header('Location: ./?page=novousuario&status=novoUsuarioInvalido');
        }
    }
}

require_once('core/template/novousuario.php');