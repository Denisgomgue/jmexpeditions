<?php

require_once dirname(__DIR__) . '/config.php'; // Ajusta la ruta según la ubicación de tu archivo config.php

// Verifica si $pdo está definido
if (!isset($pdo)) {
    die("No se pudo conectar a la base de datos.");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recibir datos del formulario
    $id_destino = $_POST['id_destino'];
    $nombre_destino = $_POST['nombre_destino'];
    $codigo_destino = $_POST['codigo_destino'];
    $ubicacion_destino = $_POST['ubicacion_destino'];
    $region_destino = $_POST['region_destino'];
    $provincia_destino = $_POST['provincia_destino'];
    $dias_destino = $_POST['dias_destino'];
    $descripcion_destino = $_POST['descripcion_destino'];

    try {
        // Actualizar datos en la base de datos
        $sql = "UPDATE destinos SET nombre_destino = :nombre_destino, 
                                    codigo_destino = :codigo_destino, 
                                    ubicacion_destino = :ubicacion_destino, 
                                    region_destino = :region_destino, 
                                    provincia_destino = :provincia_destino, 
                                    dias_destino = :dias_destino, 
                                    descripcion_destino = :descripcion_destino 
                WHERE id_destino = :id_destino";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':nombre_destino' => $nombre_destino,
            ':codigo_destino' => $codigo_destino,
            ':ubicacion_destino' => $ubicacion_destino,
            ':region_destino' => $region_destino,
            ':provincia_destino' => $provincia_destino,
            ':dias_destino' => $dias_destino,
            ':descripcion_destino' => $descripcion_destino,
            ':id_destino' => $id_destino
        ]);

        // Redireccionar a la lista de destinos después de actualizar
        header("Location: ../../../pages/destinos/index.php"); // Cambia esta ruta a la ubicación de tu página de lista de destinos
        exit();
    } catch (PDOException $e) {
        echo "Error al actualizar el destino: " . $e->getMessage();
    }
} else {
    echo "No se ha enviado ningún formulario.";
}


