<?php
include '../../app/controller/config.php';
include '../../app/controller/itinerarios/update.php';
include '../layouts/header.php';

if (isset($_GET['id'])) {
    $id_itinerario = $_GET['id'];

    try {
        // Consulta para obtener los datos del itinerario
        $sql = "SELECT * FROM itinerarios WHERE id_itinerario = :id_itinerario";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':id_itinerario' => $id_itinerario]);
        $itinerario = $stmt->fetch(PDO::FETCH_ASSOC);

        // Verificar si se obtuvieron datos del itinerario
        if (!$itinerario) {
            die("Itinerario no encontrado.");
        }
    } catch (PDOException $e) {
        die("Error al obtener los datos del itinerario: " . $e->getMessage());
    }
} else {
    die("ID del itinerario no especificado.");
}
?>
<!-- Incluye SweetAlert2 desde un CDN -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>

<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Editar Itinerario</h3>
        </div>

        <div class="col m-0">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Formulario de Edición</div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <form action="<?php echo $URL; ?>app/controller/itinerarios/update.php" method="post">
                                <input type="hidden" name="id_itinerario" value="<?php echo htmlspecialchars($itinerario['id_itinerario']); ?>">

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="id_paquete">ID Paquete</label>
                                            <input type="text" class="form-control" id="id_paquete" name="id_paquete" value="<?php echo htmlspecialchars($itinerario['id_paquete']); ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="id_destino">ID Destino</label>
                                            <input type="text" class="form-control" id="id_destino" name="id_destino" value="<?php echo htmlspecialchars($itinerario['id_destino']); ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="orden_itinerario">Orden del Itinerario</label>
                                            <input type="number" class="form-control" id="orden_itinerario" name="orden_itinerario" value="<?php echo htmlspecialchars($itinerario['orden_itinerario']); ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="duracion_visita">Duración de la Visita</label>
                                            <input type="text" class="form-control" id="duracion_visita" name="duracion_visita" value="<?php echo htmlspecialchars($itinerario['duracion_visita']); ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="tipo_destino">Tipo de Destino</label>
                                            <input type="text" class="form-control" id="tipo_destino" name="tipo_destino" value="<?php echo htmlspecialchars($itinerario['tipo_destino']); ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="descripcion_actividad">Descripción de la Actividad</label>
                                            <textarea class="form-control" id="descripcion_actividad" name="descripcion_actividad" rows="3" required><?php echo htmlspecialchars($itinerario['descripcion_actividad']); ?></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-action">
                                    <button type="submit" class="btn btn-success">Actualizar</button>
                                    <a href="index.php" class="btn btn-secondary">Cancelar</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
include '../layouts/footer.php'; 
?>
