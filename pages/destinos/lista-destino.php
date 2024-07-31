<?php
include '../../app/controller/config.php';
include '../layouts/header.php';
include '../../app/controller/destinos/listar-destino.php';

?>
<!-- ============================================================== -->
<!-- End Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Listas</h3>
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
                    <a href="#">Lista destino</a>
                </li>
            </ul>
        </div>
        <!--Eliminados-->
        <div class="col m-0">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Listado de destinos</div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <table class="table text-nowrap">
                                <thead>
                                    <tr>
                                        <th class="border-top-0">#</th>
                                        <th class="border-top-0">Codigo</th>
                                        <th class="border-top-0">Destino</th>

                                        <th class="border-top-0">Ubicación</th>
                                        <th class="border-top-0">N° dias</th>
                                        <th class="border-top-0">Categoría</th>
                                        <!-- <th class="border-top-0">Descripción</th> -->
                                        <!-- <th class="border-top-0">Imagenes</th> -->
                                        <th class="border-top-0">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $contador = 0;
                                    foreach ($destinos_datos as $destinos_dato) {
                                        $id_destino = htmlspecialchars($destinos_dato['id_destino']);
                                    ?>
                                        <tr>
                                            <td>
                                                <center><?php echo ++$contador; ?></center>
                                            </td>
                                            <td><?php echo htmlspecialchars($destinos_dato['id_destino']); ?></td>
                                            <td><?php echo htmlspecialchars($destinos_dato['nombre_destino']); ?></td>

                                            <td>
                                                <?php echo htmlspecialchars($destinos_dato['ubicacion_destino']); ?><br>
                                                <span class="text-muted"><?php echo htmlspecialchars($destinos_dato['region_destino']); ?></span><br>
                                                <code><?php echo htmlspecialchars($destinos_dato['provincia_destino']); ?></code>
                                            </td>
                                            <td><?php echo htmlspecialchars($destinos_dato['dias_destino']); ?></td>
                                            <td><?php echo htmlspecialchars($destinos_dato['nombre_categoria']); ?></td>
                                            <!-- <td><?php //echo htmlspecialchars($destinos_dato['descripcion_destino']); 
                                                        ?></td> -->
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
    </div>
    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Right sidebar -->
    <!-- ============================================================== -->
    <!-- .right-sidebar -->
    <!-- ============================================================== -->
    <!-- End Right sidebar -->
    <!-- ============================================================== -->
</div>




<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- footer -->
<!-- ============================================================== -->
<?php include '../layouts/footer.php'; ?>