<?php
include '../../app/controller/config.php';
include '../../app/controller/destinos/update.php';
include '../layouts/header.php';

if (isset($_GET['id'])) {
    $id_destino = $_GET['id'];

    try {
        // Consulta para obtener los datos del destino
        $sql = "SELECT * FROM destinos WHERE id_destino = :id_destino";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':id_destino' => $id_destino]);
        $destino = $stmt->fetch(PDO::FETCH_ASSOC);

        // Verificar si se obtuvieron datos del destino
        if (!$destino) {
            die("Destino no encontrado.");
        }
    } catch (PDOException $e) {
        die("Error al obtener los datos del destino: " . $e->getMessage());
    }
} else {
    die("ID del destino no especificado.");
}

?>

<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Editar Destino</h3>
        </div>

        <div class="col m-0">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Formulario de Edición</div>
                    </div>
                    <div class="card-body">
                        <form action="../../app/controller/destinos/update.php" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id_destino" value="<?php echo htmlspecialchars($destino['id_destino']); ?>">

                            <div class="row form-group">
                                <div class="col-md-6">
                                    <label for="nombre_destino">Nombre del destino:</label>
                                    <input type="text" class="form-control" id="nombre_destino" name="nombre_destino" value="<?php echo htmlspecialchars($destino['nombre_destino']); ?>" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="codigo_destino">Código del destino:</label>
                                    <input type="text" class="form-control" id="codigo_destino" name="codigo_destino" value="<?php echo htmlspecialchars($destino['codigo_destino']); ?>" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label for="ubicacion_destino">Ubicación:</label>
                                    <input type="text" class="form-control" id="ubicacion_destino" name="ubicacion_destino" value="<?php echo htmlspecialchars($destino['ubicacion_destino']); ?>" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="region_destino">Región:</label>
                                    <input type="text" class="form-control" id="region_destino" name="region_destino" value="<?php echo htmlspecialchars($destino['region_destino']); ?>" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="provincia_destino">Provincia:</label>
                                    <input type="text" class="form-control" id="provincia_destino" name="provincia_destino" value="<?php echo htmlspecialchars($destino['provincia_destino']); ?>" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="dias_destino">Número de días:</label>
                                    <input type="number" class="form-control" id="dias_destino" name="dias_destino" value="<?php echo htmlspecialchars($destino['dias_destino']); ?>" required>
                                </div>
                                <div class="col-md-12">
                                    <label for="descripcion_destino">Descripción:</label>
                                    <textarea id="descripcion_destino" class="form-control" name="descripcion_destino" required><?php echo htmlspecialchars($destino['descripcion_destino']); ?></textarea>
                                </div>
                            </div>

                            <div class="card-action">
                                <button type="submit" class="btn btn-info">Actualizar</button>
                                <button type="button" class="btn btn-secondary" onclick="window.location.href='index.php';">Cancelar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include '../layouts/footer.php'; ?>

</body>
</html>
