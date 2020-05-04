<?php

Class Endereco extends STMT {
    private $id;
    private $rua;
    private $numero;
    private $bairro;
    private $cep;
    private $complemento;
    private $cidade;
    private $estado;
    private $idCliente;

    public function __construct($rua, $numero, $bairro, $cep, $complemento, $cidade, $estado, $id){
        $this->rua = $rua;
        $this->numero = $numero;
        $this->bairro = $bairro;
        $this->cep = $cep;
        $this->complemento = $complemento;
        $this->cidade = $cidade;
        $this->estado = $estado;
        $this->id = $id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getId(){
        return $this->id;
    }

    public function setRua($rua){
        $this->rua = $rua;
    }

    public function getRua(){
        return $this->rua;
    }

    public function setNumero($numero){
        $this->numero = $numero;
    }

    public function getNumero(){
        return $this->numero;
    }
    
    public function setBairro($bairro){
        $this->bairro = $bairro;
    }

    public function getBairro(){
        return $this->bairro;
    }
    
    public function setCep($cep){
        $this->cep = $cep;
    }

    public function getCep(){
        return $this->cep;
    }
    
    public function setComplemento($complemento){
        $this->complemento = $complemento;
    }

    public function getComplemento(){
        return $this->complemento;
    }
    
    public function setCidade($cidade){
        $this->cidade = $cidade;
    }

    public function getCidade(){
        return $this->cidade;
    }
    
    public function setEstado($estado){
        $this->estado = $estado;
    }

    public function getEstado(){
        return $this->estado;
    }

    public function setIdCliente($idCliente){
        $this->idCliente = $idCliente;
    }

    public function getIdCliente(){
        return $this->idCliente;
    }

    public function inserir() {
        if (!empty($this->idCliente)) {
            $sql = 'INSERT INTO endereco (rua, numero, bairro, cep, complemento, cidade, estado, id_cliente) '.
                   'VALUES (?, ?, ?, ?, ?, ?, ?, ?)';
            $params = [
                $this->rua, 
                $this->numero, 
                $this->bairro, 
                $this->cep, 
                $this->complemento, 
                $this->cidade, 
                $this->estado, 
                $this->idCliente
            ];
            $this->executarQuery($sql, $params);
        }
    }

    public function atualizar($id) {   
        $sql = 'UPDATE endereco SET rua=?, numero=?, bairro=?, cep=?, complemento=?, cidade=?, estado=? '.
               'WHERE id = ?';
        $params = [
            $this->rua, 
            $this->numero, 
            $this->bairro, 
            $this->cep, 
            $this->complemento, 
            $this->cidade, 
            $this->estado, 
            $id
        ];
        $this->executarQuery($sql, $params);
    }

}