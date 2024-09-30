<?php
require_once dirname(__DIR__) . '/config.php';

if (isset($_GET['id'])) {
    $id_paquete = (int)$_GET['id'];

    // Obtener los datos del paquete, incluyendo el nuevo campo
    $stmt = $pdo->prepare("SELECT * FROM paquetes WHERE id_paquete = :id_paquete");
    $stmt->bindParam(':id_paquete', $id_paquete, PDO::PARAM_INT);
    $stmt->execute();
    $paquete = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$paquete) {
        // Manejar el caso donde el paquete no existe
        header("Location: ../../../pages/paquetes/index.php?status=error&message=not_found&entity=" . urlencode("Paquete"));
        exit();
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Verifica que todos los campos necesarios estén presentes
    if (isset($_POST['id_paquete']) && isset($_POST['nombre_paquete']) && isset($_POST['duracion_paquete']) 
        && isset($_POST['precio_paquete']) && isset($_POST['disponibilidad_paquete']) 
        && isset($_POST['descripcion_paquete']) && isset($_POST['tipo_paquete']) 
        && isset($_POST['noche_paquete'])) {  // Verificar el nuevo campo

        // Recibe los valores del formulario
        $id_paquete = $_POST['id_paquete'];
        $nombre_paquete = $_POST['nombre_paquete'];
        $duracion_paquete = $_POST['duracion_paquete'];
        $precio_paquete = $_POST['precio_paquete'];
        $disponibilidad_paquete = $_POST['disponibilidad_paquete'];
        $descripcion_paquete = $_POST['descripcion_paquete'];
        $tipo_paquete = $_POST['tipo_paquete'];
        $noche_paquete = $_POST['noche_paquete'];  // Recibe el nuevo campo

        try {
            // Actualiza los datos en la base de datos
            $stmt = $pdo->prepare("UPDATE paquetes SET nombre_paquete = ?, descripcion_paquete = ?, duracion_paquete = ?, tipo_paquete = ?, precio_paquete = ?, disponibilidad_paquete = ?, noche_paquete = ? WHERE id_paquete = ?");

            if ($stmt->execute([$nombre_paquete, $descripcion_paquete, $duracion_paquete, $tipo_paquete, $precio_paquete, $disponibilidad_paquete, $noche_paquete, $id_paquete])) {
                // Redirige a la página de éxito
                header('Location: ../../../pages/paquetes/index.php?status=success&message=actualizado');
                exit();
            } else {
                // Redirige en caso de error en la actualización
                header("Location: ../../../pages/paquetes/index.php?status=error&message=update_error&entity=" . urlencode("Paquete"));
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
