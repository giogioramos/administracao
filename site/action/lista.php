<?php 

verificarValidadeSessao();

$busca = new STMT();
$sql = 'SELECT id, nome, data_nascimento, cpf, rg, telefone FROM cliente';
$arr = $busca->executarQuery($sql);

if (isset($_GET['excluir'])) {
    $sql = 'DELETE FROM cliente WHERE id = ?';
    $params = [$_GET['excluir']];
    $busca->executarQuery($sql, $params);
    
    $sql = 'DELETE FROM endereco WHERE id_cliente = ?';
    $params = [$_GET['excluir']];
    $busca->executarQuery($sql, $params);
    header("Location: ./?page=lista");
}

require_once('core/template/lista.php');