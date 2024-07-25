<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Producto</title>
    <link rel="stylesheet" type="text/css" href="../inventario/editar/style.css">
</head>
<body>
    <header>
        <nav>
            <a href="../index.php"><button class="salir">Salir</button></a>
        </nav>
    </header>
    <h1>Agregar Producto</h1>
    <div class="container">
        <form action="./procesar_insertar.php" method="POST" id="addProductForm">
            <label for="addProductName">Nombre:</label>
            <input type="text" id="addProductName" name="addProductName" required><br><br>
            
            <label for="addProductMarca">Marca:</label>
            <select id="addProductMarca" name="addProductMarca" required>
                <?php
             require_once '../connection/conn.php';
             $sql = "CALL sp_obtener_marcas()";
                $result = $conn->query($sql);
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='{$row['id_marca']}'>{$row['nombre']}</option>";
                }
                $conn->close();
                ?>
            </select><br><br>
            
            <label for="addProductStock">Stock:</label>
            <input type="number" id="addProductStock" name="addProductStock" required><br><br>
            <label for="addProductPrecio">Precio:</label>
            <input type="number" id="addProductPrecio" name="addProductPrecio" step="0.01" required><br><br>
            <label for="addProductCategoria">ID Categoría:</label>
            <input type="number" id="addProductCategoria" name="addProductCategoria" required><br><br>
            <label for="addProductFecha">Fecha Ingreso:</label>
            <input type="date" id="addProductFecha" name="addProductFecha" required><br><br>
            <button type="submit">Guardar</button>
        </form>
    </div>
</body>
</html>
