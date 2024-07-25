<?php
 require_once '../connection/conn.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['addProductName'];
    $id_marca = $_POST['addProductMarca'];
    $stock = $_POST['addProductStock'];
    $precio = $_POST['addProductPrecio'];
    $id_categoria = $_POST['addProductCategoria'];
    $fecha_ingreso = $_POST['addProductFecha'];

    $sql = "CALL insertar_productos(?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssidis', $nombre, $id_marca, $stock, $precio, $id_categoria, $fecha_ingreso);

    if ($stmt->execute()) {
        // Producto insertado correctamente, redirigir a la página de productos
        header("Location: ./index.php");
        exit();
    } else {
        echo "Error al insertar el producto: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Solicitud no válida.";
}

$conn->close();
?>
