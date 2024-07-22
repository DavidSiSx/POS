<?php
include '../connection/conn.php';

print_r($_GET);

$id_producto = $_GET['id_marca'];

$query = "CALL sp_eliminar_marca('$id_marca')";

$delete = $conexion->query($query);

header("Location: ../../../marcas/index.html");
?>