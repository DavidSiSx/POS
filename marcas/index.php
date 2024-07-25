<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="./css.css" />
    <title>Marcas</title>
</head>
<body>
    <header>
        <nav>
            <a href="../home/index.html"><button class="salir">Salir</button></a>
        </nav>
    </header>
    <div class="tabla">
        <h2>Marcas</h2>
        <table>
            <tr>
                <th>id</th>
                <th>Marca</th>
                <th>Status</th>
                <th>Acciones</th>
            </tr>
            <?php
            require_once '../connection/conn.php';

            $sql = "CALL sp_obtener_marcas()";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['id_marca']}</td>
                            <td>{$row['nombre']}</td>
                            <td>{$row['status']}</td>
                            <td>
                                <a href='./editar_marca.php?id_marca={$row['id_marca']}&nombre={$row['nombre']}&status={$row['status']}'><button class='modify'>Modificar</button></a>
                                <form action='./delete.php' method='POST' class=''>
                                    <input type='hidden' name='id_marca' value='{$row['id_marca']}'>
                                    <button type='submit' class='delete'>Eliminar</button>
                                </form>
                            </td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No hay marcas disponibles</td></tr>";
            }

            $conn->close();
            ?>
        </table>
    </div>
    <button>Agregar Marca</button>
</body>
</html>
