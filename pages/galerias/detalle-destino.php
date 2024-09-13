<?php
require_once '../../app/controller/config.php';
require_once '../../app/controller/imagenes/delete.php';
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

<link rel="stylesheet" href="<?php echo $URL; ?>public/css/galerias/crudImage.min.css" />

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
                                            <button class="btn btn-edit btn-success" title="Editar">
                                                <i class="fas fa-pencil-alt"></i>
                                            </button>
                                            <!-- Botón de eliminar con llamada AJAX -->
                                            <button class="btn btn-delete btn-danger" title="Eliminar" >
                                                <i class="fas fa-trash-alt"></i> 
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p>No hay imágenes disponibles para este destino.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function eliminarImagen(id_imagen, url_imagen, element) {
        if (confirm('¿Estás seguro de que quieres eliminar esta imagen?')) {
            var xhr = new XMLHttpRequest();
            xhr.open('POST', '../../app/controller/imagenes/delete.php', true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

            // Manejar la respuesta del servidor
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    var respuesta = xhr.responseText;
                    if (respuesta.trim() === 'success') {
                        // Eliminar la imagen del DOM
                        var card = element.closest('.col-md-4');
                        card.remove();
                    } else {
                        alert('Error al eliminar la imagen: ' + respuesta);
                    }
                }
            };

            // Enviar la solicitud con los datos necesarios
            xhr.send('id_imagen=' + id_imagen + '&url_imagen=' + encodeURIComponent(url_imagen));
        }
    }
</script>

<?php include '../layouts/footer.php'; ?>