<?php
require_once '../../app/controller/config.php';

// Verificar si se recibió el ID de la imagen
if (isset($_POST['id_imagen']) && isset($_POST['url_imagen'])) {
    $id_imagen = $_POST['id_imagen'];
    $url_imagen = $_POST['url_imagen'];

    try {
        // Iniciar la transacción
        $pdo->beginTransaction();

        // 1. Eliminar el registro de la imagen en la base de datos
        $sql = "DELETE FROM imagenes_destinos WHERE id_imagen = :id_imagen";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':id_imagen' => $id_imagen]);

        // 2. Eliminar el archivo de la imagen del servidor
        $ruta_imagen = '../../public/uploads/photos/' . $url_imagen;
        if (file_exists($ruta_imagen)) {
            unlink($ruta_imagen);  // Eliminar el archivo físico
        }

        // Confirmar la transacción
        $pdo->commit();

        // Responder con éxito
        echo 'success';
    } catch (Exception $e) {
        // Hacer rollback y mostrar mensaje de error
        $pdo->rollBack();
        echo 'Error al eliminar la imagen: ' . $e->getMessage();
    }
} 
