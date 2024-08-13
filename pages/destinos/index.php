<?php
include '../../app/controller/config.php';
include '../layouts/header.php';
include '../../app/controller/destinos/listar-destino.php';
include '../../app/controller/destinos/update.php';
?>

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

        <!-- Mostrar notificación si se pasa el parámetro message -->
        <?php if (isset($_GET['message'])) : ?>

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    // Mostrar la notificación
                    $.notify({
                        icon: "icon-bell",
                        title: "Éxito",
                        message: decodeURIComponent("<?php echo $_GET['message']; ?>")
                    }, {
                        type: "success",
                        placement: {
                            from: "top",
                            align: "center"
                        },
                        time: 5000
                    });

                    console.log("URL original: ", window.location.href);

                    var url = new URL(window.location.href);
                    url.searchParams.delete('message');
                    window.history.replaceState({}, document.title, url.toString());

                    console.log("URL actualizada: ", url.toString());
                    //Mostrar en consola el message
                    console.log("Mensaje: ", decodeURIComponent("<?php echo $_GET['message']; ?>"));
                });
            </script>
        <?php endif; ?>

        <!-- Listado de Destinos -->
        <!-- Listado de Destinos -->
        <div class="col m-0">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Listado de destinos</div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <table class="table text-wrap">
                                <thead>
                                    <tr>
                                        <th class="border-top-0" aria-controls="multi-filter-select">#</th>
                                        <th class="border-top-0">Código</th>
                                        <th class="border-top-0">Destino</th>
                                        <th class="border-top-0">Ubicación</th>
                                        <th class="border-top-0">días</th>
                                        <th class="border-top-0">Categoría</th>
                                        <th class="border-top-0">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $contador = 0;
                                    foreach ($destinos_datos as $destinos_dato) {
                                        $id_destino = htmlspecialchars($destinos_dato['id_destino']);
                                        $codigo_destino = htmlspecialchars($destinos_dato['codigo_destino']);
                                        $nombre_destino = htmlspecialchars($destinos_dato['nombre_destino']);
                                        $ubicacion_destino = htmlspecialchars($destinos_dato['ubicacion_destino']);
                                        $region_destino = htmlspecialchars($destinos_dato['region_destino']);
                                        $provincia_destino = htmlspecialchars($destinos_dato['provincia_destino']);
                                        $dias_destino = htmlspecialchars($destinos_dato['dias_destino']);
                                        $nombre_categoria = htmlspecialchars($destinos_dato['nombre_categoria']);
                                        $parque_reserva_destino = htmlspecialchars($destinos_dato['parque_reserva_destino']);
                                    ?>
                                        <tr>
                                            <td>
                                                <center><?php echo ++$contador; ?></center>
                                            </td>
                                            <td><?php echo $codigo_destino; ?></td>
                                            <td><?php echo $nombre_destino; ?></td>
                                            <td>
                                                <?php echo $ubicacion_destino; ?>
                                                <br>
                                                <span><!-- Nueva columna para parque_reserva_destino -->
                                                <?php echo $parque_reserva_destino; ?></span><br>
                                                <span class="text-muted"><?php echo $region_destino; ?></span>,
                                                <code><?php echo $provincia_destino; ?></code>
                                            </td>
                                            <td>
                                                <center><?php echo $dias_destino; ?></center>
                                            </td>
                                            <td><?php echo $nombre_categoria; ?></td>

                                            <td>
                                                <center>
                                                    <div class="col-sm-3 col-sm-12 d-flex flex-wrap gap-1">
                                                        <a href="show.php?id=<?php echo $id_destino; ?>" type="button" class="btn col-3 text-center btn-info"><i class="fa fa-eye"></i></a>
                                                        <a href="editar-destinos.php?id=<?php echo $id_destino; ?>" type="button" class="btn col-3 text-center btn-success"><i class="fa fa-pencil-alt"></i></a>
                                                        <a href="<?php echo $URL; ?>app/controller/destinos/delete.php?id=<?php echo $id_destino; ?>" type="button" class="btn col-3 text-center btn-danger" onclick="return confirm('¿Está seguro que desea eliminar este destino?')"><i class="fa fa-trash"></i></a>
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
</div>

<?php include '../layouts/footer.php'; ?>
<!--  -->