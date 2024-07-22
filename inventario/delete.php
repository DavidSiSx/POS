<?php
include '../connection/conn.php';

print_r($_GET);

$id_producto = $_GET['id_producto'];

$query = "CALL sp_eliminar_producto('$id_producto')";

$delete = $conexion->query($query);

header("Location: ../../index.html");
?>