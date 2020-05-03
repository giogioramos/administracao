<?php

Class STMT extends Conexao {
    public function executarQuery($sql, $params = []){
        $stmt = $this->conectar()->prepare($sql);
        $stmt->execute($params);
        $res = $stmt->fetchAll();
        $stmt = null;
        return $res;
    }
}
