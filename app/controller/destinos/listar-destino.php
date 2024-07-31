<?php
require_once dirname(__DIR__) . '/config.php';

/**
 require_once  '../config.php';
 * Created by SENATI.
 * User: DENIS
 */
// Verifica si $pdo está definido
if (!isset($pdo)) {
    die("No se pudo conectar a la base de datos.");
}

try {

    $sql_destinos = "SELECT 
        de.id_destino as id_destino, 
        de.nombre_destino as nombre_destino, 
        de.region_destino as region_destino, 
        de.ubicacion_destino as ubicacion_destino, 
        de.provincia_destino as provincia_destino,
        de.dias_destino as dias_destino, 
        de.descripcion_destino as descripcion_destino, 
        cat.nombre_categoria as nombre_categoria 
        FROM destinos as de 
        INNER JOIN categorias as cat ON de.id_categoria = cat.id_categoria ";

    $query_destinos = $pdo->prepare($sql_destinos);
    $query_destinos->execute();
    $destinos_datos = $query_destinos->fetchAll(PDO::FETCH_ASSOC);

    // Depuración: Verificar si se obtienen datos
    if ($destinos_datos === false) {
        echo "Error en la consulta.";
    } elseif (empty($destinos_datos)) {
        echo "No se encontraron datos.";
    }
} catch (PDOException $e) {
    echo "Error en la consulta: " . $e->getMessage();
}

