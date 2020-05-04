<?php

Class Cliente extends STMT {
    private $nome;
    private $dataNascimento;
    private $cpf; 
    private $rg;
    private $telefone;
    private $enderecos;

    public function __construct($nome, $dataNascimento, $cpf, $rg, $telefone, $enderecos){
        $this->nome = $nome;
        $this->dataNascimento = $dataNascimento;
        $this->cpf = $cpf;
        $this->rg = $rg;
        $this->telefone = $telefone;
        $this->enderecos = $enderecos;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }
    
    public function getNome(){
        return $this->nome;
    }

    public function setDataNascimento($dataNascimento){
        $this->dataNascimento = $dataNascimento;
    }

    public function getDataNascimento(){
        return $this->dataNascimento;
    }

    public function setCpf($cpf){
        $this->cpf = $cpf;
    }

    public function getCpf(){
        return $this->cpf;
    }

    public function setRg($rg){
        $this->rg = $rg;
    }

    public function getRg(){
        return $this->rg;
    }

    public function setTelefone($telefone){
        $this->telefone = $telefone;
    }

    public function getTelefone(){
        return $this->telefone;
    }

    public function setEnderecos($enderecos){
        $this->enderecos = $enderecos;
    }

    public function getEnderecos(){
        return $this->enderecos;
    }

    public function clienteExistente(){
        $sql = "SELECT id FROM usuario WHERE cpf = ?";
        $params = [$this->cpf];
        $arr = $this->executarQuery($sql, $params);
        if (!empty($arr)) {
            return $arr[0]['id'];
        } else {
            return 0;
        }
    }

    public function inserir(){
        if (!$this->clienteExistente()) {
            $sql = "INSERT INTO cliente (nome, data_nascimento, cpf, rg, telefone) VALUES (?, ?, ?, ?, ?)";
            $params = [
                $this->nome, 
                $this->dataNascimento, 
                $this->cpf, 
                $this->rg, 
                $this->telefone
            ];
            $this->executarQuery($sql, $params);
            
            $sql = "SELECT MAX(id) AS ultimo FROM cliente";
            $utlimoId = $this->executarQuery($sql)[0]['ultimo'];

            foreach ($this->enderecos as $endereco) {
                $endereco->setIdCliente($utlimoId);
                $endereco->inserir();
            }
            
            return true;
        } else {
            return false;
        }
    }

    public function atualizar($id){
        if (!$this->clienteExistente()) {
            $sql = "UPDATE cliente SET nome=?, data_nascimento=?, cpf=?, rg=?, telefone=? where id = ?";
            $params = [
                $this->nome, 
                $this->dataNascimento, 
                $this->cpf, 
                $this->rg, 
                $this->telefone, 
                $id
            ];
            $this->executarQuery($sql, $params);

            foreach ($this->enderecos as $endereco) {
                if ($endereco->getId() == 0) {
                    $endereco->setIdCliente($id);
                    $endereco->inserir();
                } else {
                    $endereco->atualizar($endereco->getId());
                }
            }
            return true;
        } else {
            return false;
        }
    }
}