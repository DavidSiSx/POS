<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Marca</title>
    <link rel="stylesheet" type="text/css" href="./style.css">
</head>
<body>
    <header>
        <nav>
            <a href="../index.php"><button class="salir">Salir</button></a>
        </nav>
    </header>
    <h1>Editar Marca</h1>
    <div class="container">
        <form action="./procesar_edicion.php" method="POST" id="editMarcaForm">
            <input type="hidden" id="editMarcaId" name="editMarcaId" value="<?php echo htmlspecialchars($_GET['id_marca']); ?>">
            <label for="editMarcaName">Marca:</label>
            <p><?php echo htmlspecialchars($_GET['nombre']); ?></p><br><br>
            <label for="editMarcaStatus">Estado:</label>
            <select id="editMarcaStatus" name="editMarcaStatus">
                <option value="Activo" <?php echo ($_GET['status'] == 'Activo') ? 'selected' : ''; ?>>Activo</option>
                <option value="Inactivo" <?php echo ($_GET['status'] == 'Inactivo') ? 'selected' : ''; ?>>Inactivo</option>
            </select><br><br>
            <button type="submit">Guardar</button>
        </form>
    </div>
</body>
</html>
