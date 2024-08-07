<?php
require_once dirname(__DIR__) . '/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recibir datos del formulario
    $id_destino = $_POST['id_destino'];
    $nombre = $_POST['nombre_destino'];
    $ubicacion = $_POST['ubicacion_destino'];
    $region = $_POST['region_destino'];
    $provincia = $_POST['provincia_destino'];
    $parque_reserva = $_POST['parque_reserva_destino'];
    $codigo = $_POST['codigo_destino'];
    $categoria = $_POST['id_categoria'];
    $numero_dias = $_POST['dias_destino'];
    $descripcion = $_POST['descripcion_destino'];

    // Ruta para almacenar las imágenes
    $upload_dir = __DIR__ . '/../public/uploads/';

    // Manejar archivos subidos
    $foto1_name = $_FILES['fotos']['name'][0];
    $foto2_name = $_FILES['fotos']['name'][1];
    $foto3_name = $_FILES['fotos']['name'][2];

    // Rutas temporales
    $foto1_tmp = $_FILES['fotos']['tmp_name'][0];
    $foto2_tmp = $_FILES['fotos']['tmp_name'][1];
    $foto3_tmp = $_FILES['fotos']['tmp_name'][2];

    // Definir destinos
    $foto1_dest = $upload_dir . basename($foto1_name);
    $foto2_dest = $upload_dir . basename($foto2_name);
    $foto3_dest = $upload_dir . basename($foto3_name);

    // Inicializar variables para las imágenes
    $imagen1 = $imagen2 = $imagen3 = null;

    // Mover archivos solo si se han subido
    if (!empty($foto1_name)) {
        move_uploaded_file($foto1_tmp, $foto1_dest);
        $imagen1 = $foto1_name;
    }
    if (!empty($foto2_name)) {
        move_uploaded_file($foto2_tmp, $foto2_dest);
        $imagen2 = $foto2_name;
    }
    if (!empty($foto3_name)) {
        move_uploaded_file($foto3_tmp, $foto3_dest);
        $imagen3 = $foto3_name;
    }

    // Consulta para actualizar los datos
    $sql = "UPDATE destinos 
            SET nombre_destino = :nombre, 
                ubicacion_destino = :ubicacion, 
                region_destino = :region, 
                provincia_destino = :provincia, 
                parque_reserva_destino = :parque_reserva, 
                codigo_destino = :codigo, 
                id_categoria = :categoria, 
                dias_destino = :numero_dias, 
                descripcion_destino = :descripcion, 
                imagen1_destino = COALESCE(:imagen1, imagen1_destino), 
                imagen2_destino = COALESCE(:imagen2, imagen2_destino), 
                imagen3_destino = COALESCE(:imagen3, imagen3_destino) 
            WHERE id_destino = :id_destino";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':id_destino' => $id_destino,
        ':nombre' => $nombre,
        ':ubicacion' => $ubicacion,
        ':region' => $region,
        ':provincia' => $provincia,
        ':parque_reserva' => $parque_reserva,
        ':codigo' => $codigo,
        ':categoria' => $categoria,
        ':numero_dias' => $numero_dias,
        ':descripcion' => $descripcion,
        ':imagen1' => $imagen1,
        ':imagen2' => $imagen2,
        ':imagen3' => $imagen3
    ]);

    // Mostrar notificación si se pasó el parámetro status
    header("Location: ../../../pages/destinos/index.php?message=" . urlencode("El destino se actualizó con éxito"));
    exit();
} else {
    echo "No se ha enviado ningún formulario.";
}



// Obtener el id_destino desde una consulta o parámetro
/*
$id_destino = 'LARAHUAY81'; // O de la forma en que obtienes el ID

try {
$sql = "SELECT imagen1_destino, imagen2_destino, imagen3_destino FROM destinos WHERE id_destino = :id_destino";
$stmt = $pdo->prepare($sql);
$stmt->execute(['id_destino' => $id_destino]);
$resultado = $stmt->fetch(PDO::FETCH_ASSOC);

if ($resultado) {
$foto1_name = $resultado['imagen1_destino'];
$foto2_name = $resultado['imagen2_destino'];
$foto3_name = $resultado['imagen3_destino'];

} else {
echo "No se encontraron datos para el ID proporcionado.";
}
} catch (PDOException $e) {
echo "Error al consultar la base de datos: " . $e->getMessage();
}
*/