<?php
require_once dirname(__DIR__) . '/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['nombre_paquete']) && isset($_POST['duracion_paquete']) && isset($_POST['precio_paquete']) 
        && isset($_POST['disponibilidad_paquete']) && isset($_POST['descripcion_paquete'])) {

        $nombre_paquete = $_POST['nombre_paquete'];
        $duracion_paquete = $_POST['duracion_paquete'];
        $precio_paquete = $_POST['precio_paquete'];
        $disponibilidad_paquete = $_POST['disponibilidad_paquete'];
        $descripcion_paquete = $_POST['descripcion_paquete'];

        try {
            $stmt = $pdo->prepare("INSERT INTO paquetes (nombre_paquete, duracion_paquete, precio_paquete, disponibilidad_paquete, descripcion_paquete) 
                                   VALUES (?, ?, ?, ?, ?)");
            if ($stmt->execute([$nombre_paquete, $duracion_paquete, $precio_paquete, $disponibilidad_paquete, $descripcion_paquete])) {
                // Redirige a la página de éxito o muestra un mensaje
                header("Location: ../../../pages/paquetes/index.php?status=success&message=registrado&entity=" . urlencode("Paquete"));
                exit();
            } else {
                header("Location: ../../../pages/paquetes/index.php?status=error&message=insert_error&entity=" . urlencode("Paquete"));
                exit();
            }
        } catch (PDOException $e) {
            header("Location: ../../../pages/paquetes/index.php?status=error&message=database_error&entity=" . urlencode("Paquete"));
            exit();
        }
    } else {
        header("Location: ../../../pages/paquetes/index.php?status=error&message=missing_data&entity=" . urlencode("Paquete"));
        exit();
    }
}
