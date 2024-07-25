<?php
require_once '../connection/conn.php';

if (isset($_POST['id_marca'])) {
    $id_marca = $_POST['id_marca'];

    $sql = "CALL sp_eliminar_marca(?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id_marca);

    if ($stmt->execute()) {
        // Marca eliminada correctamente, redirigir a la página de marcas
        header("Location: index.php");
        exit();
    } else {
        echo "Error al eliminar la marca: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "No se recibió el ID de la marca.";
}

$conn->close();
?>
