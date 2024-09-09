<?php
require_once dirname(__DIR__) . '/config.php';

$departamento = isset($_GET['departamento']) ? $_GET['departamento'] : '';
$provincia = isset($_GET['provincia']) ? $_GET['provincia'] : '';
$categoria = isset($_GET['categoria']) ? $_GET['categoria'] : '';
$ubicacion = isset($_GET['ubicacion']) ? $_GET['ubicacion'] : '';

// Construir la consulta de destino
$query = "SELECT d.*, c.nombre_categoria, p.nombre_provincia, dep.nombre_departamento
          FROM destinos d
          LEFT JOIN categorias c ON d.id_categoria = c.id_categoria
          LEFT JOIN provincias p ON d.id_provincia = p.id_provincia
          LEFT JOIN departamentos dep ON p.id_departamento = dep.id_departamento
          WHERE 1=1";

// Agregar filtros a la consulta
if ($departamento) {
    $query .= " AND dep.id_departamento = :departamento";
}
if ($provincia) {
    $query .= " AND p.id_provincia = :provincia";
}
if ($categoria) {
    $query .= " AND d.id_categoria = :categoria";
}
if ($ubicacion) {
    $query .= " AND d.ubicacion_destino LIKE :ubicacion";
}

$stmt = $pdo->prepare($query);

// Asignar parámetros de filtro
if ($departamento) {
    $stmt->bindParam(':departamento', $departamento, PDO::PARAM_INT);
}
if ($provincia) {
    $stmt->bindParam(':provincia', $provincia, PDO::PARAM_INT);
}
if ($categoria) {
    $stmt->bindParam(':categoria', $categoria, PDO::PARAM_INT);
}
if ($ubicacion) {
    $stmt->bindValue(':ubicacion', "%$ubicacion%", PDO::PARAM_STR);
}

$stmt->execute();
$destinos = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Generar el HTML para los destinos filtrados
if ($destinos): ?>
    <?php foreach ($destinos as $destino): ?>
        <div class="col-md-4">
          <div class="card card-post card-round">
            <img class="card-img-top" src="<?php echo $URL; ?>public/uploads/<?php echo htmlspecialchars($destino['imagen1_destino']); ?>" alt="Imagen de <?php echo htmlspecialchars($destino['nombre_destino']); ?>" />
            <div class="card-body">
              <div class="d-flex">
                <div class="info-post">
                  <div class="card-flex">
                    <h3 class="card-title">
                      <a href="#"> <?php echo htmlspecialchars($destino['nombre_destino']); ?> </a>
                    </h3>
                    <p class="date text-muted"><?php echo htmlspecialchars($destino['altitud_destino']); ?> <span>m.s.n.m</span> </p>
                  </div>
                  <p class="text-primary mb-0">
                    <span class="tag badge badge-secondary"><?php echo htmlspecialchars($destino['nombre_departamento']); ?></span>
                    <span class="text-muted">|</span>
                    <span class="tag badge badge-info"><?php echo htmlspecialchars($destino['nombre_provincia']); ?></span>
                  </p>
                </div>
              </div>
              <div class="separator-solid"></div>
              <p class="card-category text-info mb-1">
                <a href="#"><?php echo htmlspecialchars($destino['nombre_categoria']); ?></a>
              </p>
              <p class="card-text text-muted">
                <?php echo htmlspecialchars($destino['descripcion_destino']); ?>
              </p>
              <a href="#" class="btn m-auto btn-primary btn-md">Ver más</a>
            </div>
          </div>
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <p>No se encontraron destinos.</p>
<?php endif; ?>
