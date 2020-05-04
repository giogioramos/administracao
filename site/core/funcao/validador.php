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

function restringirAlfanumericoComEspaco($texto){
    return !(validarCaracterEspecial($texto) && !empty($texto));
}

function restringirAlfabeticoComEspaco($texto){
    return !(ctype_alpha(str_replace(' ', '', $texto)) && !empty($texto));
}

function validarCamposCliente($dados){

    for ($i=0; $i < sizeof($dados); $i++) { 
        $campos = $dados[$i][0];
        $modo = $dados[$i][1];

        if ($modo == 'alfanumerico') {
            for ($j=0; $j < sizeof($campos); $j++) { 
                if (empty($_POST[$campos[$j]])) {
                    return $campos[$j].'Vazio';
                } else if (restringirAlfabeticoComEspaco($_POST[$campos[$j]])) {
                    return $campos[$j].'Invalido';
                }
            }
        } else if ($modo == 'numerico') {
            for ($j=0; $j < sizeof($campos); $j++) { 
                if (empty($_POST[$campos[$j]])) {
                    return $campos[$j].'Vazio';
                } else if (!ctype_digit($_POST[$campos[$j]])) {
                    return $campos[$j].'Invalido';
                }
            } 
        } else if ($modo == 'enderecos') {
            for ($j=0; $j < sizeof($campos); $j++) { 
                if (
                    restringirAlfanumericoComEspaco($campos[$j]->getRua()) ||
                    restringirAlfanumericoComEspaco($campos[$j]->getNumero()) ||
                    restringirAlfanumericoComEspaco($campos[$j]->getBairro()) || 
                    empty($campos[$j]->getCep()) || (!ctype_digit($campos[$j]->getCep())) ||
                    restringirAlfanumericoComEspaco($campos[$j]->getComplemento()) || 
                    restringirAlfanumericoComEspaco($campos[$j]->getCidade()) || 
                    empty($campos[$j]->getEstado()) || (!ctype_alpha($campos[$j]->getEstado())) 
                ) {
                    return 'enderecoInvalido';
                }    
            }
        } else {
            for ($j=0; $j < sizeof($campos); $j++) { 
                if (empty($_POST[$campos[$j]])) {
                    return $campos[$j].'Vazio';
                } 
            }
        }
    }

    return 'ok';
}