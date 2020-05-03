<?php

verificarValidadeSessao(false, 'lista');

if (!empty($_POST['btnLogin'])) {
    if (empty($_POST['login'])) {
        header("Location: ./?status=loginVazio");
    } else {
        if (empty($_POST['senha'])) {
            header("Location: ./?status=senhaVazia");
        } else {
            $usuario = new Usuario($_POST['login'], $_POST['senha'], session_id());
            if ($usuario->validarUsuario()) {
                $_SESSION["login"] = $_POST['login'];
                header("Location: ./?page=lista");
            } else {
                header("Location: ./?status=semCredencial");
            }
        }
    }
}

require_once('core/template/login.php');