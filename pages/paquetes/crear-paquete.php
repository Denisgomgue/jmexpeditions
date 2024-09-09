<?php
include '../../app/controller/config.php';
include '../layouts/header.php';
include '../../app/controller/paquetes/create.php';
?>

<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Registro de Paquetes</h3>
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
                    <a href="#">Paquetes</a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Registro de Paquete</a>
                </li>
            </ul>
        </div>
        <div class="col m-0">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Registro de Paquete</div>
                    </div>
                    <div class="card-body">
                        <form action="../../app/controller/paquetes/create.php" method="post">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nombre_paquete">Nombre del Paquete</label>
                                        <input type="text" class="form-control" id="nombre_paquete" name="nombre_paquete" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="duracion_paquete">Duración (Días)</label>
                                        <input type="number" class="form-control" id="duracion_paquete" name="duracion_paquete" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="precio_paquete">Precio</label>
                                        <input type="text" class="form-control" id="precio_paquete" name="precio_paquete" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="disponibilidad_paquete">Disponibilidad</label>
                                        <select class="form-control" id="disponibilidad_paquete" name="disponibilidad_paquete" required>
                                            <option value="1">Disponible</option>
                                            <option value="0">No Disponible</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="descripcion_paquete">Descripción del Paquete</label>
                                        <textarea class="form-control" id="descripcion_paquete" name="descripcion_paquete" rows="4" required></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="card-action">
                                <button type="submit" class="btn btn-success">Registrar Paquete</button>
                                <button type="reset" class="btn btn-danger">Nuevo</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
include '../layouts/modal.php'; 
include '../layouts/footer.php';
?>