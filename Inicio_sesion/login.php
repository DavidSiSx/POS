<?php
print_r($_POST);
session_start();



if (isset($_POST['usuario']) && isset($_POST['contrasena'])) 
    echo "Entrando al bloque de autenticación<br>";
    require_once '../connection/conn.php';

    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

    echo "Usuario: $usuario, Contraseña: $contrasena<br>";

    $sql = "CALL sp_datos_administrador('$usuario', '$contrasena')";
    $result = $conn->query($sql);

    if (!$result) {
        die("Error en la consulta SQL: " . $conn->error);
    }

    if ($result->num_rows > 0) {
        echo "Usuario encontrado<br>";
        $row = $result->fetch_assoc();
        if ($row['estado'] == 'Inactivo') {
            $_SESSION['usuario'] = $row['usuario'];
            $_SESSION['contrasena'] = $row['contrasena'];
            $_SESSION['id_administrador'] = $row['id_administrador'];
            $_SESSION['nombre'] = $row['nombre'];
            $_SESSION['ap_paterno'] = $row['ap_paterno'];
            $_SESSION['ap_materno'] = $row['ap_materno'];
            header("Location: ../home/index.html");
            exit();
        } else {
            if ($row['estado'] == 'Activo') {
            $_SESSION['error'] = "El usuario ya inició sesión";
            header("Location: ../home/index.html");
            exit();
            }
    //} else {
       // echo "No se encontraron usuarios con esas credenciales<br>";
       /// $_SESSION['error'] = "El usuario o contraseña son incorrectos";
       // header("Location: ../index.html");
        exit();
    }
}
?>