<?php
require_once dirname(__DIR__) . '/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre_categoria = $_POST['nombre_categoria'];
    $cod_categoria = $_POST['cod_categoria'];
    $descripcion_categoria = $_POST['descripcion_categoria'];

    $stmt = $pdo->prepare("INSERT INTO categorias (nombre_categoria, cod_categoria, descripcion_categoria) VALUES (?, ?, ?)");
    if ($stmt->execute([$nombre_categoria, $cod_categoria, $descripcion_categoria])) {
        echo "Nueva categoría registrada exitosamente";
    } else {
        echo "Error al registrar la categoría";
    }
}
