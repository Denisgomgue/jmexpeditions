<?php
include '../../app/controller/config.php';
include '../layouts/header.php';
include '../../app/controller/categorias/listar-categoria.php';
include '../../app/controller/destinos/create.php';

?>

<div class="container">
  <div class="page-inner">
    <div class="page-header">
      <h3 class="fw-bold mb-3">Forms</h3>
      <ul class="breadcrumbs mb-3">
        <li class="nav-home">
          <a href="#">
            <i class="icon-home"></i>
          </a>
        </li>
        <li class="separator">
          <i class="icon-arrow-right"></i>
        </li>
        <li class="nav-item">
          <a href="#">Destinos</a>
        </li>
        <li class="separator">
          <i class="icon-arrow-right"></i>
        </li>
        <li class="nav-item">
          <a href="#">Registro de destino</a>
        </li>
      </ul>
    </div>
    <!--Eliminados-->
    <!--CONTENIDO INICIO-->
    <div class="col  m-0">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <div class="card-title">Registro de destinos</div>
          </div>
          <div class="card-body">
            <div class="row">
              <form action="../../app/controller/destinos/create.php" method="post" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-md-6">

                    <div class="form-group">
                      <label for="nombre">Nombre del Destino</label>
                      <input type="text" class="form-control" id="nombre" name="nombre" onkeyup="generarCodigo()" required>
                    </div>
                    <div class="form-group">
                      <label for="ubicacion">Ubicación</label>
                      <input type="text" class="form-control" id="ubicacion" name="ubicacion" required>
                    </div>
                    <div class="form-group">
                      <label for="departamento">Departamento</label>
                      <input type="text" class="form-control" id="departamento" name="departamento" required>
                    </div>
                    <div class="form-group">
                      <label for="provincia">Provincia</label>
                      <input type="text" class="form-control" id="provincia" name="provincia" required>
                    </div>

                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="codigo">Código</label>
                      <input type="text" class="form-control" id="codigo" name="codigo" readonly>
                    </div>
                    <div class="form-group">
                      <label for="categoria">Categoría</label>
                      <select class="form-control" id="categoria" onchange="generarCodigo()" name="categoria" required>
                        <option value=" " readonly>--- Seleccione alguna categoria ---</option>
                        <?php
                        // Iterar a través de las categorías y crear opciones para la lista desplegable
                        if (!empty($categorias_datos)) {
                          foreach ($categorias_datos as $categoria) {
                            echo "<option value='" . $categoria['id_categoria'] . "'>" . htmlspecialchars($categoria['nombre_categoria']) . "</option>";
                          }
                        } else {
                          echo "<option value=''>No hay categorías disponibles</option>";
                        }
                        ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="numero_dias">Número de Días de Tour</label>
                      <input type="number" class="form-control" id="numero_dias" name="numero_dias" required>
                    </div>
                    <div class="form-group">
                      <label for="descripcion">Breve Descripción</label>
                      <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required></textarea>
                    </div>

                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="fotos">Fotos</label>
                      <div class="image-upload">
                        <label for="foto1" class="upload-box">
                          <i class="fas fa-upload"></i>
                          <input type="file" id="foto1" name="fotos[]" accept="image/*">
                        </label>
                        <label for="foto2" class="upload-box">
                          <i class="fas fa-upload"></i>
                          <input type="file" id="foto2" name="fotos[]" accept="image/*">
                        </label>
                        <label for="foto3" class="upload-box">
                          <i class="fas fa-upload"></i>
                          <input type="file" id="foto3" name="fotos[]" accept="image/*">
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="card-action">
                    
                    <button type="submit" class="btn btn-success">Registrar</button>
                    <button class="btn btn-danger">Nuevo</button>
                    <button class="btn btn-info">Actualizar</button>
                  </div>
                </div>
              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
    <!--CONTENIDO FIN-->
  </div>
</div>


<?php include '../layouts/footer.php'; ?>