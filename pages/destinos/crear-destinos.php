<?php
include '../../app/controller/config.php';
include '../layouts/header.php';

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
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <div class="card-title">Registro de destinos</div>
          </div>
          <div class="card-body">
            <div class="row">
              <form action="ruta_al_script_de_procesamiento.php" method="post" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-md-6">
                    
                    <div class="form-group">
                      <label for="nombre">Nombre del Destino</label>
                      <input type="text" class="form-control" id="nombre" name="nombre" required>
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
                      <input type="text" class="form-control" id="codigo" name="codigo" required>
                    </div>
                    <div class="form-group">
                      <label for="categoria">Categoría</label>
                      <select class="form-control" id="categoria" name="categoria" required>
                        <!-- Aquí deberías cargar las categorías desde la base de datos -->
                        <option value="">Seleccione una categoría</option>
                        <option value="1">Categoría 1</option>
                        <option value="2">Categoría 2</option>
                        <option value="3">Categoría 3</option>
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


                </div>

              </form>
              <div class="card-action">
                <button class="btn btn-success">Registrar</button>
                <button class="btn btn-danger">Nuevo</button>
                <button class="btn btn-info">Actualizar</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <?php include '../layouts/footer.php'; ?>