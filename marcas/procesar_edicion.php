<?php
require_once '../connection/conn.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_marca = $_POST['editMarcaId'];
    $status = $_POST['editMarcaStatus'];

    $sql = "CALL sp_actualizar_estado_marca(?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('is', $id_marca, $status);

    if ($stmt->execute()) {
        // Estado de la marca actualizado correctamente, redirigir a la página de marcas
        header("Location: ./index.php");
        exit();
    } else {
        echo "Error al actualizar el estado de la marca: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Solicitud no válida.";
}

$conn->close();
?>
