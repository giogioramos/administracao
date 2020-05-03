<?php

Class Usuario extends STMT {
    private $login;
    private $senha;
    private $idSessao;

    public function __construct($login, $senha, $idSessao){
        $this->login = filter_var($login, FILTER_SANITIZE_SPECIAL_CHARS);
        $this->senha = filter_var($senha, FILTER_SANITIZE_SPECIAL_CHARS);
        $this->idSessao = $idSessao;
    }

    public function setLogin($login){
        $this->login = $login;
    }

    public function getLogin(){
        return $this->login;
    }

    public function setSenha($senha){
        $this->senha = $senha;
    }

    public function getSenha(){
        return $this->senha;
    }

    public function usuarioExistente(){
        $sql = "SELECT id FROM usuario WHERE login = ?";
        $params = [$this->login];
        $arr = $this->executarQuery($sql, $params);
        if (!empty($arr)) {
            return $arr[0]['id'];
        } else {
            return 0;
        }
    }

    public function validarUsuario(){
        if ($this->usuarioExistente()) {
            $sql = "SELECT id, senha FROM usuario WHERE login = ?";
            $params = [$this->login];
            $arr = $this->executarQuery($sql, $params);
            if (!empty($arr) && $arr[0]['senha'] == md5($this->senha)) {
                $sql = "UPDATE usuario SET idsessao = ? WHERE id = ?";
                $params = [$this->idSessao, $arr[0]['id']];
                $this->executarQuery($sql, $params);
                return $arr[0]['id'];
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function inserir(){
        if (!$this->usuarioExistente()) {
            $sql = "INSERT INTO usuario (login, senha) VALUES (?, ?)";
            $params = [$this->login, md5($this->senha)];
            $this->executarQuery($sql, $params);
            return true;
        } else {
            return false;
        }
    }
    
}