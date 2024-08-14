<?php
require_once dirname(__DIR__) . '/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recibir datos del formulario
    $id_destino = $_POST['id_destino'];
    $nombre_destino = $_POST['nombre_destino'];
    $ubicacion_destino = $_POST['ubicacion_destino'];
    $id_departamento = $_POST['id_departamento']; // Cambiado
    $id_provincia = $_POST['id_provincia']; // Cambiado
    $parque_reserva_destino = $_POST['parque_reserva_destino'];
    $id_categoria = $_POST['id_categoria'];
    $dias_destino = $_POST['dias_destino'];
    $descripcion_destino = $_POST['descripcion_destino'];
    
    // Ruta para almacenar las imágenes
    $upload_dir = __DIR__ . '/../public/uploads/';

    // Manejar archivos subidos
    $fotos = $_FILES['fotos'];
    $imageFields = ['imagen1_destino', 'imagen2_destino', 'imagen3_destino'];
    $params = [];
    
    foreach ($imageFields as $index => $field) {
        if (!empty($fotos['name'][$index])) {
            $fileName = basename($fotos['name'][$index]);
            $fileTmp = $fotos['tmp_name'][$index];
            $fileDest = $upload_dir . $fileName;

            // Mover archivo
            if (move_uploaded_file($fileTmp, $fileDest)) {
                $params[":$field"] = $fileName;
            } else {
                die("Error al subir la imagen: $fileName");
            }
        }
    }

    // Preparar la actualización
    $sql = "UPDATE destinos SET 
        nombre_destino = :nombre_destino,
        ubicacion_destino = :ubicacion_destino,
        id_departamento = :id_departamento,
        id_provincia = :id_provincia,
        parque_reserva_destino = :parque_reserva_destino,
        id_categoria = :id_categoria,
        dias_destino = :dias_destino,
        descripcion_destino = :descripcion_destino" . 
        (isset($params[':imagen1_destino']) ? ", imagen1_destino = :imagen1_destino" : "") . 
        (isset($params[':imagen2_destino']) ? ", imagen2_destino = :imagen2_destino" : "") . 
        (isset($params[':imagen3_destino']) ? ", imagen3_destino = :imagen3_destino" : "") . 
        " WHERE id_destino = :id_destino";

    // Preparar parámetros
    $params = array_merge($params, [
        ':nombre_destino' => $nombre_destino,
        ':ubicacion_destino' => $ubicacion_destino,
        ':id_departamento' => $id_departamento,
        ':id_provincia' => $id_provincia,
        ':parque_reserva_destino' => $parque_reserva_destino,
        ':id_categoria' => $id_categoria,
        ':dias_destino' => $dias_destino,
        ':descripcion_destino' => $descripcion_destino,
        ':id_destino' => $id_destino
    ]);

    try {
        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);

        // Redirigir a la lista de destinos o mostrar un mensaje de éxito
        header("Location: ../../../pages/destinos/index.php?message=" . urlencode("El destino se actualizó con éxito"));
        exit();
    } catch (PDOException $e) {
        die("Error al actualizar el destino: " . $e->getMessage());
    }
} else {
    echo "No se ha enviado ningún formulario.";
}
