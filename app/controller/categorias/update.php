<?php
require_once dirname(__DIR__) . '/config.php';

<<<<<<< HEAD
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_categoria = $_POST['id_categoria_act'];
    $cod_categoria = $_POST['cod_categoria_act'];
    $nombre_categoria = $_POST['nombre_categoria_act'];
    $descripcion_categoria = $_POST['descripcion_categoria_act'];

    $stmt = $pdo->prepare('UPDATE categorias SET cod_categoria = ?, nombre_categoria = ?, descripcion_categoria = ? WHERE id_categoria = ?');
    $stmt->execute([$cod_categoria, $nombre_categoria, $descripcion_categoria, $id_categoria]);

    header('Location: ../../index.php');
}
?>
=======
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['id_categoria']) && isset($_POST['nombre_categoria']) && isset($_POST['descripcion_categoria'])) {
        $id_categoria = $_POST['id_categoria'];
        $nombre_categoria = $_POST['nombre_categoria'];
        $descripcion_categoria = $_POST['descripcion_categoria'];

        try {
            $sql = "UPDATE categorias SET nombre_categoria = :nombre_categoria, descripcion_categoria = :descripcion_categoria WHERE id_categoria = :id_categoria";
            $stmt = $pdo->prepare($sql);

            $stmt->bindParam(':id_categoria', $id_categoria);
            $stmt->bindParam(':nombre_categoria', $nombre_categoria);
            $stmt->bindParam(':descripcion_categoria', $descripcion_categoria);

            if ($stmt->execute()) {
                header('Location: ../index.php'); // Redirige a la página deseada después de la actualización
                exit;
            } else {
                echo "Error al actualizar la categoría.";
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    } else {
        echo "Datos del formulario no están establecidos.";
    }
} else {
    echo "Método de solicitud no permitido.";
}

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    echo "Método de solicitud no permitido.";
    var_dump($_SERVER);
}
>>>>>>> 75bde39f1873fb24bd8c9fab7abd5c405b7c0ee5
