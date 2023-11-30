<?php
include("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuarioID = $_POST["usuarioID"];
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $telefono = $_POST["telefono"];
    $fechaNac = $_POST["fechaNac"];
    $correo = $_POST["correo"];
    $contrasena = password_hash($_POST["contrasena"], PASSWORD_DEFAULT);
    $rolID = $_POST["rolID"];

    $sql = "INSERT INTO usuarios (UsuarioID, Nombre, Apellido, Telefono, FechaNac, Correo, Contraseña, RolID)
            VALUES ('$usuarioID', '$nombre', '$apellido', '$telefono', '$fechaNac', '$correo', '$contrasena', '$rolID')";

    if ($conn->query($sql) === TRUE) {
        header("Location: ../usuarios.php");
        echo "Usuario creado con éxito.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Nuevo Usuario</title>
    <link rel="stylesheet" href="../css/crear.css">
</head>
<body>

<form action="" method="post">

<h2>Agregar Nuevo Usuario</h2>
<br>
    <label for="usuarioID">UsuarioID:</label>
    <input type="text" id="usuarioID" name="usuarioID" required><br>

    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre" required><br>

    <label for="apellido">Apellido:</label>
    <input type="text" id="apellido" name="apellido" required><br>

    <label for="telefono">Teléfono:</label>
    <input type="text" id="telefono" name="telefono"><br>

    <label for="fechaNac">Fecha de Nacimiento:</label>
    <input type="date" id="fechaNac" name="fechaNac" required><br>

    <label for="correo">Correo:</label>
    <input type="email" id="correo" name="correo" required><br>

    <label for="contrasena">Contraseña:</label>
    <input type="password" id="contrasena" name="contrasena" required><br>

    <label for="rolID">Rol:</label>
    <select id="rolID" name="rolID" required>
        <!-- Opciones de roles -->
        <option value="0">Cliente</option>
        <option value="1">Administrador</option>
        <option value="2">Instructor</option>
        <option value="3">Bodega</option>
    </select><br>

    <input type="submit" value="Guardar">

    <br>
<a href="../usuarios.php">Volver al Listado</a>
</form>

</body>
</html>
