<?php
require_once dirname(__DIR__) . '/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
<<<<<<< HEAD
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
=======
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
>>>>>>> 75bde39f1873fb24bd8c9fab7abd5c405b7c0ee5
