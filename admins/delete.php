<?php
include '../connection/conn.php';

print_r($_GET);

$id_administrador = $_GET['id_administrador'];

$query = "CALL sp_eliminar_administrador('$id_administrador')";

$delete = $conexion->query($query);

header("Location: ./index.html");
?>