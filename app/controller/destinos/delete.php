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
        $sql = "DELETE FROM destinos WHERE id_destino = :id_destino";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':id_destino' => $id_destino]);

        // Redireccionar a la lista de destinos después de eliminar
        header("Location: ../../../pages/destinos/index.php?message=" . urlencode("El destino ha sido eliminado con éxito"));
        exit();
        header("Location: ../../../pages/destinos/")
    } catch (PDOException $e) {
        echo "Error al eliminar el destino: " . $e->getMessage();
    }
} else {
    echo "ID del destino no especificado.";
}
