<?php
require_once '../../connection/conn.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Depuración: Imprimir los datos enviados por el formulario
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";

    $id_producto = $_POST['editProductId'];
    $nombre = $_POST['editProductName'];
    $stock = $_POST['editProductStock'];
    $precio = $_POST['editProductPrecio'];
    $fecha_ingreso = $_POST['editProductFecha'];

    // Depuración: Verificar que las variables tienen los valores esperados
    echo "ID Producto: $id_producto<br>";
    echo "Nombre: $nombre<br>";
    echo "Stock: $stock<br>";
    echo "Precio: $precio<br>";
    echo "Fecha de Ingreso: $fecha_ingreso<br>";

    $sql = "CALL actualizar_producto(?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        die("Error " . $conn->error);
    }

    $stmt->bind_param('isids', $id_producto, $nombre, $stock, $precio, $fecha_ingreso);

    if ($stmt->execute()) {
        // Producto actualizado correctamente, redirigir a la página de productos
        echo "Producto actualizado correctamente";
        header("Location: ../index.php");
        exit();
    } else {
        echo "Error al actualizar el producto: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
