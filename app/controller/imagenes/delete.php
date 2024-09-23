<?php
require_once dirname(__DIR__) . '/config.php';

if (isset($_POST['id_imagen']) && filter_var($_POST['id_imagen'], FILTER_VALIDATE_INT)) {
    $id_imagen = $_POST['id_imagen'];  // Validar que el id sea un número entero

    try {
        // Comprobar si la imagen existe antes de intentar eliminarla
        $checkStmt = $pdo->prepare("SELECT url_imagen FROM imagenes_destinos WHERE id_imagen = ?");
        $checkStmt->execute([$id_imagen]);
        $imagen = $checkStmt->fetch(PDO::FETCH_ASSOC);

        if (!$imagen) {
            // Redirigir si no se encuentra el registro
            header("Location: ../../../pages/galerias/detalle-destino.php?status=error&message=imagen_no_encontrada&entity=Imagen");
            exit();
        }

        // Iniciar la transacción
        $pdo->beginTransaction();

        // Eliminar el registro de la imagen de la base de datos
        $stmt = $pdo->prepare("DELETE FROM imagenes_destinos WHERE id_imagen = ?");
        if ($stmt->execute([$id_imagen])) {
            // Eliminar el archivo de imagen física del servidor
            $rutaImagen = '../../public/uploads/photos/' . $imagen['url_imagen'];

            // $directorio_subida = '../../public/uploads/photos/';
            if (file_exists($rutaImagen)) {
                unlink($rutaImagen); // Eliminar el archivo
            }

            // Confirmar la transacción
            $pdo->commit();
            // Redirigir con un mensaje de éxito
            header("Location: ../../../pages/galerias/index.php?status=success&message=imagen_eliminada&entity=Imagen");
            exit();
        } else {
            // Revertir la transacción en caso de fallo
            $pdo->rollBack();
            // Redirigir con un mensaje de error
            header("Location: ../../../pages/galerias/detalle-destino.php?status=error&message=error_eliminando&entity=Imagen");
            exit();
        }
    } catch (PDOException $e) {
        // Revertir la transacción si hay una excepción
        $pdo->rollBack();
        // Registrar el error en el log del servidor
        error_log("Error eliminando imagen: " . $e->getMessage());
        // Redirigir con un mensaje de error
        header("Location: ../../../pages/galerias/detalle-destino.php?status=error&message=" . urlencode($e->getMessage()) . "&entity=Imagen");
        exit();
    }
} 