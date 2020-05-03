<?php

abstract Class Conexao {
    public static function conectar(){
        $servidor = 'localhost';
        $login = 'root';
        $senha = '';
        try {
            $conexao = new PDO("mysql:host=$servidor", $login, $senha);
            $sql = 'USE administracao';
            $stmt = $conexao->prepare($sql);
            $stmt->execute();
            return $conexao;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}
    

    
   


