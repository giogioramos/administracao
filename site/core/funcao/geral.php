<?php

function toast($texto) {
    include("core/template/toast.php");
}

function dicaInput($texto) {
    include("core/template/dica.php");
}

function verificarValidadeSessao($deslogar = true, $redireciona = ''){
    $busca = new STMT();
    if (isset($_SESSION['login'])) {
        $sql = 'SELECT idsessao FROM usuario where login = ?';
        $params = [$_SESSION['login']];
        $resultado = $busca->executarQuery($sql, $params);
        if (empty($resultado) || $resultado[0]['idsessao'] != session_id()) {
            header("Location: action/logout.php");
        } else if ($redireciona != '') { 
            header("Location: ./?page=$redireciona");
        }
    } else {
        if ($deslogar) {
            header("Location: action/logout.php");
        }
    }
}

function enderecoForm($endereco, $indice) {
    include("core/template/formEndereco.php");
}