<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Venta</title>
    <link rel="stylesheet" type="text/css" href="./csss.css">
</head>
<body>
    <header>
        <nav>
            <a href="../home/index.html"><button class="salir">Salir</button></a>
        </nav>
    </header>
    <h1>Registrar Ventas</h1>
    <div class="container">
        <form id="dataForm" action="./registrar.php" method="POST">
            <div id="product-lines">
                <div class="product-line">
                    <label class="product" for="producto">Producto:</label>
                    <select id="producto" name="producto[]">
                        <option value="">Seleccione un producto</option>
                        <?php
                        require_once '../connection/conn.php';
                        $sql = "CALL obtener_productos_con_stock()";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<option value='{$row['id_producto']}'>{$row['nombre']}</option>";
                            }
                        }
                        $conn->close();
                        ?>
                    </select>
                    <br /><br />
                    <label class="cantidad" for="cantidad">Cantidad:</label>
                    <input type="number" id="cantidad" name="cantidad[]" min="1" required>
                    <br /><br />
                </div>
            </div>
            <button class="add-product" type="button">Add Product</button>
            <br /><br />
            <button class="boton" type="submit">Registrar Venta</button>
        </form>
    </div>

    <script>
        const addProductButton = document.querySelector('.add-product');
        const productLinesContainer = document.getElementById('product-lines');

        addProductButton.addEventListener('click', () => {
            const newProductLine = document.createElement('div');
            newProductLine.classList.add('product-line');
            newProductLine.innerHTML = `
                <label class="product" for="producto">Producto:</label>
                <select name="producto[]">
                    <option value="">Seleccione un producto</option>
                    <?php
                    require_once '../connection/conn.php';
                    $sql = "CALL obtener_productos_con_stock()";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='{$row['id_producto']}'>{$row['nombre']}</option>";
                        }
                    }
                    $conn->close();
                    ?>
                </select>
                <br /><br />
                <label class="cantidad" for="cantidad">Cantidad:</label>
                <input type="number" name="cantidad[]" min="1" required>
                <br /><br />
            `;
            productLinesContainer.appendChild(newProductLine);
        });
    </script>
</body>
</html>
