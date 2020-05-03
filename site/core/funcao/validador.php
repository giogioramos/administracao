<?php

function validarCaracterEspecial($texto){
    return !preg_match('/[^a-z0-9 _]+/i', $texto);
}

function validarEspaco($texto){
    return !strpos($texto,' ');
}

function restringirAlfanumerico($texto){
    return !(validarEspaco($texto) && validarCaracterEspecial($texto) && !empty($texto));
}