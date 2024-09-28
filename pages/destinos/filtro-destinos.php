<?php
include '../../app/controller/config.php';

// Obtener los filtros desde la URL
$departamento = $_GET['departamento'] ?? null;
$provincia = $_GET['provincia'] ?? null;
$categoria = $_GET['categoria'] ?? null;
$ubicacion = $_GET['ubicacion'] ?? null;

// Construir la consulta SQL con los filtros
$query = "
    SELECT d.*, c.nombre_categoria, p.nombre_provincia, dep.nombre_departamento
    FROM destinos d
    LEFT JOIN categorias c ON d.id_categoria = c.id_categoria
    LEFT JOIN provincias p ON d.id_provincia = p.id_provincia
    LEFT JOIN departamentos dep ON p.id_departamento = dep.id_departamento
    WHERE 1=1
";

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

if ($departamento) {
  $stmt->bindParam(':departamento', $departamento);
}

if ($provincia) {
  $stmt->bindParam(':provincia', $provincia);
}

if ($categoria) {
  $stmt->bindParam(':categoria', $categoria);
}

if ($ubicacion) {
  $ubicacion = '%' . $ubicacion . '%';
  $stmt->bindParam(':ubicacion', $ubicacion);
}

$stmt->execute();
?>

<?php if ($stmt->rowCount() > 0): ?>
  <?php
  // Generar el HTML para los destinos filtrados
  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo '<div class="card contenedor-col">';
    echo '<div class="owl-carousel contenedor-images">';
    echo '<img class="card-img-top" src="../../public/uploads/' . htmlspecialchars($row['imagen1_destino']) . '" alt="Imagen de ' . htmlspecialchars($row['nombre_destino']) . '" />';
    echo '<img class="card-img-top" src="../../public/uploads/' . htmlspecialchars($row['imagen2_destino']) . '" alt="Imagen de ' . htmlspecialchars($row['nombre_destino']) . '" />';
    echo '<img class="card-img-top" src="../../public/uploads/' . htmlspecialchars($row['imagen3_destino']) . '" alt="Imagen de ' . htmlspecialchars($row['nombre_destino']) . '" />';
    echo '</div>';
    echo '<div class="contenedor-info p-3">';
    echo '<div class="d-flex">';
    echo '<div class="info-post">';
    echo '<div class="card-flex">';
    echo '<h3 class="card-title"><a href="#">' . htmlspecialchars($row['nombre_destino']) . '</a></h3>';
    echo '<p class="date text-info">';
    echo '<i class="fas fa-tag"></i> <a href="#">' . htmlspecialchars($row['nombre_categoria']) . '</a>&MediumSpace;';
    echo '<i class="fas fa-ruler-vertical text-secondary"> <a href="#">' . htmlspecialchars($row['altitud_destino']) . '<span> m.s.n.m</span></a></i>';
    echo '</p>';
    echo '</div>';
    echo '<p class="text-primary mb-0">';
    echo '<span class="tag badge badge-secondary">' . htmlspecialchars($row['nombre_departamento']) . '</span>';
    echo '<span class="text-muted">|</span>';
    echo '<span class="tag badge badge-info">' . htmlspecialchars($row['nombre_provincia']) . '</span>';
    echo '</p>';
    echo '</div>';
    echo '</div>';
    echo '<div class="separator-solid"></div>';
    echo '<p class="card-text text-muted">' . htmlspecialchars($row['descripcion_destino']) . '</p>';
    echo '<a href="#" class="btn m-auto btn-primary btn-md">Ver más</a>';
    echo '</div>';
    echo '</div>';
  } ?>
<?php else: ?>
  <div class="col-md-12">
    <div class="alert alert-warning text-center" role="alert">
      No se encontraron destinos que coincidan con los filtros aplicados.
    </div>
  </div>
<?php endif; ?>