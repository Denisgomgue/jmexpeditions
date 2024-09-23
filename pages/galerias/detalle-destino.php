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
    $sql_imagenes = "SELECT id_imagen, url_imagen FROM imagenes_destinos WHERE id_destino = :id_destino";
    $stmt_imagenes = $pdo->prepare($sql_imagenes);
    $stmt_imagenes->execute([':id_destino' => $id_destino]);
    $imagenes = $stmt_imagenes->fetchAll();
} else {
    $imagenes = [];
}
?>

<link rel="stylesheet" href="<?php echo htmlspecialchars($URL); ?>public/css/galerias/crudImage.min.css" />

<div class="container">
    <div class="page-inner">
        <div class="card">
            <div class="card-header">
                <h3><?php echo htmlspecialchars($nombre_destino); ?></h3>
            </div>
            <div class="card-body">
                <div class="row image-gallery">
                    <?php if (count($imagenes) > 0): ?>
                        <?php foreach ($imagenes as $imagen): ?>
                            <div class="col-md-4 col-sm-6">
                                <div class="card text-white gallery-inner">
                                    <div class="image-container">
                                        <a href="../../public/uploads/photos/<?php echo htmlspecialchars($imagen['url_imagen']); ?>"
                                            class="image-popup"
                                            data-mfp-src="../../public/uploads/photos/<?php echo htmlspecialchars($imagen['url_imagen']); ?>">
                                            <div class="gallery-item">
                                                <img src="../../public/uploads/photos/<?php echo htmlspecialchars($imagen['url_imagen']); ?>"
                                                    alt="Imagen del destino" class="img-fluid card-img">
                                            </div>
                                        </a>
                                        <div class="image-actions">
                                            <!-- Botón de Editar -->                
                                                <a href="editar-imagen.php?id_imagen=<?php echo htmlspecialchars($imagen['id_imagen']); ?>"
                                                    class="btn text-center btn-info">
                                                    <i class="fas fa-ellipsis-h"></i>
                                                </a>
                                            

                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="alert alert-warning text-center" role="alert">
                            No hay imágenes disponibles para este destino.
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>



<?php
// include '../layouts/modal.php';
include '../layouts/footer.php'; ?>
