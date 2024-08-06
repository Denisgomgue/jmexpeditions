<?php
require_once dirname(__DIR__) . '/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_categoria = $_POST['id_categoria_act'];
    $cod_categoria = $_POST['cod_categoria_act'];
    $nombre_categoria = $_POST['nombre_categoria_act'];
    $descripcion_categoria = $_POST['descripcion_categoria_act'];

    $stmt = $pdo->prepare('UPDATE categorias SET cod_categoria = ?, nombre_categoria = ?, descripcion_categoria = ? WHERE id_categoria = ?');
    $stmt->execute([$cod_categoria, $nombre_categoria, $descripcion_categoria, $id_categoria]);

    header('Location: ../../index.php');
}
?>
