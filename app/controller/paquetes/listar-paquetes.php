<?php
require_once dirname(__DIR__) . '/config.php';

/**
 * Created by SENATI.
 * User: DENIS
 * Date: 04/09/2024
 * Time: 15:00
 */

// Verifica si $pdo está definido y si la conexión es válida
if (!isset($pdo)) {
    die("No se pudo conectar a la base de datos.");
}

try {
    // Consulta para obtener los paquetes, incluyendo datos relacionados
    $sql_paquetes = "SELECT 
        pa.id_paquete as id_paquete, 
        pa.nombre_paquete as nombre_paquete, 
        pa.duracion_paquete as duracion_paquete, 
        pa.precio_paquete as precio_paquete, 
        pa.disponibilidad_paquete as disponibilidad_paquete 
        FROM paquetes as pa";

    // Preparar y ejecutar la consulta
    $query_paquetes = $pdo->prepare($sql_paquetes);
    $query_paquetes->execute();
    $paquetes_datos = $query_paquetes->fetchAll(PDO::FETCH_ASSOC);

    // Verificar si se obtienen datos
    if ($paquetes_datos === false) {
        echo "Error en la consulta.";
    } elseif (empty($paquetes_datos)) {
        echo "No se encontraron datos.";
    } else {
        // Los datos están disponibles para usar en la parte HTML del archivo.
        // Puedes procesarlos y mostrarlos en la parte HTML del archivo.
    }
} catch (PDOException $e) {
    echo "Error en la consulta: " . $e->getMessage();
}
?>
