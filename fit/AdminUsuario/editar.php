<?php
include("config.php");

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $usuarioID = $_GET["id"];

    $sql = "SELECT * FROM usuarios WHERE UsuarioID=$usuarioID";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $nombre = $row["Nombre"];
        $apellido = $row["Apellido"];
        $telefono = $row["Telefono"];
        $fechaNac = $row["FechaNac"];
        $correo = $row["Correo"];
        $rolID = $row["RolID"]; // Agregamos la obtención del RolID
    } else {
        echo "Usuario no encontrado.";
        exit;
    }
} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuarioID = $_POST["usuarioID"];
    $nuevoUsuarioID = $_POST["nuevoUsuarioID"];
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $telefono = $_POST["telefono"];
    $fechaNac = $_POST["fechaNac"];
    $correo = $_POST["correo"];
    $nuevaContrasena = $_POST["nuevaContrasena"];
    $nuevoRolID = $_POST["nuevoRolID"]; // Agregamos la obtención del nuevo RolID

    // Verificamos si el nuevo UsuarioID ya existe
    $verificarID = "SELECT * FROM usuarios WHERE UsuarioID='$nuevoUsuarioID' AND UsuarioID<>'$usuarioID'";
    $resultVerificarID = $conn->query($verificarID);
    if ($resultVerificarID->num_rows > 0) {
        echo "El nuevo UsuarioID ya está en uso. Por favor, elige otro.";
        $conn->close();
        exit;
    }

    // Si se proporciona una nueva contraseña, la actualizamos
    $updateContrasena = "";
    if (!empty($nuevaContrasena)) {
        $contrasenaHash = password_hash($nuevaContrasena, PASSWORD_DEFAULT);
        $updateContrasena = ", Contraseña='$contrasenaHash'";
    }

    $sql = "UPDATE usuarios SET 
            UsuarioID='$nuevoUsuarioID', Nombre='$nombre', Apellido='$apellido', Telefono='$telefono', 
            FechaNac='$fechaNac', Correo='$correo', RolID='$nuevoRolID' 
            $updateContrasena
            WHERE UsuarioID='$usuarioID'";

    if ($conn->query($sql) === TRUE) {
        header("Location: ../usuarios.php");
        echo "Usuario actualizado con éxito.";
    } else {
        echo "Error al actualizar: " . $conn->error;
    }

    $conn->close();
    exit;
}
?>



<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
    <link rel="stylesheet" href="../css/edit.css">
</head>
<body>



<form action="editar.php" method="post">

<h2>Editar Usuario</h2>
<br>
<table>
    <tr>
        <td>
            <label for="usuarioID">ID de Usuario Actual:</label>
            <input type="text" id="usuarioID" name="usuarioID" value="<?php echo $usuarioID; ?>" readonly><br>
        </td>

        <td>
            <label for="nuevoUsuarioID">Nuevo ID de Usuario:</label>
            <input type="text" id="nuevoUsuarioID" name="nuevoUsuarioID" value="<?php echo $usuarioID; ?>" required><br>
        </td>

    </tr>
</table>

    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre" value="<?php echo $nombre; ?>" required><br>

    <label for="apellido">Apellido:</label>
    <input type="text" id="apellido" name="apellido" value="<?php echo $apellido; ?>" required><br>

    <label for="telefono">Teléfono:</label>
    <input type="text" id="telefono" name="telefono" value="<?php echo $telefono; ?>"><br>

    <label for="fechaNac">Fecha de Nacimiento:</label>
    <input type="date" id="fechaNac" name="fechaNac" value="<?php echo $fechaNac; ?>" required><br>

    <label for="correo">Correo:</label>
    <input type="email" id="correo" name="correo" value="<?php echo $correo; ?>" required><br>

    <!-- Agregamos el campo RolID como un menú desplegable -->
    <label for="nuevoRolID">Nuevo Rol:</label>
    <select id="nuevoRolID" name="nuevoRolID" required>
        <option value="0" <?php if ($rolID == 0) echo "selected"; ?>>Cliente</option>
        <option value="1" <?php if ($rolID == 1) echo "selected"; ?>>Administrador</option>
        <option value="2" <?php if ($rolID == 2) echo "selected"; ?>>Instructor</option>
        <option value="3" <?php if ($rolID == 3) echo "selected"; ?>>Bodega</option>
        
    </select><br>

    <label for="nuevaContrasena">Nueva Contraseña:</label>
    <input type="password" id="nuevaContrasena" name="nuevaContrasena"><br>

    <br>
    <br>
    <input type="submit" value="Guardar Cambios">

    <a href="../usuarios.php">Volver al Listado</a>
</form>




</body>
</html>
