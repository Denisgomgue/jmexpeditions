<?php
require_once dirname(__DIR__) . '/config.php';

if (isset($_GET['nombre_paquete'])) { 
    $nombre_paquete = $_GET['nombre_paquete'];
    $sql_check = "SELECT COUNT(*) FROM paquetes WHERE nombre_paquete = :nombre_paquete";
    $query_check = $pdo->prepare($sql_check);
    $query_check->bindParam(':nombre_paquete', $nombre_paquete, PDO::PARAM_STR);
    $query_check->execute();
    $existe = $query_check->fetchColumn();

    echo json_encode(['existe' => $existe > 0]);
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Verifica que todos los campos necesarios estén presentes
    if (isset($_POST['nombre_paquete']) && isset($_POST['duracion_paquete']) && isset($_POST['precio_paquete']) 
        && isset($_POST['disponibilidad_paquete']) && isset($_POST['descripcion_paquete']) 
        && isset($_POST['tipo_paquete']) && isset($_POST['noche_paquete'])) { // Agregar noche_paquete

        // Recibe los valores del formulario
        $nombre_paquete = $_POST['nombre_paquete'];
        $duracion_paquete = $_POST['duracion_paquete'];
        $precio_paquete = $_POST['precio_paquete'];
        $disponibilidad_paquete = $_POST['disponibilidad_paquete'];
        $descripcion_paquete = $_POST['descripcion_paquete'];
        $tipo_paquete = $_POST['tipo_paquete'];
        $noche_paquete = $_POST['noche_paquete']; // Agregar el campo noche_paquete

        try {
            // Inserta los datos en la base de datos
            $stmt = $pdo->prepare("INSERT INTO paquetes (nombre_paquete, descripcion_paquete, duracion_paquete, tipo_paquete, precio_paquete, disponibilidad_paquete, noche_paquete) 
                                   VALUES (?, ?, ?, ?, ?, ?, ?)"); // Incluir noche_paquete

            if ($stmt->execute([$nombre_paquete, $descripcion_paquete, $duracion_paquete, $tipo_paquete, $precio_paquete, $disponibilidad_paquete, $noche_paquete])) {
                // Redirige a la página de éxito
                header('Location: ../../../pages/paquetes/index.php?status=success&message=registrado');
                exit();
            } else {
                // Redirige en caso de error en la inserción
                header("Location: ../../../pages/paquetes/index.php?status=error&message=insert_error&entity=" . urlencode("Paquete"));
                exit();
            }
        } catch (PDOException $e) {
            // Redirige en caso de error de base de datos
            header('Location: ../../../pages/paquetes/index.php?status=error&message=db_error');
            exit();
        }
    } else {
        // Redirige si faltan datos en el formulario
        header("Location: ../../../pages/paquetes/index.php?status=error&message=missing_data&entity=" . urlencode("Paquete"));
        exit();
    }
}
?>
