<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Administrador</title>
    <link rel="stylesheet" type="text/css" href="./style.css">
</head>
<body>
    <header>
        <nav>
            <a href="../index.php"><button class="salir">Salir</button></a>
        </nav>
    </header>
    <h1>Editar Administrador</h1>
    <div class="container">
        <form action="./procesar_edicion.php" method="POST" id="editAdminForm">
            <input type="hidden" id="editAdminId" name="editAdminId" value="<?php echo htmlspecialchars($_GET['id_administrador']); ?>">
            <label for="editAdminName">Nombre:</label>
            <p><?php echo htmlspecialchars($_GET['nombre']); ?></p><br><br>
            <label for="editAdminApPaterno">Apellido Paterno:</label>
            <p><?php echo htmlspecialchars($_GET['ap_paterno']); ?></p><br><br>
            <label for="editAdminApMaterno">Apellido Materno:</label>
            <p><?php echo htmlspecialchars($_GET['ap_materno']); ?></p><br><br>
            <label for="editAdminEstado">Estado:</label>
            <select id="editAdminEstado" name="editAdminEstado">
                <option value="Activo" <?php echo ($_GET['estado'] == 'Activo') ? 'selected' : ''; ?>>Activo</option>
                <option value="Inactivo" <?php echo ($_GET['estado'] == 'Inactivo') ? 'selected' : ''; ?>>Inactivo</option>
            </select><br><br>
            <button type="submit">Guardar</button>
        </form>
    </div>
</body>
</html>
