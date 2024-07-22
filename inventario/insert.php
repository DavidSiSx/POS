<?php
include '../connection/conn.php';

//print_r($_POST);
$id_producto= $_POST['id_producto']; 
$nombre= $_POST['nombre']; 
$id_marca= $_POST['id_marca'];
$stock= $_POST['stock'];
$precio= $_POST['precio'];
$fecha_ingreso=$_POST['fecha_ingreso'];


$query = "CALL sp_insertar_producto('$id_producto','$nombre','$id_marca','$stock','$precio','$fecha_ingreso')";

$insert = $conexion->query($query);

header("Location: ../../index.html");
?>