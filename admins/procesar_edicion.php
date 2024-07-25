<?php
require_once '../connection/conn.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_administrador = $_POST['editAdminId'];
    $estado = $_POST['editAdminEstado'];

    $sql = "CALL sp_actualizar_estado_administrador(?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('is', $id_administrador, $estado);

    if ($stmt->execute()) {
        echo "Estado del administrador actualizado correctamente, redirigiendo a la página de administradores";
        header("Location: ./index.php");
        exit();
    } else {
        echo "Error al actualizar el estado del administrador: " . $stmt->error;
     
    }

    $stmt->close();
} else {
    echo "Solicitud no válida.";
}

$conn->close();
?>
