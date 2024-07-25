<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ventas</title>
    <link rel="stylesheet" href="./css.css">
</head>
<body>
    <header>
        <nav>
            <a href="../home/index.html"><button class="salir">Salir</button></a>
        </nav>
    </header>
    <h2>Ventas</h2>
    <div class="tabla">
        <table>
            <thead>
                <tr>
                    <th>id_venta</th>
                    <th>id_producto</th>
                    <th>Nombre Producto</th>
                    <th>Cantidad</th>
                    <th>Total</th>
                    <th>Fecha Venta</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once '../connection/conn.php';

                $sql = "CALL obtener_ventas()";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['id_venta']}</td>
                                <td>{$row['id_producto']}</td>
                                <td>{$row['nombre']}</td>
                                <td>{$row['cantidad']}</td>
                                <td>\${$row['total']}</td>
                                <td>{$row['fecha_venta']}</td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No hay ventas registradas</td></tr>";
                }

                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
