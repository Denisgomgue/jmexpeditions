<?php
include '../../app/controller/config.php';
include '../layouts/header.php';

if (isset($pdo)) {
  // Modificar la consulta para unir las tablas y obtener el nombre de la categoría
  $query = "
        SELECT d.*, c.nombre_categoria
        FROM destinos d
        LEFT JOIN categorias c ON d.id_categoria = c.id_categoria
    ";
  $stmt = $pdo->query($query); // Ejecuta la consulta y devuelve un objeto PDOStatement
} else {
  echo "Error: La conexión a la base de datos no se ha establecido.";
}
?>
<div class="container">
  <div class="page-inner">
    <div class="row">
      <?php
      // Iterar a través de los resultados y generar una tarjeta para cada destino
      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      ?>
        <div class="col-md-4">
          <div class="card card-post card-round">
            <!-- Mostrar la imagen del destino -->
            <img class="card-img-top" src="<?php echo $URL; ?>app/controller/public/uploads/<?php echo htmlspecialchars($row['imagen1_destino']); ?>" alt="Imagen de <?php echo htmlspecialchars($row['nombre_destino']); ?>" />

            <div class="card-body">
              <div class="d-flex">
                <div class="info-post" >
                  <div class="card-flex d-flex justify-between">
                    <h3 class="card-title">
                      <a href="#"> <?php echo htmlspecialchars($row['nombre_destino']); ?> </a>
                    </h3>
                    <p class="date text-muted"><?php echo htmlspecialchars($row['altitud_destino']); ?> <span>m.s.n.m</span> </p>
                  </div>
                  <p class="text-primary mb-0">
                    <a href="#" class=""> <?php echo htmlspecialchars($row['region_destino']); ?> </a>
                    <span class="text-muted">|</span>
                    <span class="tag badge badge-info" ><?php echo htmlspecialchars($row['provincia_destino']); ?></span>
                  </p>
                </div>
              </div>
              <div class="separator-solid"></div>
              <p class="card-category text-info mb-1">
                <a href="#"><?php echo htmlspecialchars($row['nombre_categoria']); ?></a> <!-- Nombre de la categoría del destino -->
              </p>

              <p class="card-text text-muted">
                <?php echo htmlspecialchars($row['descripcion_destino']); ?>
              </p>
              <a href="#" class="btn m-auto btn-primary btn-md">Ver más</a> <!-- Puedes enlazar esto a una página de detalles del destino -->
            </div>
          </div>
        </div>
      <?php
      }
      ?>
    </div>
  </div>
</div>
<?php
include '../layouts/footer.php';
?>