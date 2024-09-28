<?php
require_once dirname(__DIR__) . '/config.php'; // Asegúrate de que la ruta sea correcta

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
        pa.duracion_paquete as duracion_paquete,  -- Cambiado según el nuevo esquema
        pa.tipo_paquete as tipo_paquete,  -- Nuevo campo
        pa.precio_paquete as precio_paquete,      -- Cambiado según el nuevo esquema
        pa.noches_paquete as noches_paquete,      -- Cambiado según el nuevo esquema
        pa.disponibilidad_paquete as disponibilidad_paquete 
        FROM paquetes as pa";

    // Preparar y ejecutar la consulta
    $query_paquetes = $pdo->prepare($sql_paquetes);
    $query_paquetes->execute();
    $paquetes_datos = $query_paquetes->fetchAll(PDO::FETCH_ASSOC);

    // Verificar si se obtienen datos
    if ($paquetes_datos === false) {
        echo "Error en la consulta: ";
        var_dump($query_paquetes->errorInfo());
    } elseif (empty($paquetes_datos)) {
        // Si no hay paquetes, asignar un array vacío
        $paquetes_datos = [];
        echo "No se encontraron paquetes.";
    }
    
} catch (PDOException $e) {
    echo "Error en la consulta: " . $e->getMessage();
}
