<?php
header('Content-Type: application/json');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pos";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$sql = "SELECT p.nombre as nombre_producto, SUM(v.cantidad) as cantidad, SUM(v.total) as total, p.id_producto, p.stock, p.precio
        FROM venta v
        JOIN productos p ON v.id_producto = p.id_producto
        GROUP BY p.nombre, p.id_producto, p.stock, p.precio
        ORDER BY p.nombre ASC";
$result = $conn->query($sql);

$labels = [];
$cantidad = [];
$total = [];
$id_producto = [];
$stock = [];
$precio = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $labels[] = $row['nombre_producto'];
        $id_producto[] = $row['id_producto'];
        $cantidad[] = $row['cantidad'];
        $total[] = $row['total'];
        $stock[] = $row['stock'];
        $precio[] = $row['precio'];
    }
} else {
    // Datos de prueba en caso de que no haya resultados
    $labels = ["Producto 1", "Producto 2", "Producto 3"];
    $id_producto = [1, 2, 3];
    $cantidad = [0, 0, 0];
    $total = [0, 0, 0];
    $stock = [0, 0, 0];
    $precio = [0, 0, 0];
}

echo json_encode(["labels" => $labels, "id_producto" => $id_producto, "cantidad" => $cantidad, "total" => $total, "stock" => $stock, "precio" => $precio]);

$conn->close();
?>
