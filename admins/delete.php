<?php
include '../connection/conn.php';

// Depuración: Imprimir los datos recibidos por POST
echo "<pre>";
print_r($_POST);
echo "</pre>";

if (isset($_POST['id_administrador'])) {
    $id_administrador = $_POST['id_administrador'];

    // Llamar al procedimiento almacenado para eliminar el administrador
    $query = "CALL sp_eliminar_administrador(?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $id_administrador);
    if (!$stmt->execute()) {
        die("Error al eliminar el administrador: " . $stmt->error);
    }
    $stmt->close();

    echo "Administrador eliminado correctamente, redirigir a la página de administradores";
    header("Location: ./index.php");
    exit();
} else {
    echo "No se recibió el ID del administrador.";
}

$conn->close();
?>
