<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administradores</title>
    <link rel="stylesheet" href="./css.css">
</head>
<body>
    <header>
        <nav>
            <a href="../home/index.html"><button class="salir">Salir</button></a>
        </nav>
    </header>
    <h2>Administradores</h2>
    <div class="tabla">
        <table>
            <thead>
                <tr>
                    <th>id_administrador</th>
                    <th>nombre</th>
                    <th>ap_paterno</th>
                    <th>ap_materno</th>
                    <th>estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once '../connection/conn.php';

                $sql = "CALL obtener_administradores()"; // Llamar al procedimiento almacenado
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['id_administrador']}</td>
                                <td>{$row['nombre']}</td>
                                <td>{$row['ap_paterno']}</td>
                                <td>{$row['ap_materno']}</td>
                                <td>{$row['estado']}</td>
                                <td>
                                    <a href='./editar_admin.php?id_administrador={$row['id_administrador']}&nombre={$row['nombre']}&ap_paterno={$row['ap_paterno']}&ap_materno={$row['ap_materno']}&estado={$row['estado']}'><button class='modify'>Modificar</button></a>
                                    <form action='./delete.php' method='POST' class=''>
                                        <input type='hidden' name='id_administrador' value='{$row['id_administrador']}'>
                                        <button type='submit' class='delete'>Eliminar</button>
                                    </form>
                                </td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No hay administradores registrados</td></tr>";
                }

                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
    <button>Agregar Administrador</button>
</body>
</html>
