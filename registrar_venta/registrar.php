<?php
require_once '../connection/conn.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $productos = $_POST['producto'];
    $cantidades = $_POST['cantidad'];

    foreach ($productos as $index => $producto_id) {
        $cantidad = $cantidades[$index];

        // Llamar al procedimiento almacenado para obtener el precio y el stock del producto
        if ($stmt = $conn->prepare("CALL obtener_precio_stock(?)")) {
            $stmt->bind_param('i', $producto_id);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result) {
                $producto = $result->fetch_assoc();
                $precio = $producto['precio'];
                $stock = $producto['stock'];
                $result->close();
            }
            $stmt->close();
            $conn->next_result();  // Asegurarse de que los resultados de la consulta se han procesado completamente
        }

        // Verificar si hay suficiente stock
        if ($cantidad > $stock) {
            echo "No hay suficiente stock para el producto ID $producto_id";
            exit();
        }

        // Calcular el total
        $total = $precio * $cantidad;

        // Llamar al procedimiento almacenado para registrar la venta
        if ($stmt = $conn->prepare("CALL registrar_venta(?, ?, ?)")) {
            $stmt->bind_param('iid', $producto_id, $cantidad, $total);
            $stmt->execute();
            $stmt->close();
            $conn->next_result();  // Asegurarse de que los resultados de la consulta se han procesado completamente
        }

        // Actualizar el stock del producto
        $nuevo_stock = $stock - $cantidad;
        if ($stmt = $conn->prepare("CALL actualizar_stock(?, ?)")) {
            $stmt->bind_param('ii', $producto_id, $nuevo_stock);
            $stmt->execute();
            $stmt->close();
            $conn->next_result();  // Asegurarse de que los resultados de la consulta se han procesado completamente
        }
    }

    $conn->close();

    // Redirigir a la página de ventas
    header("Location: ../venta/index..php");
    exit();
}
?>