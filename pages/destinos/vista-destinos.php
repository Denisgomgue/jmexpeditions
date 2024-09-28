<?php
include '../../app/controller/config.php';
include '../layouts/header.php';

// Consulta inicial para obtener todos los destinos
$query = "
    SELECT d.*, c.nombre_categoria, p.nombre_provincia, dep.nombre_departamento
    FROM destinos d
    LEFT JOIN categorias c ON d.id_categoria = c.id_categoria
    LEFT JOIN provincias p ON d.id_provincia = p.id_provincia
    LEFT JOIN departamentos dep ON p.id_departamento = dep.id_departamento
";
$stmt = $pdo->query($query); // Ejecuta la consulta y devuelve un objeto PDOStatement
?>

<!--Exportar para carousel-->
<link rel="stylesheet" href="<?php echo $URL; ?>public/css/galerias/index.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

<div class="container">
  <div class="page-inner">
    <div class="card col">
      <div class="card-body row position-relative">
        <!-- Filtro por Departamento -->
        <div class="form-group col-md-3">
          <label for="departamento">Departamento</label>
          <select id="departamento" class="form-control">
            <option value="">Selecciona un departamento</option>
            <?php
            // Obtener departamentos para el filtro
            $departamentos = $pdo->query("SELECT * FROM departamentos")->fetchAll(PDO::FETCH_ASSOC);
            foreach ($departamentos as $departamento) {
              echo "<option value=\"" . htmlspecialchars($departamento['id_departamento']) . "\">" . htmlspecialchars($departamento['nombre_departamento']) . "</option>";
            }
            ?>
          </select>
        </div>

        <!-- Filtro por Provincia -->
        <div class="form-group col-md-3">
          <label for="provincia">Provincia</label>
          <select id="provincia" class="form-control">
            <option value="">Selecciona una provincia</option>
            <!-- Opciones se cargarán dinámicamente con JavaScript -->
          </select>
        </div>

        <!-- Filtro por Categoría -->
        <div class="form-group col-md-3">
          <label for="categoria">Categoría</label>
          <select id="categoria" class="form-control">
            <option value="">Selecciona una categoría</option>
            <?php
            // Obtener categorías para el filtro
            $categorias = $pdo->query("SELECT * FROM categorias")->fetchAll(PDO::FETCH_ASSOC);
            foreach ($categorias as $categoria) {
              echo "<option value=\"" . htmlspecialchars($categoria['id_categoria']) . "\">" . htmlspecialchars($categoria['nombre_categoria']) . "</option>";
            }
            ?>
          </select>
        </div>

        <!-- Filtro por Ubicación -->
        <div class="form-group col-md-3">
          <label for="ubicacion">Ubicación</label>
          <input type="text" id="ubicacion" class="form-control" placeholder="Ingresa la ubicación">
        </div>
        <div class="">
          <button type="button" class="btn btn-primary" id="filtrar">Aplicar Filtros</button>
        </div>
      </div>
    </div>

    <div class="col" id="destinos-list">
      <?php
      // Iterar a través de los resultados y generar una tarjeta para cada destino
      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
<<<<<<< HEAD
        $id_destino = htmlspecialchars($row['id_destino']); // Definir la variable aquí
      ?>
        <div class="card contenedor-col ">
          <div class="owl-carousel contenedor-images">
            <img class="card-img-top" src="<?php echo $URL; ?>public/uploads/<?php echo htmlspecialchars($row['imagen1_destino']); ?>" alt="Imagen de <?php echo htmlspecialchars($row['nombre_destino']); ?>" />
            <img class="card-img-top" src="<?php echo $URL; ?>public/uploads/<?php echo htmlspecialchars($row['imagen2_destino']); ?>" alt="Imagen de <?php echo htmlspecialchars($row['nombre_destino']); ?>" />
            <img class="card-img-top" src="<?php echo $URL; ?>public/uploads/<?php echo htmlspecialchars($row['imagen3_destino']); ?>" alt="Imagen de <?php echo htmlspecialchars($row['nombre_destino']); ?>" />
=======
      ?>
        <div class="card contenedor-col ">
          <div class="owl-carousel contenedor-images">

            <img class="card-img-top" src="<?php echo $URL; ?>public/uploads/<?php echo htmlspecialchars($row['imagen1_destino']); ?>" alt="Imagen de <?php echo htmlspecialchars($row['nombre_destino']); ?>" />

            <img class="card-img-top" src="<?php echo $URL; ?>public/uploads/<?php echo htmlspecialchars($row['imagen2_destino']); ?>" alt="Imagen de <?php echo htmlspecialchars($row['nombre_destino']); ?>" />

            <img class="card-img-top" src="<?php echo $URL; ?>public/uploads/<?php echo htmlspecialchars($row['imagen3_destino']); ?>" alt="Imagen de <?php echo htmlspecialchars($row['nombre_destino']); ?>" />

>>>>>>> ececffb31b4569ea04761233f9b945eff14c19f6
          </div>
          <div class="contenedor-info p-3">
            <div class="card-post">
              <div class="d-flex card-header">
                <div class="info-post">
                  <div class="card-flex">
                    <h3 class="card-title">
                      <a href="#"> <?php echo htmlspecialchars($row['nombre_destino']); ?> </a>
                    </h3>
                    <p class="date text-info">
                      <i class="fas fa-tag"></i> <a href="#"><?php echo htmlspecialchars($row['nombre_categoria']); ?></a> &MediumSpace;
                      <i class="fas fa-ruler-vertical text-secondary"> <a href="#"><?php echo htmlspecialchars($row['altitud_destino']); ?> <span>m.s.n.m</span></a></i>
                    </p>
                  </div>
<<<<<<< HEAD
=======
                 
>>>>>>> ececffb31b4569ea04761233f9b945eff14c19f6
                  <p class="text-primary">
                    <span class="tag badge badge-secondary"><?php echo htmlspecialchars($row['nombre_departamento']); ?></span>
                    <span class="text-muted"> | </span>
                    <span class="tag badge badge-info"><?php echo htmlspecialchars($row['nombre_provincia']); ?></span>
                  <                </div>
              </div>
              <div class="card-body">
                <!-- 
                <p class="card-text text-muted truncate-description">
                  <?php echo htmlspecialchars($row['descripcion_destino']); ?>
                </p>
                 -->
                <a href="ver-destinos.php?id=<?php echo $id_destino; ?>" class="btn m-auto btn-primary btn-md">Ver más</a>
              </div>
            </div>
          </div>
        </div>
      <?php
      }


      ?>
    </div>

  </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    const departamentoSelect = document.getElementById('departamento');
    const provinciaSelect = document.getElementById('provincia');

    departamentoSelect.addEventListener('change', function() {
      const departamentoId = this.value;
      if (departamentoId) {
        fetch(`../../app/controller/destinos/listar-provincias.php?id_departamento=${departamentoId}`)
          .then(response => response.json())
          .then(data => {
            provinciaSelect.innerHTML = '<option value="">Selecciona una provincia</option>';
            data.forEach(provincia => {
              provinciaSelect.innerHTML += `<option value="${provincia.id_provincia}">${provincia.nombre_provincia}</option>`;
            });
          });
      } else {
        provinciaSelect.innerHTML = '<option value="">Selecciona una provincia</option>';
      }
    });

    document.getElementById('filtrar').addEventListener('click', function() {
      const departamento = departamentoSelect.value;
      const provincia = provinciaSelect.value;
      const categoria = document.getElementById('categoria').value;
      const ubicacion = document.getElementById('ubicacion').value;

      fetch(`filtro-destinos.php?departamento=${departamento}&provincia=${provincia}&categoria=${categoria}&ubicacion=${ubicacion}`)
        .then(response => response.text())
        .then(data => {
          const destinosList = document.getElementById('destinos-list');
          destinosList.innerHTML = data;

          // Re-inicializar el carrusel después de actualizar el contenido
          $('.owl-carousel').owlCarousel({
            autoplaySpeed: 100,
            navSpeed: 800,
            items: 1,
            loop: true,
          });
        });
    });
    $('.owl-carousel').owlCarousel({
      autoplaySpeed: 100,
      navSpeed: 800,
      items: 1,
      loop: true,
    });
  });
</script>

<?php
include '../layouts/footer.php';
?>