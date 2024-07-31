<?php
include '../../app/controller/config.php';
include '../layouts/header.php';
include '../../app/controller/categorias/listar-categoria.php';

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
                    <a href="#">Categorias</a>
                </li>
                
            </ul>
        </div>
        <!--Eliminados-->
        <!--CONTENIDO INICIO-->
        <div class="col  m-0">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Registro de Categoría</div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <form action="ruta_al_script_de_procesamiento.php" method="post" enctype="multipart/form-data">
                                <div class="row form-group">
                                    <div class="col-md-6">
                                        <label for="nombre_categoria">Nombre de la categoría:</label>
                                        <input type="text" class="form-control" id="nombre_categoria" name="nombre_categoria" onkeyup="generarCodigoCategoria()" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="codigo_categoria">Código de la categoría:</label>
                                        <input type="text" class="form-control" id="codigo_categoria" name="codigo_categoria" readonly><br>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="descripcion_categoria">Descripción de la categoría:</label>
                                        <textarea id="descripcion_categoria" class="form-control" name="descripcion_categoria" required></textarea>
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
        <!--Lista de categorias-->
        <div class="col m-0">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Listado de categorias</div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <table class="table text-nowrap">
                                <thead>
                                    <tr>
                                        <th class="border-top-0">#</th>
                                        <th class="border-top-0">Código</th>
                                        <th class="border-top-0">Categoría</th>

                                        <th class="border-top-0">Descripción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $contador = 0;
                                    foreach ($categorias_datos as $categoria_dato) {
                                        $id_categoria = htmlspecialchars($categoria_dato['id_categoria']);
                                    ?>
                                        <tr>
                                            <td>
                                                <center><?php echo ++$contador; ?></center>
                                            </td>
                                            <td><?php echo htmlspecialchars($categoria_dato['id_categoria']); ?></td>
                                            <td><?php echo htmlspecialchars($categoria_dato['nombre_categoria']); ?></td>
                                            <td><?php echo htmlspecialchars($categoria_dato['descripcion_categoria']); ?></td>
                                            <td>
                                            
                                                <center>
                                                    <div class="col-sm-3 col-sm-12 d-flex flex-wrap gap-1">
                                                        <a href="show.php?id=<?php echo $id_destino; ?>" type="button" class="btn col-3 text-center btn-info"><i class="fa fa-eye"></i></a>
                                                        <a href="update.php?id=<?php echo $id_destino; ?>" type="button" class="btn col-3 text-center btn-success"><i class="fa fa-pencil-alt"></i></a>
                                                        <a href="delete.php?id=<?php echo $id_destino; ?>" type="button" class="btn col-3 text-center btn-danger"><i class="fa fa-trash"></i></a>
                                                    </div>
                                                </center>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--fin Lista de categorias-->
        <!--CONTENIDO FIN-->
    </div>
</div>


<?php include '../layouts/footer.php'; ?>