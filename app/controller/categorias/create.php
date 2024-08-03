<?php
require_once dirname(__DIR__) . '/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['nombre_categoria']) && isset($_POST['descripcion_categoria'])) {
        $id_categoria = $_POST['id_categoria']; // Asegúrate de que este campo se está enviando
        $nombre_categoria = $_POST['nombre_categoria'];
        $descripcion_categoria = $_POST['descripcion_categoria'];

        try {
            $sql = "INSERT INTO categorias (id_categoria, nombre_categoria, descripcion_categoria) VALUES (:id_categoria, :nombre_categoria, :descripcion_categoria)";
            $stmt = $pdo->prepare($sql);

            $stmt->bindParam(':id_categoria', $id_categoria);
            $stmt->bindParam(':nombre_categoria', $nombre_categoria);
            $stmt->bindParam(':descripcion_categoria', $descripcion_categoria);

            if ($stmt->execute()) {
                echo "Categoría registrada exitosamente.";
            } else {
                echo "Error al registrar la categoría.";
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    } else {
        echo "Datos del formulario no están establecidos.";
    }
} else {
    echo "Método de solicitud no permitido.";
}
?>
