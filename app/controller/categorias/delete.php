<?php
require_once dirname(__DIR__) . '/config.php';

if (isset($_GET['id'])) {
    $id_categoria = $_GET['id'];

    $stmt = $pdo->prepare("DELETE FROM categorias WHERE id_categoria = ?");
    if ($stmt->execute([$id_categoria])) {
        echo "Categoría eliminada exitosamente";
    } else {
        echo "Error al eliminar la categoría";
    }
}
?>
