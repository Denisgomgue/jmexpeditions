<?php
require_once dirname(__DIR__) . '/config.php'; // Asegúrate de que la ruta a config.php es correcta

// Verifica si $pdo está definido
if (!isset($pdo)) {
    die("No se pudo conectar a la base de datos.");
}

// Verificar si se recibió el ID del destino a eliminar
if (isset($_GET['id'])) {
    $id_destino = $_GET['id'];

    try {
        // Eliminar el destino de la base de datos
        $sql = "DELETE FROM categorias WHERE id_categoria = :id_categoria";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':id_categoria' => $id_categoria]);

        // Redireccionar a la lista de categorías después de eliminar
        header("Location: ../../../pages/categorias/index.php?message=" . urlencode("La categoría ha sido eliminada con éxito"));
        exit();
       
    } catch (PDOException $e) {
        echo "Error al eliminar el destino: " . $e->getMessage();
    }
} else {
    echo "ID del destino no especificado.";
}
