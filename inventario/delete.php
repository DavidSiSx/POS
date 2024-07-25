<?php
include '../connection/conn.php';

// Depuración: Imprimir los datos recibidos por GET
echo "<pre>";
print_r($_GET);
echo "</pre>";

if (isset($_GET['id_producto'])) {
    $id_producto = $_GET['id_producto'];
}
    // Usamos directamente el parámetro en la consulta preparada
    $query = "CALL sp_eliminar_producto(?)";
    $sql = $conn->prepare($query);

    

    // Usamos bind_param para vincular el parámetro
    $sql->bind_param('i', $id_producto);

    if ($sql->execute()) {
        // Producto eliminado correctamente, redirigir a la página de productos
        echo "Producto eliminado correctamente, redirigir a la página de productos";
        header("Location: ./index.php");
        exit();
    }

    $sql->close();


$conn->close();
?>
