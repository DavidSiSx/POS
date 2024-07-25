<!DOCTYPE html>
<html>
  <head>
    <title>Productos</title>
    <link rel="stylesheet" type="text/css" href="./css.css" />
  </head>
  <body>
    <header>
        <nav>
            <a href="../home/index.html"><button class="salir">Salir</button></a>
        </nav>
    </header>
    <div class="tabla">
    <h2>Productos</h2>
    <table>
        <thead>
        <tr>
            <th>id_producto</th>
            <th>Nombre</th>
            <th>Marca</th>
            <th>Stock</th>
            <th>Precio</th>
            <th>ID Categoria</th>
            <th>Fecha Ingreso</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        <?php
        require_once '../connection/conn.php';

        $sql = "CALL obtener_productos()";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['id_producto']}</td>
                        <td>{$row['nombre']}</td>
                        <td>{$row['marca']}</td>
                        <td>{$row['stock']}</td>
                        <td>\${$row['precio']}</td>
                        <td>{$row['id_categoria']}</td>
                        <td>{$row['fecha_ingreso']}</td>
                        <td>
                            <a href='./editar/index.php?id_producto={$row['id_producto']}&nombre={$row['nombre']}&stock={$row['stock']}&precio={$row['precio']}&fecha_ingreso={$row['fecha_ingreso']}'><button class='modify'>Modificar</button></a>

                         <form action='./delete.php' method='GET' class=''> <!-- Cambiar a GET -->
                                <input type='hidden' name='id_producto' value='{$row['id_producto']}'>
                                <button type='submit' class='delete'>Eliminar</button>
                            </form>
                        </td>
                    </tr>";
            }
        } else {
            echo "<tr><td colspan='8'>No hay productos disponibles</td></tr>";
        }

        $conn->close();
        ?>
        </tbody>
    </table>
</div>
<a href="./insert.php"><button>Agregar Producto</button></a>
  </body>
</html>
