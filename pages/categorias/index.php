<?php
include '../../app/controller/config.php';
echo'<br>';
include '../layouts/header.php';
echo'<br>';
include '../../app/controller/categorias/listar-categoria.php';
echo'<br>';
include '../../app/controller/categorias/create.php';
echo'<br>';
include '../../app/controller/categorias/delete.php';
echo'<br>';
if (isset($id_categoria)) {
    echo "ID de categoría: " . htmlspecialchars($id_categoria);
}
// Inicializar variables
$nombre_categoria = '';
$id_categoria = '';
$descripcion_categoria = '';

// Verifica si se ha proporcionado un ID en la cadena de consulta
if (isset($_GET['id_categoria'])) {
    $id_categoria = $_GET['id_categoria'];

    // Obtén los datos actuales de la categoría
    $stmt = $pdo->prepare("SELECT * FROM categorias WHERE id_categoria = :id_categoria");
    $stmt->bindParam(':id_categoria', $id_categoria);
    $stmt->execute();
    $categoria = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($categoria) {
        $id_categoria = $categoria['id_categoria'];
        $nombre_categoria = $categoria['nombre_categoria'];
        $descripcion_categoria = $categoria['descripcion_categoria'];
    }
}

if (isset($_GET['id_categoria'])) {
    $id_categoria = $_GET['id_categoria'];

    // Obtén los datos actuales de la categoría
    $stmt = $pdo->prepare("SELECT * FROM categorias WHERE id_categoria = :id_categoria");
    $stmt->bindParam(':id_categoria', $id_categoria);
    $stmt->execute();
    $categoria = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($categoria) {
        $nombre_categoria = $categoria['nombre_categoria'];
        $descripcion_categoria = $categoria['descripcion_categoria'];
    } else {
        echo "Categoría no encontrada.";
    }
}

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
                    <a href="#">Categorías</a>
                </li>
            </ul>
        </div>
        <div class="col m-0">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Registro de Categoría</div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <form action="<?php echo isset($id_categoria) && !empty($id_categoria) ? '../../app/controller/categorias/update.php' : '../../app/controller/categorias/create.php'; ?>" method="POST" enctype="multipart/form-data">


                                <div class="row form-group">
                                    <div class="col-md-6">
                                        <label for="nombre_categoria">Nombre de la categoría:</label>
                                        <input type="text" class="form-control" name="nombre_categoria" id="nombre_categoria" onkeyup="generarCodigoCategoria()" value="<?php echo htmlspecialchars($nombre_categoria); ?>" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="id_categoria">Código de la categoría:</label>
                                        <input type="text" class="form-control" name="id_categoria" id="id_categoria" value="<?php echo htmlspecialchars($id_categoria); ?>" readonly><br>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="descripcion_categoria">Descripción de la categoría:</label>
                                        <textarea id="descripcion_categoria" name="descripcion_categoria" class="form-control" required><?php echo htmlspecialchars($descripcion_categoria); ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <?php if (isset($id_categoria) && !empty($id_categoria)) : ?>
                                        <input type="hidden" name="id_categoria" value="<?php echo htmlspecialchars($id_categoria); ?>">
                                        <button type="submit" class="btn btn-info">Actualizar</button>
                                        <button type="button" class="btn btn-danger" onclick="window.location.href='?';">Nuevo</button>
                                    <?php else : ?>
                                        <button type="submit" class="btn btn-success">Registrar</button>
                                        <button type="button" class="btn btn-danger" onclick="window.location.href='?';">Nuevo</button>
                                    <?php endif; ?>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Lista de categorías -->
        <div class="col m-0">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Listado de categorías</div>
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
                                        <th class="border-top-0">Acciones</th>
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
                                                        <a href="show.php?id=<?php echo $id_categoria; ?>" type="button" class="btn col-3 text-center btn-info"><i class="fa fa-eye"></i></a>

                                                        <a href="?id_categoria=<?php echo $id_categoria; ?>" type="button" class="btn col-3 text-center btn-success"><i class="fa fa-pencil-alt"></i></a>


                                                        <a href="../../app/controller/categorias/delete.php?id_categoria=<?php echo $id_categoria; ?>" type="button" class="btn col-3 text-center btn-danger"><i class="fa fa-trash"></i></a>
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