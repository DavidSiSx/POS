<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Producto</title>
    <link rel="stylesheet" type="text/css" href="./style.css">
</head>
<body>
    <header>
        <nav>
            <a href="../index.php"><button class="salir">Salir</button></a>
        </nav>
    </header>
    <h1>Editar Producto</h1>
    <div class="container">
        <form action="./procesar_edicion.php" method="POST" id="editProductForm">
            <input type="hidden" id="editProductId" name="editProductId" value="<?php echo htmlspecialchars($_GET['id_producto']); ?>">
            <?php // Depuración: Imprimir el ID del producto ?>
            <p>ID Producto: <?php echo htmlspecialchars($_GET['id_producto']); ?></p>
            <label for="editProductName">Nombre:</label>
            <input type="text" id="editProductName" name="editProductName" value="<?php echo htmlspecialchars($_GET['nombre']); ?>"><br><br>
            <label for="editProductStock">Stock:</label>
            <input type="number" id="editProductStock" name="editProductStock" value="<?php echo htmlspecialchars($_GET['stock']); ?>"><br><br>
            <label for="editProductPrecio">Precio:</label>
            <input type="number" id="editProductPrecio" name="editProductPrecio" value="<?php echo htmlspecialchars($_GET['precio']); ?>" step="0.01"><br><br>
            <label for="editProductFecha">Fecha Ingreso:</label>
            <input type="date" id="editProductFecha" name="editProductFecha" value="<?php echo htmlspecialchars($_GET['fecha_ingreso']); ?>"><br><br>
            <input type="hidden" name="id_producto" value="<?= $id_cliente; ?>">
            <button type="submit">Guardar</button>
        </form>
    </div>
</body>
</html>
