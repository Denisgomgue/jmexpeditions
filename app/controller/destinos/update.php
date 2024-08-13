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
    $foto1_name = !empty($_FILES['fotos']['name'][0]) ? $_FILES['fotos']['name'][0] : null;
    $foto2_name = !empty($_FILES['fotos']['name'][1]) ? $_FILES['fotos']['name'][1] : null;
    $foto3_name = !empty($_FILES['fotos']['name'][2]) ? $_FILES['fotos']['name'][2] : null;

    // Rutas temporales
    $foto1_tmp = !empty($_FILES['fotos']['tmp_name'][0]) ? $_FILES['fotos']['tmp_name'][0] : null;
    $foto2_tmp = !empty($_FILES['fotos']['tmp_name'][1]) ? $_FILES['fotos']['tmp_name'][1] : null;
    $foto3_tmp = !empty($_FILES['fotos']['tmp_name'][2]) ? $_FILES['fotos']['tmp_name'][2] : null;

    // Definir destinos
    $foto1_dest = $upload_dir . basename($foto1_name);
    $foto2_dest = $upload_dir . basename($foto2_name);
    $foto3_dest = $upload_dir . basename($foto3_name);

    // Mover archivos si están presentes
    if ($foto1_tmp) move_uploaded_file($foto1_tmp, $foto1_dest);
    if ($foto2_tmp) move_uploaded_file($foto2_tmp, $foto2_dest);
    if ($foto3_tmp) move_uploaded_file($foto3_tmp, $foto3_dest);

    // Preparar la actualización
    $sql = "UPDATE destinos SET nombre_destino = :nombre, ubicacion_destino = :ubicacion, region_destino = :region, 
            provincia_destino = :provincia, parque_reserva_destino = :parque_reserva, 
            codigo_destino = :codigo, id_categoria = :categoria, dias_destino = :numero_dias, 
            descripcion_destino = :descripcion" . 
            ($foto1_name ? ", imagen1_destino = :imagen1" : "") . 
            ($foto2_name ? ", imagen2_destino = :imagen2" : "") . 
            ($foto3_name ? ", imagen3_destino = :imagen3" : "") . 
            " WHERE id_destino = :id_destino";

    $stmt = $pdo->prepare($sql);

    $params = [
        ':nombre' => $nombre,
        ':ubicacion' => $ubicacion,
        ':region' => $region,
        ':provincia' => $provincia,
        ':parque_reserva' => $parque_reserva,
        ':codigo' => $codigo,
        ':categoria' => $categoria,
        ':numero_dias' => $numero_dias,
        ':descripcion' => $descripcion,
        ':id_destino' => $id_destino
    ];

    if ($foto1_name) $params[':imagen1'] = $foto1_name;
    if ($foto2_name) $params[':imagen2'] = $foto2_name;
    if ($foto3_name) $params[':imagen3'] = $foto3_name;

    $stmt->execute($params);

    header("Location: ../../../pages/destinos/index.php?message=" . urlencode("El destino se actualizó con éxito"));
    exit();
} else {
    echo "No se ha enviado ningún formulario.";
}
