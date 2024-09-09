<?php
require_once '../../app/controller/config.php';
include '../layouts/header.php';

// Obtener el nombre del destino desde la URL
$nombre_destino = isset($_GET['nombre_destino']) ? urldecode($_GET['nombre_destino']) : '';

// Consultar el ID del destino según su nombre
$sql_destino = "SELECT id_destino FROM destinos WHERE nombre_destino = :nombre_destino";
$stmt_destino = $pdo->prepare($sql_destino);
$stmt_destino->execute([':nombre_destino' => $nombre_destino]);
$destino = $stmt_destino->fetch();

if ($destino) {
    $id_destino = $destino['id_destino'];

    // Consultar todas las imágenes del destino
    $sql_imagenes = "SELECT url_imagen FROM imagenes_destinos WHERE id_destino = :id_destino";
    $stmt_imagenes = $pdo->prepare($sql_imagenes);
    $stmt_imagenes->execute([':id_destino' => $id_destino]);
    $imagenes = $stmt_imagenes->fetchAll();
} else {
    $imagenes = [];
}
?>



<div class="container">
    <div class="page-inner">
        <div class="card">
            <div class="card-header">
                <h1><?php echo htmlspecialchars($nombre_destino); ?></h1>
                <button id="toggle-view" class="btn btn-primary mb-4">Modo Diapositiva</button>
            </div>
            <div class="card-body">
                <div class="row image-gallery">
                    <?php if (count($imagenes) > 0): ?>
                        <?php foreach ($imagenes as $imagen): ?>
                            <a href="../../public/uploads/photos/<?php echo htmlspecialchars($imagen['url_imagen']); ?>"
                               class="col-6 col-md-3 mb-4 image-popup"
                               data-mfp-src="../../public/uploads/photos/<?php echo htmlspecialchars($imagen['url_imagen']); ?>">
                                <img src="../../public/uploads/photos/<?php echo htmlspecialchars($imagen['url_imagen']); ?>"
                                     alt="Imagen del destino" class="img-fluid">
                            </a>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p>No hay imágenes disponibles para este destino.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>




<?php include '../layouts/footer.php'; ?>