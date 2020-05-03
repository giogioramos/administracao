<?php 

verificarValidadeSessao();

$busca = new STMT();
$sql = 'SELECT id, nome, datanascimento, cpf, rg, telefone FROM cliente';
$arr = $busca->executarQuery($sql);

if (isset($_GET['excluir'])) {
    $sql = 'DELETE FROM cliente WHERE id = ?';
    $params = [$_GET['excluir']];
    $arr = $busca->executarQuery($sql, $params);
    header("Location: ./?page=lista");
}

require_once('core/template/lista.php');