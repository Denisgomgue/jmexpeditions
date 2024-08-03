<?php
require_once dirname(__DIR__) . '/config.php';

if (isset($_GET['id_categoria'])) {
    $id_categoria = $_GET['id_categoria'];

    try {
        $sql = "DELETE FROM categorias WHERE id_categoria = :id_categoria";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id_categoria', $id_categoria);

        if ($stmt->execute()) {
           
            exit();
        } else {
            echo "Error al eliminar la categoría.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "ID de categoría no proporcionado.";
}

