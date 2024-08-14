<?php
require_once dirname(__DIR__) . '/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['nombre_categoria']) && isset($_POST['cod_categoria']) && isset($_POST['descripcion_categoria'])) {
        $nombre_categoria = $_POST['nombre_categoria'];
        $cod_categoria = $_POST['cod_categoria'];
        $descripcion_categoria = $_POST['descripcion_categoria'];

        try {
            $stmt = $pdo->prepare("INSERT INTO categorias (nombre_categoria, cod_categoria, descripcion_categoria) VALUES (?, ?, ?)");
            if ($stmt->execute([$nombre_categoria, $cod_categoria, $descripcion_categoria])) {
                // Redirige a la página de éxito o muestra un mensaje
                header("Location: ../../../pages/categorias/index.php?message=" . urlencode("La categoria se registró con éxito"));
                exit();
            } else {
                echo "Error al registrar la categoría";
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

