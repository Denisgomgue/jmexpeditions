<?php
require_once dirname(__DIR__) . '/config.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recibir datos del formulario
    $nombre = $_POST['nombre'];
    $ubicacion = $_POST['ubicacion'];
    $departamento = $_POST['departamento'];
    $provincia = $_POST['provincia'];
    $codigo = $_POST['codigo'];
    $categoria = $_POST['categoria'];
    $numero_dias = $_POST['numero_dias'];
    $descripcion = $_POST['descripcion'];

    // Ruta para almacenar las imágenes
    $upload_dir = __DIR__ . '/../public/uploads/';
    // Cambia esta ruta a tu directorio de subida

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

    // Mover archivos
    move_uploaded_file($foto1_tmp, $foto1_dest);
    move_uploaded_file($foto2_tmp, $foto2_dest);
    move_uploaded_file($foto3_tmp, $foto3_dest);

    // Insertar datos en la base de datos
    $sql = "INSERT INTO destinos (nombre_destino, ubicacion_destino, region_destino, provincia_destino, id_destino, id_categoria, dias_destino, descripcion_destino, imagen1_destino, imagen2_destino, imagen3_destino) VALUES (:nombre, :ubicacion, :departamento, :provincia, :codigo, :categoria, :numero_dias, :descripcion, :imagen1, :imagen2, :imagen3)";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':nombre' => $nombre,
        ':ubicacion' => $ubicacion,
        ':departamento' => $departamento,
        ':provincia' => $provincia,
        ':codigo' => $codigo,
        ':categoria' => $categoria,
        ':numero_dias' => $numero_dias,
        ':descripcion' => $descripcion,
        ':imagen1' => $foto1_name,
        ':imagen2' => $foto2_name,
        ':imagen3' => $foto3_name
    ]);

    echo "Enviado formulario.";
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